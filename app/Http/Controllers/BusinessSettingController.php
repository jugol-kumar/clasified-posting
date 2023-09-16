<?php

namespace App\Http\Controllers;

use App\Models\BusinessSetting;
use App\Models\Country;
use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class BusinessSettingController extends Controller
{
    public function index()
    {

//        Cache::forever('countries', Country::all());

        return inertia('Backend/Setting/Setting', [
//            'countries' => Cache::get('countries'),
            'bSettings' =>[
                'name'        => get_setting('name'),
                'details'     => get_setting('app_details'),
                'header_logo' => global_asset(get_setting('header_logo')),
                'footer_logo' => global_asset(get_setting('footer_logo')),
                'timezone'    => json_decode(get_setting('timezone')),
                'country'     => json_decode(get_setting('country')),

                'address'     => get_setting('address'),
                'phone'       => get_setting('phone'),
                'email'       => get_setting('email'),

                'instagram_profile'       => get_setting('instagram_profile'),
                'facebook_profile'        => get_setting('facebook_profile'),
                'google_drive'            => get_setting('google_drive'),
                'linkedin_profile'        => get_setting('linkedin_profile'),
                'twitter_profile'        => get_setting('twitter_profile'),

                'home_details' => get_setting('home_details'),

                'conditions' => json_decode(get_setting('conditions'))
            ]
        ]);
    }

    public function updateSetting()
    {
        foreach (Request::all() as $type => $value){
            $business_settings = BusinessSetting::where('type', $type)->first();

            if ($type == 'name' && $value != null){
                overWriteEnvFile("APP_NAME", $value);
            }

            if ($type == 'timezone' && gettype($value) == 'array'){
                    overWriteEnvFile("APP_TIMEZONE", $value['tz']);
            }

            if ($type == 'country' && $value != null && gettype($value) != 'array'){
                $value = $business_settings->country;
            }

            if ($type == 'header_logo' && Request::hasFile('header_logo')){
                $value = Request::file('header_logo')->store('settings', 'public');
                if ($business_settings != null){
                    Gallery::updateOrCreate([
                       'imageable_id' => $business_settings->id,
                        'imagable_type' => 'App\\Models\\BusinessSetting',
                        'filename' => $value
                    ]);
                }
            }

            if ($type == 'footer_logo' && Request::hasFile('footer_logo')) {
                $value = Request::file('footer_logo')->store('settings', 'public');
                if ($business_settings != null){
                    Gallery::updateOrCreate([
                        'imageable_id' => $business_settings->id,
                        'imagable_type' => 'App\\Models\\BusinessSetting',
                        'filename' => $value
                    ]);
                }
            }

            if($business_settings != null) {
                if ($value != null){
                    if ($type == 'timezone' && gettype($value) != 'array'){
                        $value = $business_settings->value;
                    }
                    if(gettype($value) == 'array'){
                        $business_settings->value = json_encode($value);
                    }
                    else {
                        $business_settings->value = $value;
                    }
                    $business_settings->save();
                }
            } else{
                if ($value != null){
                    $business_settings = new BusinessSetting;
                    $business_settings->type = $type;
                    if(gettype($value) == 'array'){
                        $business_settings->value = json_encode($value);
                    }
                    else {
                        $business_settings->value = $value;
                    }
                    $business_settings->save();
                }
            }
        }

        Log::info('Update Business Settings', [
            'message' => 'Update Successfully Done...!',
            'time' => now()
        ]);

        return redirect()->route('setting.index');

    }
}
