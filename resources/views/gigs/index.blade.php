@extends('dashboard')

@section('title', 'Is this all you have done?')

@section('content')
    <div class="row">
        <div class="box box-solid">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="row">
                    @foreach($gigs as $w)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua">
                                    <i class="fa fa-bookmark-o"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">{{$w->name}}</span>
                                    <span class="info-box-number">{{$w->hits}} likes</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection