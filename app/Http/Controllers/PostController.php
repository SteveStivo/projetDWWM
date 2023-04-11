<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    /**
     * Vue de tous les articles dans l'ordre.
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
        return view('posts_list.partials.create-post-form');
    }

    /**
     * Enregistrement de l'article dans la base de données
     */
    public function store(StorePostRequest $request)
    {   
        if (isset($request->image)) {
            /* enregistre l'image dans le dossier storage/app/public/posts et pour qu'il ne soit pas modifiable par un utilisatur on crée un link dans public/storage/posts grâce à la commande php artisan LINK >>>>> cela crée un lien url crypté dans la base de donnée pour les retrouver ensuite <<<<<< */
            $imageLink = $request->image->store('posts');
    } else {
            $imageLink = null;
    };
        Post::create([
            'post_title' => $request->title,
            'post_description' => $request->content,
            'post_img' => $imageLink,
            /* la valeur de user_id (donc l'ID de l'utilisateur authentifié) est associé par le MODEL Post en récupérant le $post->user()->associate(auth()->user()->id) dans la class Post */
            'user_id' => $request->user
        ]);

        return redirect()->route('dashboard')->with('success','Votre article a bien été créé');
    }

    /**
     * Montrer un seul article.
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
        return view('posts_list.edit', compact('post'));
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
