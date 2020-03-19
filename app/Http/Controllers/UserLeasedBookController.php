<?php

namespace App\Http\Controllers;

use App\UserLeasedBook;
use App\Book;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class UserLeasedBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        $newLease = new UserLeasedBook;
        $newLease->user_id = Auth::user()->id;
        $newLease->book_id = $request->id;
        $newLease->NumofDays = $request->NumofDays;
        $newLease->leased_until = Carbon::now()->add($request->NumofDays,'day');
        $newLease->save();

        return redirect()->back()->with("status", "book leased successfully");
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLeasedBook  $userLeasedBook
     * @return \Illuminate\Http\Response
     */
    public function show(UserLeasedBook $userLeasedBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLeasedBook  $userLeasedBook
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLeasedBook $userLeasedBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserLeasedBook  $userLeasedBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLeasedBook $userLeasedBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLeasedBook  $userLeasedBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLeasedBook $userLeasedBook)
    {
        //
    }
}
