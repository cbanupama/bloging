<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = Input::get('category_id');

        if($categoryId === '' || $categoryId === null) {
            $posts = Post::with('category')->get();
        } else {
            $posts = Post::with('category')->where('category_id', $categoryId)->get();
        }

        $posts->map(function ($item, $key) {
            $contentTypes = [];
            if($item->image !== null && $item->youtube_link === null) {
                $contentTypes[] = 'image only';
            }
            if($item->youtube_link !== null && $item->image === null) {
                $contentTypes[] = 'youtube only';
            }
            if($item->youtube_link !== null && $item->image !== null) {
                $contentTypes[] = 'both image and youtube';
            }
            $item['content_type'] = implode('/', $contentTypes);
        });
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('public/images');

        $post = Post::create([
            'category_id'  => $request->get('category_id'),
            'title'        => $request->get('title'),
            'body'         => $request->get('body'),
            'image'        => $path,
            'youtube_link' => $request->get('youtube_link')
        ]);

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('category')->findOrFail($id);

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::with('category')->findOrFail($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
        } else {
            $path = $post->image;
        }

        $post->category_id = $request->get('category_id');
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->image = $path;
        $post->youtube_link = $request->get('youtube_link');
        $post->save();

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json($post);
    }
}
