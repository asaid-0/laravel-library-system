<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories=Category::all();
        // return view('books', ["books" => $books]); 
            //->with('i',(request()->input('page',1) -1)*5
        return view('categories', compact('categories')); 
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
            
            'category_name'=>['required','unique:categories,category_name,NULL,id,deleted_at,NULL']
            
            
        ]);
        //
        $category=new Category();

        $category->category_name=$request->category_name;
        
        
        $category->save();
        
     //   $book=book::all();
          return redirect()->route('categories.index', ["categories" => $category])->with('alert','category has been created successfully'); 
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
        //
         $category = Category::find($id);
        return view('editCategory', compact('category')); 
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
            'category_name'=>['required',"unique:categories,category_name,{$id},id,deleted_at,NULL"]
        ]);
        

        $category = Category::find($id);
        $category->category_name= $request->get('category_name');
        
        $category->save();

        return redirect('categories')->with('success', 'category updated!');
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
        $category = Category::find($id);
        $category->delete();
       
         return redirect()->route('categories.index')->with('success', 'category deleted!');
    }
}
