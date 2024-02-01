<?php
 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;







class CategoryController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function __construct()

  {
     $this->middleware("auth")->except('index','show');

  }


    public function index ()
    {
        $categories = Category::all();
        return view('categories.index-categories', compact('categories'));

    }
    public function create()
    {

        return view('categories.create-category');

    }



    public function store(Request $request)
    {

    
        $request->validate([
            'name' => 'required | unique:categories',
        ]);
        
        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;

        $category->save();
        
        return redirect()->back()->with('status', 'Category Created Successfully');

    }




    public function  show()

    {
     
     

    }
   

     public function edit(Category $category)

      {
            return view('categories.edit-category', compact('category'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required | unique:categories',
        ]);
        
        $name = $request->input('name');
       
        $category->name = $name;

        $category->save();
        
        return redirect(route('categories.index'))->with('status', 'Category Edited Successfully');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }









}