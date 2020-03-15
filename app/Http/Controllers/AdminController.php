<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\User ;
class AdminController extends Controller
{
    public function adminHome()
    {
        return view('admins');
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
    public function index()
    {
        $users = User::get();
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
          //
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
    public function update(Request $request, User $users)
    {
        
        $validateData = $request->validate([
            'name'=>'required|min:3', 
            'userName'=> 'required|unique:users|min:3',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $users->name = $request->name ;
        $users->userName=$request->userName ;
        $users->email=$request->email ;
        $users->password=$request->password ;
        $users->save();
        $request->session()->flash('success','your data updated successfully');
        return redirect()->action('AdminController@index');
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
