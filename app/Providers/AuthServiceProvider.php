<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }

    public function update(User $user, BlogPost $blogPost)
    {
        return $user->id === $blogPost->author_id;
    }

    public function delete(User $user, BlogPost $blogPost)
    {
        return $user->id === $blogPost->author_id;
    }

}
