<?php

    namespace App\Http\Controllers;

    use App\Category;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use App\Gig;
    use Illuminate\Support\Facades\Input;
    use Intervention\Image\Facades\Image;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Support\Facades\File;

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
            $page_title = 'Is this all you have done?';
            $page_description = 'We are all apprentices in a craft where no one ever becomes a master.';
            $gigs = $this->gig->orderBy('created_at', 'desc')->get();

            return view('gigs.index', compact('gigs', 'page_title', 'page_description'));
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
            $categories = Category::all();

            return view('gigs.new', compact('page_title', 'page_description', 'categories'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @return Response
         */
        public function store()
        {
            $images = Input::file("images");
            $input = Input::except('_token', 'images');
            $g = new Gig($input);
            $g->save();
            $results = [];
            $img = head($images);
            foreach ($images as $i) {
                $results[] = self::process_image($i, $g);
            }
            self::make_thumb($img, $g);
            $g->images = json_encode($results);
            $g->save();
            return redirect()->to('dashboard/gigs');
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
            $gig = $this->gig->findOrFail($id);
            $gig = self::get_images($gig);
            dd($gig);
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

        private function get_images($gig)
        {
            if (self::isJson($gig->images) && !empty($gig->images)) {
                $images = json_decode($gig->images);
                $one = head($images);
                $gig->single_image = $one;
                $gig->all_images = $images;
            } else {
                $images[] = $gig->images;
                $gig->single_image = $gig->images;
                $gig->all_images = $images;
            }
            return $gig;
        }

        function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        private function process_image($i, $g)
        {
            $fileName = time() . '-' . $i->getClientOriginalName();
            $destination = public_path() . '/uploads/' . $g->id . '/';
            $i->move($destination, $fileName);
            $r = '/uploads/' . $g->id . '/' . $fileName;
            return $r;
        }

        private function make_thumb($i, $g)
        {
            $fileName = time() . '-' . $i->getClientOriginalName();
            $destination = public_path() . '/uploads/' . $g->id . '/';
            $thumb = Image::make($destination . $fileName)->fit(325, 280);
            $thumb->save(($destination . 'thumb.jpg'));
            return true;
        }


    }
