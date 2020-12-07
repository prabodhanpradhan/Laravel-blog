@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    <form method="POST" action="/post/edit/{{ $post[0]->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="post name" class="col-md-4 col-form-label">Title</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post[0]->post_title }}" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<div class="form-group">
                            <label for="post Slug" class="col-md-4 col-form-label">Slug</label>

                            <div class="col-md-12">
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $post[0]->post_slug }}">

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="post body" class="col-md-4 col-form-label">Body</label>

                            <div class="col-md-12">
                                <textarea class="form-control @error('body') is-invalid @enderror" name="body" required>{{ $post[0]->post_body }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="row">
						<div class="col-md-6">
                        <div class="form-group">
                            <label for="Feature image" class="col-md-4 col-form-label">Featured Image</label>

                            <div class="col-md-12">
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image">
                                @error('featured_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
							
                        </div>
						</div>
						<div class="col-md-6">
							<input type="hidden" name="prev_image" value="{{ $post[0]->featured_image }}" />
                                <img src="{{ asset('featured_images/'.$post[0]->featured_image) }}" width="100" />

							</div>
							</div>

                        <div class="form-group">
                            <label for="Category" class="col-md-4 col-form-label">Category</label>

                            <div class="col-md-12">
                                <select class="form-control" name="category" required>
								<option>Select Category</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ ($post[0]->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
								@endforeach
								</select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
								<a href="/home" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
