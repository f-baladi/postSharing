<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginMobileRequest;
use App\Http\Requests\VerifyMobileRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.insertMobile');
    }

    public function checkMobile(LoginMobileRequest $request)
    {
        $mobile = $request->mobile;
        $user = User::where('mobile', '=', $mobile )->first();
        if ($user === null) {

            $code = rand(10000,99999);
            Log::info("$mobile: $code");

            Cache::put("$mobile","$code",360);
            Cache::put('mobile',"$mobile",360);

            return view('auth.verifyMobile')->with('message','موبایل خود را تایید کنید');
        }
        else{
            return view('auth.login');
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
//        cache::forget($mobile);
    }
}
