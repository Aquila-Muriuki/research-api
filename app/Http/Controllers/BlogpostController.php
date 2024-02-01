<?php
 
namespace App\Http\Controllers;

use Illuminate\Database\Schema\IndexDefinition;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;



class BlogpostController extends Controller
{


  public function __construct()

  {
     $this->middleware("auth")->except('index','show');

  }


    public function index (Request $request)
    {
      if($request->search){
        $posts = Post::where('title', 'like', '%' . $request->search . '%')
        ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(4);
      }



      elseif($request->category)
      {
        $posts =category::where('name',$request->category)->firstorFail()->posts()->paginate(4)->withQueryString();
      }
      else{
        $posts= Post::first()->latest()->paginate(4);
    }
      
        $categories= category::all();

      return view ('blogpost.blog',compact('posts' ,'categories'));

    }


    public function create()
    {
      $categories= category::all();

      return view ('blogpost.blog-create-post' ,compact('categories'));

    }



    public function store(Request $request)
    {

     $request->validate([
      
      'title'=>'required',
      'image'=>'required | image' ,
      'body'=>'required',
      'category_id'=>'required',
    
    ]);

    $title=$request->input('title');
    
    $category_id=$request->input('category_id');

    
    if(Post::latest()->first() !==null)
    {
      $PostId =Post::latest()->first()->id+1;
    }
    else{
      $PostId= 1;
    }

    $slug = Str::slug($title, '-').  '-' .$PostId;

    $user_id = Auth::user()->id;
    $body=$request->input('body');



    //file upload

    $imagePath = 'storage/'. $request->file('image')->store( 'postsImages','public');


    //post

  $post= new Post();

  $post->title=$title;
  $post->category_id=$category_id;
  $post->slug=$slug;
  $post->user_id=$user_id;
 
  $post->imagePath=$imagePath;
  $post->body=$body;
  
  $post->save();
   
return redirect()->back()->with('status', 'post was created successfull');
     

    }




    public function  show(Post $post)

    {
      $category=$post->category;
      $relatedPosts=$category->posts()
      ->latest()->take(4)->get();
     
      return view ('blogpost.single-blog',compact('post' ,'relatedPosts'));

    }
    public function  edit(Post $post)

    {
      if (auth()->user()->id !== $post->user->id)(
    
           abort(403));

     
      return view ('blogpost.edit-blog',compact('post'));

    }




    public function  destroy(Post $post)

    {

      $post->delete();
      return redirect()->back()->with('status', 'post  delete successfull');

    }



    public function update( Request $request,Post $post)

    {
      $request->validate([
      
        'title'=>'required',
        'image'=>'required | image' ,
        'body'=>'required'
      
      ]);
  
      $title=$request->input('title');
  
      $PostId= $post->id;
  
      $slug = Str::slug($title, '-').  '-' .$PostId;
  
      
      $body=$request->input('body');
  
  
  
      //file upload
  
      $imagePath = 'storage/'. $request->file('image')->store( 'postsImages','public');
  
  
      //post
  
    
  
    $post->title=$title;
    $post->slug=$slug;
    
   
    $post->imagePath=$imagePath;
    $post->body=$body;
    
    $post->save();
     
  return redirect()->back()->with('status', 'post was edited successfull');
       
      

    }






}