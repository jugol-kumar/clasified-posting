<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class PayPalPaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(env('PAYPAL_TEST_MODE', true)); //set it to 'false' when go live
    }

    /**
     * Initiate a payment on PayPal.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function charge(Request $request)
    {
        if ($request->input('amount') > 0) {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'items' => array(
                        array(
                            'name' => 'Course Subscription',
                            'price' => $request->input('amount'),
                            'description' => 'Get access to premium courses.',
                            'quantity' => 1
                        ),
                    ),
                    'currency' => env('PAYPAL_CURRENCY', 'USD'),
                    'returnUrl' => URL::route('paypal.success'),
                    'cancelUrl' => URL::route('paypal.error'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {

            $rand_id = rand(73862, 5632625);

            $order = new Order;
            $order->course_id = $request->course_id;
            $order->user_id = Auth::user()->id;
            $order->transaction_id = $rand_id;
            $order->payment_method = 'Others';
            $order->total_amount = 0.00;
            $order->coupon_discount = 0.00;
            $order->pay_amount = 0.00;
            $order->currency = 'USD';
            $order->status = 'active';
            $order->save();

            $payment = new Transaction;
            $payment->course_id = $request->course_id;
            $payment->trx = $rand_id;
            $payment->user_id = Auth::user()->id;
            $payment->amount = 0.00;
            $payment->method = 'Others';
            $payment->status = 'successfull';
            $payment->save();

            return redirect()->route('dashboard');
        }
    }

    /**
     * Charge a payment and store the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $payment = new Transaction;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                return "Payment is successful. Your transaction id is: " . $arr_body['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        return 'User cancelled the payment.';
    }
}
