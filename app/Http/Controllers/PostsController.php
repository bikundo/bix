<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\CreateArticleRequest;
    use App\Post;
    use App\Tag;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\Facades\Image;

    /**
     * Class PostsController
     * @package App\Http\Controllers
     */
    class PostsController extends Controller
    {

        /**
         * Post Repository
         *
         * @var Post
         */
        protected $post;

        public function __construct(Post $post)
        {
            $this->post = $post;
        }

        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            $p = $this->post->orderBy('created_at', 'desc')->get();
            foreach ($p as $post) {
                $posts[] = self::get_images($post);
            }

            return view('posts.index', compact('posts'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            $page_title = 'create new blog post';
            $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';
            $tags = Tag::all();

            return view('posts.create', compact('page_title', 'page_description', 'tags'));
        }


        /**
         * @param CreateArticleRequest $request
         * @return mixed
         */
        public function store(CreateArticleRequest $request)
        {
//            dd(Input::all());
            $images = Input::file("images");
            $input = Input::except('_token', 'images', 'tags');
            $g = new Post($input);
            $g->save();
            $g->tags()->sync(Input::get('tags'));
            $img = head($images);
            foreach ($images as $i) {
                $results[] = self::process_image($i, $g);
            }
            self::make_thumb($img, $g);
            $g->images = json_encode($results);
            $g->save();

            return redirect()->to('dashboard/posts');
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function show($id)
        {
            $post = $this->post->findOrFail($id);
            $post = self::get_images($post);
            return view('posts.show', compact('post'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function edit($id)
        {
            $post = $this->post->find($id);

            if (is_null($post)) {
                return Redirect::route('posts.index');
            }
            $page_title = strip_tags($post->title);

            return view('posts.edit', compact('post', 'page_title'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  int $id
         * @return Response
         */
        public function update($id)
        {
            $input = Input::except('_token', '_method');

            $post = Post::find($id);
            $post->update($input);

            return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post updated successfully.'));


        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return Response
         */
        public function destroy($id)
        {
            $this->post->find($id)->delete();

            return Redirect::route('posts.index');
        }

        private function get_images($post)
        {
            if (self::isJson($post->images) && !empty($post->images)) {
                $images = json_decode($post->images);
                $one = head($images);
                $post->single_image = $one;
                $post->all_images = $images;
            } else {
                $images[] = $post->images;
                $post->single_image = $post->images;
                $post->all_images = $images;
            }
            return $post;
        }
        private function process_image($i, $g)
        {
            $fileName = time() . '-' . $i->getClientOriginalName();
                $destination = public_path() . '/uploads/blog/' . $g->id . '/';
            $i->move($destination, $fileName);
            $r = '/uploads/' . $g->id . '/' . $fileName;
            return $r;
        }

        private function make_thumb($i, $g)
        {
            $fileName = time() . '-' . $i->getClientOriginalName();
            $destination = public_path() . '/uploads/blog/' . $g->id . '/';
            $thumb = Image::make($destination . $fileName)->fit(325, 280);
            $thumb->save(($destination . 'thumb.jpg'));
            return true;
        }

        function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }
    }