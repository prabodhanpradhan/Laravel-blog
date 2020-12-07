<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$get_posts= Post::get_posts();
		//print_r($get_posts);exit;
        return view('home')->with('posts',$get_posts);
    }
	public function create_post()
    {
		$categories=Category::all();
        return view('create-post')->with('categories',$categories);
    }
	public function store_post(Request $request)
	{
		$request->validate([
            'title'=>'required',
            'body'=>'required',
            'featured_image'=>'required|mimes:jpeg,jpg,png',
            'category'=>'required'
        ]);
		
		$image = $request->file('featured_image');
        $imageName=time().'_'.$image->getClientOriginalName();
        $destinationPath = 'featured_images';
        $image->move($destinationPath, $imageName);
		
		if(!empty($request->input('slug'))){ 
		$slug= $request->input('slug'); 
		}
		else{ 
		$slug= $request->input('title'); 
		}
		 $post = array(
                'post_title' => $request->input('title'),
                'post_slug' => $slug,
                'post_body' => $request->input('body'),
                'featured_image' => $imageName,
                'category_id' => $request->input('category'),				
           );
		Post::store_post($post);   
        return redirect('home')->with('success','Post has been added.');
	}
	public function delete_post(Request $request)
	{
		$post_id= $request->route('post_id');
	    $post= Post::edit_post($post_id);
		unlink('featured_images/'.$post[0]->featured_image);
		Post::delete_post($post_id); 
		
        return redirect('home')->with('success','Post deleted.');
	}
	public function edit_post(Request $request)
	{
		$post_id= $request->route('post_id');
		$categories=Category::all();
		$post= Post::edit_post($post_id);   
		return view('edit-post',compact(['post', 'categories']));
	}
	public function update_post(Request $request)
	{
		$post_id= $request->route('post_id');
		$request->validate([
            'title'=>'required',
            'body'=>'required',
            'category'=>'required'
        ]);
		if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $imageName=time().'_'.$image->getClientOriginalName();
			$destinationPath = 'featured_images';
			$image->move($destinationPath, $imageName);
        }else{
            $imageName=$request->input('prev_image');
        }
		$post = array(
                'post_title' => $request->input('title'),
                'post_slug' => $request->input('slug'),
                'post_body' => $request->input('body'),
                'featured_image' => $imageName,
                'category_id' => $request->input('category'),				
           );
		Post::update_post($post_id,$post);   
	    return redirect('home')->with('success','Post edited successfully.');
	}
	public function show_post(Request $request)
	{
		$post_id= $request->route('post_id');
		$post= Post::edit_post($post_id); 
		$categories=Category::all();		
		return view('show-post',compact(['post','categories']));
	}
}
