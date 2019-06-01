@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        All Posts
                        <a href="{{ route('posts.create') }}" class="btn btn-success float-right">Add posts</a>
                    </div>
                    <div class="card-header">
                        <form class="form-inline">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Choose category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Choose category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Filter</button>
                        </form>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Post Type</th>
                                <th>Web Link</th>
                                <th>Web Link Title</th>
                                <th>Image</th>
                                <th>Youtube</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->type }}</td>
                                    <td>{{ $post->web_link }}</td>
                                    <td>{{ $post->web_link_title }}</td>
                                    @if($post->image === null)
                                        <td>No Image</td>
                                    @else
                                        <td>
                                            <img src="{{ $post->image }}" alt="Image" width="50px"/>
                                        </td>
                                    @endif
                                    @if($post->youtube_link === null)
                                        <td>No Youtube Link</td>
                                    @else
                                        <td style="word-break: break-all;">
                                            <iframe width="100" height="100" src="{{ $post->youtube_link }}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
