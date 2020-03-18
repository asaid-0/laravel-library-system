<?php

namespace App\Http\Controllers\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }
    public function update(Request $request){
        $user = Auth::user();
        $validation = [
            'name'  => 'required|string|min:3',
            'userName'=>'required|unique:users,userName,NULL,id,deleted_at,NULL|string|min:3',
            'email'=>'required|email|unique:users,email,NULL,id,deleted_at,NULL',
        ];
        if(!($request->password == 'oldpwd' && $request->password_confirmation == 'oldpwd')){
            $validation['password'] = 'required|confirmed|min:8';
            $user->password = Hash::make($request->password);
        }
        $request->validate($validation);
        $user->name = $request->name;
        $user->userName = $request->userName;
        $user->email = $request->email;
        echo $user->save();
        die();
        return back()->with('status', 'Profile has been updated successfuly');
    }
}
