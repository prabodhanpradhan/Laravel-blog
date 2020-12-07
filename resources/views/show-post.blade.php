@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
		<a href="/home" class="btn btn-primary" style="margin:5px;">Back</a>
		@foreach($post as $post)
		<div class="card">
        <div class="card-header">{{ $post->post_title }}</div>
        <div class="card-body">   
            <img src="{{ asset('featured_images/'.$post->featured_image) }}" class="card-img-top mb-3" alt="{{ $post->post_title }}">
			<p><span class="badge badge-secondary">
			@foreach($categories as $cat)
			@if($cat->id == $post->category_id)
			{{ $cat->name }}
			@endif
			@endforeach
			</span></p>
            <p>{{ $post->post_body }}</p>
        </div>
		</div>
		@endforeach		   
	</div>
	</div>
</div>
@endsection
