@extends('dashboard')

@section('title', 'Posts')

@section('content')

    @if ($posts->count())
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                           <span class="pull-right">
                               <a href="{{url('dashboard/posts/'.$post->id.'/edit')}}">
                                   <i class="fa fa-edit"></i>
                               </a>
                           </span>

                            <h3 class="box-title">{!! strip_tags($post->title) !!}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {!!  strip_tags(str_limit($post->body, 200)) !!}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            {!! link_to_route('dashboard.posts.show', 'View', array($post->id), array('class' => 'btn btn-info btn-block btn-flat btn-xs')) !!}
                            {{--{!! Form::open(array('method' => 'DELETE', 'route' => array('dashboard.posts.destroy', $post->id))) !!}--}}
                            {{--{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}--}}
                            {{--{!! Form::close() !!}--}}
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            @endforeach
        </div>
    @else
        There are no posts
    @endif

@endsection
