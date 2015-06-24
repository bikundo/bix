<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;

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
    {   $page_title = 'create new blog post';
        $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';
        return view('posts.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

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
        $input = array_except(Input::all(), '_method');

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