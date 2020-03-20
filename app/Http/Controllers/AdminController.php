<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Auth ;
use App\Charts\ProfitPerWeek;
use App\User;
use Illuminate\Http\Request;
use App\UserLeasedBook;
use DB;
use Illuminate\Support\Facades\Hash;

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
        $admins=User::where('isAdmin',1)->paginate(10);
        return view('showAdmins',['admins' => $admins]) ;
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,id,deleted_at,NULL'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => 'required|string|max:255|unique:users,userName,NULL,id,deleted_at,NULL',
        ]);

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isAdmin'=>$request['isAdmin']
        ]);       
        return redirect()->route('showAdmins')->with("status", "Admin added successfully");
    }

    public function user()
    {
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
        $users = User::where('isAdmin',0)->paginate(10);
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
            'name'  => 'required|string|min:3',
            'userName'=>'required|unique:users,userName,NULL,id,deleted_at,NULL|string|min:3',
            'email'=>'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password'=>'required|min:8|confirmed'
            ]);
           $users = new User ;
        //    $users->id = Auth::id() ;
           $users->name = $request->name ;
           $users->userName = $request->userName ;
           $users->email = $request->email ;
           $users->password = Hash::make($request->password) ;
           $users->save() ;
          return redirect()->action('AdminController@index')->with('status', "user has been added successfully") ;
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
        $users = new User ;
        $users =User::find($id);
        $request->validate([
            'name'=>'required|min:3', 
            'userName'=> "required|min:3|unique:users,userName,{$id},id,deleted_at,NULL",
            'email'=>"required|email|unique:users,email,{$id},id,deleted_at,NULL",
            'password'=> $request->password != 'oldpwd' ? 'required|min:8' : ''
        ]);
        $users->password = $request->password != 'oldpwd' ? Hash::make($request->password) : $users->password;
        $users->name = $request->name ;
        $users->userName = $request->userName ;
        $users->email = $request->email ;
        $users->update() ;
        if ($users->isAdmin==1){
            return redirect()->route('showAdmins')->with('status', "user has been updated successfully");;
        }
        return redirect()->action('AdminController@index')->with('status', "user has been updated successfully");;
    }
    

    // public function search(Request $request, $search = "") {
    //     if ($request->wantsJson()) {
    //       return response()->json(User::search($search));
    //     } else {
    //       abort(403);
    //     }
    //   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** delete user */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with("status", "User deleted successfully");
    }


}
