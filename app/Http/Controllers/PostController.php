<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    /**
     * Vue de tous les articles daqns l'ordre.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts_list.indexPosts_list', compact('posts'));
    }

    /**
     * Vue pour créer un article.
     */
    public function create()
    {
        return view('posts_list.edit');
    }

    /**
     * Enregistrement de l'article
     */
    public function store(StorePostRequest $request)
    {   
        $imageLink = $request->image->store('posts');

        Post::create([
            'post_title' => $request->title,
            'post_author' => $request->author,
            'post_description' => $request->content,
            'post_img' => $imageLink,
            'user_id' => $request->user
        ]);
        return redirect()->route('dashboard')->with('success','Article créé');
    }

    /**
     * Montrer.
     */
    public function show(Post $post)
    {
        return view('posts_list.one-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
