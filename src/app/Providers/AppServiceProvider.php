<?php

namespace App\Providers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('pages._sidebar', function ($view){
           $view->with('popularPosts', Post::orderBy('views', 'desc')->take(3)->get());
           $view->with('recentPosts', Post::orderBy('date', 'desc')->take(4)->get());
           $view->with('featuredPosts', Post::where('is_featured', 1)->take(3)->get());
           $view->with('categories', Category::all());
        });

        View::composer('admin.layout', function ($view){
           $view->with('user', Auth::user());
           $view->with('unAllowedComments', Comment::where('status', 1)->count());
        });
    }
}
