@extends('emails.master')

@section('content')
    <h1>{{$msg['email']}}({{$msg['name']}}) Contacted you!</h1>
    <hr>
    <p>
        {!! $msg['message'] !!}
    </p>
@endsection