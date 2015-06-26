<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gig;

class GigsController extends Controller
{
    protected $gig;

    public function __construct(Gig $gig)
    {
        $this->gig = $gig;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $gigs = $this->gig->orderBy('created_at','desc')->get();

        return view('gigs.index', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $page_title = 'create new gig';
        $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';

        return view('gigs.create', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::except('_token');

        $this->gig->create($input);

        return Response::json(array('success' => true, 'errors' => '', 'message' => 'gig created successfully.'));
        // return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $gig = $this->gig->findOrFail($id);
        $page_title = strip_tags($gig->title);
        $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';

        return view('gigs.show', compact('gig', 'page_title', 'page_description'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $gig = $this->gig->find($id);

        if (is_null($gig)) {
            return Redirect::route('gigs.index');
        }
        $page_title = strip_tags($gig->title);

        return view('gigs.edit', compact('gig', 'page_title'));
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

        $gig = Gig::find($id);
        $gig->update($input);

        return Response::json(array('success' => true, 'errors' => '', 'message' => 'gig updated successfully.'));


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
        $this->gig->find($id)->delete();

        return Redirect::route('gigs.index');
    }
}