<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
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
        //cette fonction renvoie tous les posts de la BDD dans la vue authentifié a ce User
        // attention que le USer ait bien créé des posts sous son nom
        $postsAll = auth()->user()->posts; 

        //reprends les posts trié et les mets dans l'ordre d'update
        $posts = $postsAll->sortByDesc('updated_at');
        return view('posts_list.editPosts_list', compact('posts'));
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

        return redirect()->route('posts_list.create')->with('success','Votre article a bien été créé');
    }

    /**
     * Montrer un seul article.
     */
    public function show(Post $post)
    {
        return view('posts_list.one-post', compact('post'));
    }

    /**
     * Montrer le formulaire de modification.
     */
  
    public function edit(Post $post)
    {
    /* on vérifie que l'utilisateur est bien le propriétaire de l'article */
    if (Gate::denies('update-post', $post)) {
        abort(403,__("You don't have permission to perform this action !"));
    }
        return view('posts_list.partials.edit-one-post', compact('post'));
    }

    /**
     * Update de l'article en cours de modification.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        /* création d'un tableau pour changer le contenu des colonnes dans la BDD et vérifier aussi si l'image est mise à jour ou non */
        $arrayUpdate = [
            'post_title' => $request->title,
            'post_description' => $request->content,
        ];

        if ($request->image != null) {
            
            /* récupère l'image s'il y en a une et l'enregistre dans le dossier storage/app/public/posts*/
            $imageLink = $request->image->store('posts');
            /* va fusionner le tableau $arrayUpdate en rajoutant la clé/valeur "image"   */
            $arrayUpdate = array_merge($arrayUpdate, [
                'post_img' => $imageLink
            ]);
        }
        /* on vérifie que l'utilisateur est bien le propriétaire de l'article */
        if (Gate::denies('update-post', $post)) {
            abort(403,__("You don't have permission to perform this action !"));
        }
        /* On met à jour l'ensemble de l'article existant au travers du tableau $arrayUpdate */
        $post->update($arrayUpdate);

        return redirect()->route('posts_list.create')->with('success','Votre article a bien été modifié');
    }

    /**
     * Suppression de l'article en cours.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('destroy-post', $post)) {
            abort(403,__("You don't have permission to perform this action !"));
        }
        $post->delete();

        return redirect()->route('posts_list.create')->with('success','Votre article a bien été supprimé');
;    }
}
