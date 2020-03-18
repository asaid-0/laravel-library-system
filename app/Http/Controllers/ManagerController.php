<?php

namespace App\Http\Controllers;

use App\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manager = Manager::all();
        return view('managers.index', compact('mgrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $manager = new Manager();
       $manager->name = request('name');
       $manager->email = request('email');
       $manager->password = request('password');
       $manager->isAdmin = request('isAdmin');
       $manager->save();
       return redirect('/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return view('managers.show', compact("mgr"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view('managers.edit', compact("mgr"));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager = new Manager();
        $manager->name = request('name');
        $manager->email = request('email');
        $manager->password = request('password');
        $manager->isAdmin = request('isAdmin');
        $manager->save();
        return redirect('/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect('/manager');
    }
}
