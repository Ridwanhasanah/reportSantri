<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Event\UserActivationEmail;

class ActivationResendController extends Controller
{
    public function showResendForm(){
    	return view('auth.activate.resend');
    }

    public function resend(Request $request){
    	$this->validateResendRequest($request);
    	$user = User::where('email',$request->email)->first();
    	event(new UserActivationEmail($user));

    	return redirect()->route('login')->wihtsuccess('Email Aktivasi sudah di kirim');
    }

    protected function validateResendRequest(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email|exists:users,email'
    	],[
    		'email.exists' => 'Email ini tidak ada. Silahkan cek kembali email anda' 
    	]);
    }
}
