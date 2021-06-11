<?php

namespace App\Http\Controllers;

use App\Models\UserManagerModel;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $credentials = array('user_id' => $userid, 'password' => $password, 'status' => 'Y');
        //dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else{
            return back()->withErrors([
                'message' => 'Login Failed, UserId or Password incorrect.'
            ]);
        }
    }

    public function resetPassword(){
        return view('resetPassword');
    }

    public function resetPasswordSubmit(Request $request){

        $request->validate([
            'NewPassword' => 'required',
            'ConfirmNewPassword' => 'required|same:NewPassword'
        ]);
        $OldPassword = $request->input('OldPassword');
        $NewPassword = $request->input('NewPassword');
        $ConfirmNewPassword = $request->input('$ConfirmNewPassword');
        $id = Auth::id();
        $user_old_password = UserManagerModel::find($id)->password;
            if(!Hash::check($OldPassword, $user_old_password)){
                return back()->withErrors([
                    'message' => 'Error! Old password does not match!'
                ]);
            }else{
                UserManagerModel::where('id',$id)->update(['password'=>Hash::make($NewPassword)]);
                return redirect('/usermanager');
            }
    }
}
