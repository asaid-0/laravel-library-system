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
        $request->validate([
            'name'=>'required|min:3', 
            'userName'=> 'required|min:3|unique:users,id',
            'email'=>'required|email|unique:users,id',
            'password'=>'required|min:8'
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        echo $user->save();
        die();
        return back()->with('status', 'Profile has been updated successfuly');
    }
}
