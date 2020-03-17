<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
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
=======
use App\Charts\ProfitPerWeek;
use App\User;
use Illuminate\Http\Request;
use App\UserLeasedBook;
use DB;
class AdminController extends Controller
{
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
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
    }
    public function adminsPage()
    {
        return view('showAdmins') ;
<<<<<<< HEAD
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
=======
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
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
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
<<<<<<< HEAD
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
 
=======
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

>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
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
<<<<<<< HEAD
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
=======
        //
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
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
<<<<<<< HEAD
        return view('edit', ['users'=> \App\User::find($id)]);
=======
        return view('edit', ['users' => \App\User::find($id)]);
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request,$id)
    {
=======
    public function update(Request $request,$user)
    {
        $input=$request->except('_method','_token');
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
        $validateData = $request->validate([
            'name'=>'required|min:3', 
            'userName'=> 'required|min:3|unique:users,id',
            'email'=>'required|email|unique:users,id',
            'password'=>'required|min:8'
        ]);
<<<<<<< HEAD
        $users = new User ;
        $users =User::find($id);
        $users->name = $request->name ;
        $users->userName = $request->userName ;
        $users->email = $request->email ;
        $users->password = Hash::make($request->password) ;
        $users->update() ;
        return redirect()->action('AdminController@index')->with('message', "user has been updated successfully");;
=======
        User::where('id',$user)->update($input);
        return redirect()->action('AdminController@index')->with('message', "Phone has been updated successfully");;
>>>>>>> 6b52520a29c68f83756602b0bc9140c83c473c5d
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
