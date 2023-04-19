<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // --------->>>>>>>> POSTS <<<<<<<<<---------
        //application des restrictions en application des règles d'autorisations
        $this->registerPolicies();
        
        // définiton de qui a le droit en fonction de la méthode utilisée réponse en BOOLEEN
        Gate::define('MAJ-post', function (User $user, Post $post)
        {
            return $user->id == $post->user_id;
        });

        // -------->>>>>>>> EVENTS <<<<<<<<<--------
        // définiton de qui a le droit en fonction de la méthode utilisée réponse en BOOLEEN
        Gate::define('MAJ-event', function (User $user, Event $event)
        {
            return $user->id == $event->user_id;
        });
    }
}
