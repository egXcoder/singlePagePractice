<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostsResource;
use App\Http\Resources\SinglePostResource;
use Validator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return PostsResource::collection($posts);
    }

    public function create()
    {
        $validator = Validator::make(request()->all(), [
            'subject' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'image' => 'max:10000|image',
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag()->all();
        }

        $validated = $validator->getData();

        if (request()->has('image')) {
            $newName = time() . $validated['image']->getClientOriginalName();
            $validated['image']->move(public_path('img'), $newName);
        }

        Post::create([
            'title' => $validated['subject'],
            'slug' => str_slug($validated['subject']),
            'body' => $validated['content'],
            'image' => request()->has('image') ? asset('img/' . $newName) : null
        ]);
        return redirect()->back();
    }

    public function show(Post $post)
    {
        return new SinglePostResource($post);
    }
}
