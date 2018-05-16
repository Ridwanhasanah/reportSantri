<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;

class ActivationController extends Controller
{
    public function activate(Request $request){
    	$user = User::where('email',$request->email)->where('activation_token',$request->token)->firstOrFail();

    	// $user->update([
    	// 	'active' => true,
    	// 	'activation_token' => null,
    	// ]);

    	$user->active           = true;
    	$user->activation_token = null;
    	$user->update();


    	Auth::loginUsingId($user->id);

    	return redirect()->route('dashboard.home')->withsuccess('Berhasil Aktivasi kamu sudah login sekarang');
    }
}
