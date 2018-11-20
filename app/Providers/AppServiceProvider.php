<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\User;
use App\Model\Article;
use App\Model\comment;
use App\Model\Leaving;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user = User::all();
        $article = Article::all();
        $comment = comment::all();
        // $leaving = Leaving::all();
        // view()->share('leaving',$leaving);
        view()->share('user', $user);
        view()->share('article',$article);
        view()->share('comment',$comment);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
