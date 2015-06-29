<?php

    namespace App\Http\Controllers;

    use App\Message;
    use Illuminate\Http\Request;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Response;
    use Illuminate\Support\Facades\Validator;
    use Mail;

    class messagesController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
            //
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @return Response
         */
        public function store()
        {
            $validator = Validator::make(Input::all(), [
                'name'    => 'required',
                'email'   => 'required|email',
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [];
                $response['success'] = false;
                $response['message'] = 'There are errors in the form. Please check and try to send again.';
                return Response::json($response);
            } else { // the validation has not failed, it has passed


                // Send the email
                $msg = Input::only('message', 'name', 'email');
                $subject = 'Incoming!';
                Mail::send('emails.contact', ['msg' => $msg], function ($message) use ($subject) {
                    $message->to('binmonk@gmail.com', '')
                        ->subject($subject);
                });

//                save
                Message::create($msg);
                // response Json
                $response = [];
                $response['success'] = true;
                $response['message'] = 'Your message has been received. I will be in touch soon';
                return Response::json($response);
            }
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  int $id
         * @return Response
         */
        public function update($id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return Response
         */
        public function destroy($id)
        {
            //
        }
    }
