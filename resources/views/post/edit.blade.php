@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $post->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Post Type') }}</label>

                                <div class="col-md-6">
                                    <select id="type" name="type"
                                            class="form-control @error('type') is-invalid @enderror" required onchange="showMediaType(this)">
                                        <option value="">Select post type</option>
                                        <option value="only_image">Image only</option>
                                        <option value="youtube_post">Youtube Post</option>
                                        <option value="image_post">Image Post</option>
                                    </select>

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Post title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Post body') }}</label>

                                <div class="col-md-6">
                                    <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ $post->body }}" required autofocus>

                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="web_link"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Web link') }}</label>

                                <div class="col-md-6">
                                    <input id="web_link" type="text"
                                           class="form-control @error('web_link') is-invalid @enderror" name="web_link"
                                           value="{{ old('web_link') }}" required autofocus>

                                    @error('web_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="web_link_title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Web link title') }}</label>

                                <div class="col-md-6">
                                    <input id="web_link_title" type="text"
                                           class="form-control @error('web_link_title') is-invalid @enderror"
                                           name="web_link_title" value="{{ old('web_link_title') }}" required autofocus>

                                    @error('web_link_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="image-wrapper">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Post image') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="youtube-wrapper">
                                <label for="youtube_link" class="col-md-4 col-form-label text-md-right">{{ __('Post youtube link') }}</label>

                                <div class="col-md-6">
                                    <input id="youtube_link" type="url" class="form-control @error('youtube_link') is-invalid @enderror" name="youtube_link" value="{{ $post->youtube_link }}" required autofocus>

                                    @error('youtube_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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

@section('script')
    <script type="text/javascript">
        function showMediaType(e) {
            let value = e.value;
            let image = document.getElementById('image-wrapper');
            let youtubeLink = document.getElementById('youtube-wrapper');
            if(value === 'only_image') {
                image.style.display = 'flex';
                youtubeLink.style.display = 'none';
            }
            if(value === 'youtube_post') {
                youtubeLink.style.display = 'flex';
                image.style.display = 'none';
            }
            if(value === 'image_post') {
                youtubeLink.style.display = 'none';
                image.style.display = 'flex';
            }
        }
    </script>
@endsection
