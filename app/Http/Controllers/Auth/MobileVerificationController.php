<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginMobileRequest;
use App\Http\Requests\VerifyMobileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class MobileVerificationController extends Controller
{
    public function checkMobile(LoginMobileRequest $request)
    {
        $mobile = $request->mobile;
        $user = User::where('mobile', $mobile )->first();
        if ($user === null) {

            $code = rand(10000,99999);
            Log::info("$mobile: $code");

            Cache::put("$mobile","$code",360);
            Cache::put('mobile',"$mobile",360);

            return view('auth.verifyMobile')->with('message','موبایل خود را تایید کنید');
        }
        elseif ($user->isActive) {
            return view('auth.login');
        }
        else{
            return redirect()->route('welcome')->with('status','حساب شما غیر فعال شده است لطفا با پشتیانی سایت تماس بگیرید.');
        }
    }

    public function showVerifyForm()
    {

        return view('auth.registerMobile');
    }

    public function verifyMobile(VerifyMobileRequest $request)
    {
        $mobile = $request->mobile;
        $code = $request->code;
        $cachedCode = Cache::get("$mobile");
        if ($cachedCode!=$code) {
            return response('مجدد تلاش کنید');
        }
        else{
            Cache::put('mobile',"$mobile",360);
            return view('auth.registerMobile')->with('message','لطفا سایر اطلاعات خود را تکمیل کنید');

        }
    }
}
