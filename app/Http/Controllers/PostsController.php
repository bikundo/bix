<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\CreateArticleRequest;

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
        $posts = $this->post->all();
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

        return view('posts.create', compact('page_title', 'page_description'));
    }


    /**
     * @param CreateArticleRequest $request
     * @return mixed
     */
    public function store(CreateArticleRequest $request)
    {
        $input = Input::except('_token');

        $this->post->create($input);

        return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post created successfully.'));
        // return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
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
        $page_title = strip_tags($post->title);
        $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';
        return view('posts.show', compact('post', 'page_title', 'page_description'));
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

        return view('posts.edit', compact('post'));
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


        // return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
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

    public function upload()
    {
        $file = Input::file('file');
        $input = array('image' => $file);

        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);

        echo url('/uploads/' . $fileName);
    }
}