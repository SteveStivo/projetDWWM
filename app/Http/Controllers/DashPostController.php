<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashPostController extends Controller
{
    public function index()
    {
        //cette fonction renvoie tous les posts de la BDD dans la vue authentifié a ce User
        $posts = auth()->user()->posts;
        return view('posts_list.edit', compact('posts'));
    }
}
