<?php

    namespace App\Providers;

    use App\Post;
    use App\Gig;
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
                $posts = Post::wherePublished(1)->take(3)->get();
                $view->with('posts', $posts);
            });
            view()->composer('front.portfolio-partial', function ($view) {
                $works = Gig::wherePublished(1)->take(6)->get();
                $view->with('works', $works);
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
