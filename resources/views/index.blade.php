@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
		@if(count($blogs)>0)
		@foreach($blogs as $blog)
		<div class="card">
        <div class="card-header">{{ $blog->post_title }}</div>
        <div class="card-body">   
		   <a href="/{{ $blog->post_slug }}/{{ $blog->id }}">
            <img src="{{ asset('featured_images/'.$blog->featured_image) }}" class="card-img-top mb-3" alt="{{ $blog->post_title }}">
            </a>
			<p><span class="badge badge-secondary">
			@foreach($categories as $cat)
			@if($cat->id == $blog->category_id)
			{{ $cat->name }}
			@endif
			@endforeach
			</span></p>
            <p>{{ \Illuminate\Support\Str::limit($blog->post_body,100,'...') }}</p>
            <p><a href="/{{ $blog->post_slug }}/{{ $blog->id }}" class="btn btn-dark btn-sm">Read More...</a></p>
        </div>
		</div><br>
		@endforeach	
	<div class="row" style="margin:10px;">
	{{ $blogs->links() }}
	</div>	
	@else
	<p>No Blogs</p>
	@endif
	</div>
	
	<div class="col-md-3">
	  <div class="card mb-4">
			<div class="card-header">
				Category Filter
			</div>
			<div class="list-group list-group-flush">
			@if(count($categories)>0)
					@foreach($categories as $cat)
						<a href="/category/{{$cat->name}}/{{$cat->id}}" class="list-group-item">{{$cat->name}}</a>
					@endforeach
			@endif
			</div>
		</div>
		</div>
			
	
	</div>
</div>
@endsection
