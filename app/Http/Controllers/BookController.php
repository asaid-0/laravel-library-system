<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $books = DB::table('books')->get();
        // $books = DB::table('books')
        //     ->join('categories', 'books.category_id', '=', 'categories.id')
        //     ->select('books.id', 'books.title','books.auther', 'books.copies','books.price','categories.category_name','books.category_id')
        //     ->paginate(20);
        $books=Book::all();
            
            //->with('i',(request()->input('page',1) -1)*5
        return view('books', ['books' => $books]); 
        
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
    


        $request->validate([
            'title'=>['required', 'unique:books', 'max:50'],
            'copies'=>['required','numeric'],
            'price'=>['required','numeric'],
            'author'=>'required',
            'category_id'=>['required','numeric']
            
        ]);
        // dd($request->all());
        
        $book=new Book();

       $imageName=time().'.'.$request->avater->extension();
       $request->avater->move(public_path('/bookimage') ,$imageName);
    //    $request['avater']=asset('/bookimage').$imageName; 
       $book->pic_path = $imageName;
       $book->title=$request->title;
       $book->copies=$request->copies;
       $book->price=$request->price;
       $book->author=$request->author ;
       $book->category_id=$request->category_id;
       $book->save();
       
    //   $book=book::all();
         return redirect()->route('books.index', ["books" => $book])->with('alert','book has been created successfully');

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
        $book = Book::find($id);

          return view('editBook', ['book' => $book]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>['required', 'unique:books', 'max:50'],
            'copies'=>['required','numeric'],
            'price'=>['required','numeric'],
            'author'=>'required',
            'category_id'=>['required','numeric']
            
        ]);
        

        $book = Book::find($id);
        $book ->category_id= $request->get('id');
        $book->title= $request->get('title');
        $book->price= $request->get('price');
        $book->category_id= $request->get('category_id');
        $book->save();

        return redirect('books')->with('alert','phone has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $book =  DB::table('books')->get();
        //  $book = DB::table('books')->find($id);
       $book = Book::find($id);
     $book->delete();
    
      return redirect()->route('books.index')->with('success', 'book deleted!');
    }
}
