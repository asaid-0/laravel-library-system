<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ;
use App\Users ;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        // $users = Users::get();
        return view('users',['users'=>Users::all()]);
    }
     // public function changeUserStatus(Request $request)
    // {
    //     $user=Users::find($request->id);
    //     $user->isActive= $request->isActive ;
    //     $user->save() ;
    //     return response()->json(['success'=>'Status change successfully']) ;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('edit', ['users'=> \App\Users::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        
        $validateData = $request->validate([
            'name'=>'required|min:2', 
            'userName'=> 'required|unique:users|min:2',
            'email'=>'required|email',
        ]);
        $user->name = $request->name ;
        $user->userName=$request->userName ;
        $user->email=$request->email ;
        $user->save();
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
