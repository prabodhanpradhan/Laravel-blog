@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
		<div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
		<a href="/create-post" class="btn btn-primary" style="float:right;margin:5px;">Create Post</a>
           <table class="table table-bordered">
		   <tr>
		   <td>Title</td>
		   <td>Description</td>
		   <td>Action</td>
		   </tr>
		   	@foreach($posts as $post)
			<tr>
		   <td>{{ $post->post_title }}</td>
		   <td style="word-wrap:break-word;width:60%;">{{ \Illuminate\Support\Str::limit($post->post_body,100,'...') }}</td>
		   <td>
		   <a href="/post/show/{{ $post->id }}" class="btn btn-primary" style="margin:2px;">Show</a>		   
		   <a href="/post/edit/{{ $post->id }}" class="btn btn-info" style="margin:2px;">Edit</a>
		   <a href="/post/delete/{{ $post->id }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')" style="margin:2px;">Delete</a></td>
		   </tr>
			@endforeach		   
		   </table>
        </div>
    </div>
	</div>
	</div>
</div>
@endsection
