<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogsController extends Controller
{
	public function index()
	{
		$blogs= Post::get_blogs();
		$categories=Category::all();
		return view('index',compact(['blogs','categories']));
	}
	public function postdetail(Request $request)
	{
	  $post_id= $request->route('post_id');
	  $blogs= Post::edit_post($post_id);
	  $categories=Category::all();
	  return view('post-detail',compact(['blogs','categories']));
	}
	public function category_filter(Request $request)
	{
		$category_id= $request->route('category_id');
		$blogs= Post::get_filter_blogs($category_id);
		$categories=Category::all();
		return view('index',compact(['blogs','categories']));
		
	}
}
