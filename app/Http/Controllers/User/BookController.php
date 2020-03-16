<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\UserLeasedBook;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::paginate(12);
        $books = new Book;
        if (request()->has('sort')){
            $books = $books->orderBy(request('sort'));
        }

        $books= $books->paginate(12)->appends([
             'sort'=>request('sort'),
         ]); 
        // $bookLeased= UserLeasedBook::all()->where('leased_until','>',now());
        $categories = Category::withCount('books')->orderBy('books_count', 'desc')->limit(10)->get();
        return view('user.index', ['books' => $books, 'categories' => $categories]);
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
        return view('user.book', ['book' => Book::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function search(Request $request)
    {
        $validateData = $request->validate([
            'search' => 'required',
        ]);
        $search= $request->search;
        $books= Book::where('title','like','%'.$search.'%')->orWhere('author','like','%'.$search.'%')->paginate(12)->appends(request()->except('page'));;
        $categories = Category::withCount('books')->orderBy('books_count', 'desc')->limit(10)->get();
        return view('user.index', ['books' => $books, 'categories' => $categories]);
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
    
    public function list(Category $cat)
    {
        $categories = Category::withCount('books')->orderBy('books_count', 'desc')->limit(10)->get();
        $books = $cat->books()->paginate(12);
        return view('user.index', ['books' => $books, 'categories' => $categories]);
    }
}
