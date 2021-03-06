<?php

    namespace App\Providers;

    use App\Post;
    use App\Gig;
    use Illuminate\Support\ServiceProvider;
    use App\Option;

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
                $rawPosts = Post::wherePublished(1)->take(3)->get();
                foreach ($rawPosts as $post) {
                    $posts[] = self::get_post_images($post);
                }

                $view->with('posts', $posts);
            });
            $data = Option::lists('option_value','option_name');
                view()->share('options', $data);
            view()->composer('front.portfolio-partial', function ($view) {
                $rawJobs = Gig::where('published', 1)
                    ->orderBy('id', 'desc')
                    ->get();
                foreach ($rawJobs as $work) {
                    $works[] = self::get_post_images($work);
                }
                $view->with('works', $works);
            });
            view()->composer('right', function ($view) {
                $settings = Option::all();
                $options = [];
                foreach ($settings as $setting) {
                    $options[] = self::clean_options($setting);
                }
                $view->with('site_options', $options);
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

        private function get_post_images($post)
        {
            if (self::isJson($post->images) && !empty($post->images)) {
                $images = json_decode($post->images);
                $one = head($images);
                $post->single_image = 'thumb' . $one;
                $post->all_images = $images;
            } else {
                $images[] = $post->images;
                $post->single_image = $post->images;
                $post->all_images = $images;
            }
            return $post;
        }

        function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
        private function clean_options($option)
        {
             $option->name_string = str_replace("_", " ", $option->option_name);
             return $option;
        }
    }
