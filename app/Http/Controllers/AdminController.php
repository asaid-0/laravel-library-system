<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth ;
use App\User ;
class AdminController extends Controller
{
    public function adminHome()
    {
        return view('admins');
    }
    public function adminsPage()
    {
        return view('showAdmins') ;
    }   
    public function user(){
        return view('users');
    }
    public function book(){
        return view('books') ;
    }
    public function category(){
        return view('categories') ;
    }
    public function addingCategory()
    {
        return view('addCategory');
    }
    public function index()
    {
        $users = User::paginate(3);
        return view('users',compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active_deactive_users ($id)
    {
        $users =User::find($id);
        if($users->isActive == 1)
        {
            $users->isActive = 0 ;
        }
        else{
            $users->isActive = 1 ;
        }
        if($users->save()){
            echo json_encode("success") ;
        }
        else{
            echo json_encode("failed");
        }
    }
 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'  => 'required|unique:users|string|min:3',
            'userName'=>'required|unique:users|string|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
            ]);
           $users = new User ;
           $users->id = Auth::id() ;
           $users->name = $request->name ;
           $users->userName = $request->userName ;
           $users->email = $request->email ;
           $users->password = Hash::make($request->password) ;
           $users->save() ;
          return redirect()->action('AdminController@index')->with('message', "user has been added successfully") ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit', ['users'=> \App\User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validateData = $request->validate([
            'name'=>'required|min:3', 
            'userName'=> 'required|min:3|unique:users,id',
            'email'=>'required|email|unique:users,id',
            'password'=>'required|min:8'
        ]);
        $users = new User ;
        $users =User::find($id);
        $users->name = $request->name ;
        $users->userName = $request->userName ;
        $users->email = $request->email ;
        $users->password = Hash::make($request->password) ;
        $users->update() ;
        return redirect()->action('AdminController@index')->with('message', "user has been updated successfully");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
