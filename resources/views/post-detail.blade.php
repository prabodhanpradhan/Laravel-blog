@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
		<p><a href="/" class="btn btn-primary">Back</a></p>
		@foreach($blogs as $blog)
		<div class="card">
        <div class="card-header">{{ $blog->post_title }}</div>
        <div class="card-body">   
            <img src="{{ asset('featured_images/'.$blog->featured_image) }}" class="card-img-top mb-3" alt="{{ $blog->post_title }}">
			<p><span class="badge badge-secondary">
			@foreach($categories as $cat)
			@if($cat->id == $blog->category_id)
			{{ $cat->name }}
			@endif
			@endforeach
			</span></p>
            <p>{{ $blog->post_body }}</p>
        </div>
		</div>
		@endforeach		   
	</div>
	</div>
</div>
@endsection
