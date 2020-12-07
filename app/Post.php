<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public static function get_posts()
	{
	 return DB::table('posts')->get();
	}
    public static function store_post($post)
    {
        return DB::table('posts')->insert($post);
    }
	public static function delete_post($id)
	{
		return DB::table('posts')->where('id', $id)->delete();
	}
	public static function edit_post($id)
	{
		return DB::table('posts')->where('id', $id)->get();
	}
	public static function update_post($id,$post)
	{
		return DB::table('posts')->where('id',$id)->update($post);
	}
	public static function get_blogs()
	{
		return DB::table('posts')->simplePaginate(3);
	}
	public static function get_filter_blogs($cat_id)
	{
		return DB::table('posts')->where('category_id',$cat_id)->simplePaginate(3);
	}
	
}
