<?php

namespace App\Http\Controllers;

use App\Charts\ProfitPerWeek;
use App\User;
use Illuminate\Http\Request;
use App\UserLeasedBook;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    
    public function adminHome()
    {   
        
        $profitPerWeekData= DB::table('book-leasedby-user')
        ->select(DB::raw("DATE_FORMAT(`book-leasedby-user`.created_at, '%X %V') AS week, SUM(`books`.price * NumofDays) as profit"))
        ->join('books', "book-leasedby-user.book_id", '=', 'books.id')
        ->groupBy('week')
        ->orderBy('week', 'asc')
        ->pluck('profit','week');
        $chart = new ProfitPerWeek;
        $chart->labels($profitPerWeekData->keys());
        $chart->dataset('Profit', 'line', $profitPerWeekData->values());
        $chart->title("Profit Per Week" , 18, '#666',  true, "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif");
        $chart->displayLegend(false);

        return view('admins', compact('chart'));
    }
    public function adminsPage()
    {
        return view('showAdmins') ;
    }
    public function user()
    {
        return view('users');
    }
    public function book()
    {
        return view('books');
    }
    public function category()
    {
        return view('categories');
    }
    
    // public function user(){
    //     return view('users');
    // }
    // public function book(){
    //     return view('books') ;
    // }
    // public function category(){
    //     return view('categories') ;
    // }
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
    public function active_deactive_users($id)
    {
        $users = User::find($id);
        if ($users->isActive == 1) {
            $users->isActive = 0;
        } else {
            $users->isActive = 1;
        }
        if ($users->save()) {
            echo json_encode("success");
        } else {
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
        return view('edit', ['users' => \App\User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        $input=$request->except('_method','_token');
        $validateData = $request->validate([
            'name'=>'required|min:3', 
            'userName'=> 'required|min:3|unique:users,id',
            'email'=>'required|email|unique:users,id',
            'password'=>'required|min:8'
        ]);
        User::where('id',$user)->update($input);
        return redirect()->action('AdminController@index')->with('message', "Phone has been updated successfully");;
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
