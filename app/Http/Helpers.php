<?php

use App\Models\BusinessSetting;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

if (!function_exists('overWriteEnvFile')){
    function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('global_asset')){
    function global_asset($key=null){
        if ($key != null){
            $exists = Storage::disk('public')->has($key);
            if ($exists){
                if (config('app.env' == 'local')){
                    $url = config('app.url') ?? 'http://127.0.0.1:800/'."storage/".$key;
                }else{
                    $url = config('app.url')."/storage/".$key;
                }
            }else{
                $url = config("app.url")."/images/img-placeholder2.webp";
            }
        }else{
            $url = config("app.url")."/images/img-placeholder2.webp";
        }

        return $url;
    }
}




function sendBulkOtpSms($number, $text){
    $data= array(
        'username'=> config('bulkotp.bulk_user'),
        'password'=> config('bulkotp.bulk_pass'),
        'number'=>"88$number",
        'message'=>"$text"
    );

    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL, config('bulkotp.bulk_url'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $smsresult = curl_exec($ch);
    $p = explode("|",$smsresult);
    $sendstatus = $p[0];

    return $sendstatus;
}

function sendOtpUser($phone){
    $code = rand(1111,9999);
    $user = User::where('phone', $phone)->first();
    $user->sms_otp = $code;
    $user->update();
    // $text = "আপনার chaldal.ctpbd.com OTP কোড টি হল  ".$code;
    $text = "Your hiref.info OTP code is ".$code;
//    $status = sendBulkOtpSms($phone, $text);
    return true;
}
