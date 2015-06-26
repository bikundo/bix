<?php

    namespace App\Providers;

    use App\Post;
    use Illuminate\Support\ServiceProvider;

    class ViewComposerServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap the application services.
         *
         * @return void
         */
        public function boot()
        {
            view()->composer('front.blog-partial', function ($view) {
                $posts = Post::wherePublished(1)->take(4)->get();
                $view->with('posts', $posts);
            });
        }

        /**
         * Register the application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }
    }
