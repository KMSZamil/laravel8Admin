<?php

namespace App\Http\Controllers;

use App\Models\UserManagerModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function submit(Request $request){

         $request->validate([
            'UserId' => 'required',
            'Password' => 'required',
        ]);

        $userid = $request->input('UserId');
        $password = $request->input('Password');

        //dd(Auth::attempt(array('user_id' => $userid, 'password' => $password)));

        if(Auth::attempt(array('user_id' => $userid, 'password' => $password))){
            return redirect('/dashboard');
        } else{
            return back()->withErrors([
                'message' => 'Login Failed, UserId or Password incorrect.'
            ]);
        }

//        $credentials = ([
//            'user_id' => $request->input('UserId'),
//            'password' => $request->input('Password')
//        ]);

//
//        $userid = $request->input('UserId');
//        $password = $request->input('Password');
//
//        $user = UserManagerModel::where('user_id','=', $userid )->first();
//         if (!$user) {
//             return back()->withErrors([
//              'message' => 'Login Failed, UserId or Password incorrect.'
//           ]);
//         }else{
//             $success = UserManagerModel::where('password','=', $password )->first();
//             if($success){
//                 return redirect('/dashboard');
//             }
//         }
//
//        $request->session()->regenerate();
//        return redirect('/login');
    }
}
