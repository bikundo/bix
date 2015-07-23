@extends('dashboard')
@section('content')

<div class='container'>
	{!! Form::open(['url' => 'dashboard/gigs/'.@$gig->id, 'method' =>'put', 'class'=>'form', 'role'=>'form']) !!}
	@if(count($errors) > 0)
	<div role='alert' class='alert alert-danger'>
		{!! HTML::ul($errors->all()) !!}
	</div>
	@endif
	<div class='row'>
		<div class='col-md-12'>
			<div class='form-group'>
				<!-- `Name` Field -->
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('gig[name]', @$gig->name, ['class'=>'form-control']) !!}
			</div>
			<div class='form-group'>
				<!-- `Description` Field -->
				{!! Form::label('description', 'Description') !!}
				<textarea class="form-control" name="gig[description]"  rows="7">
					{{   $gig->description }}
				</textarea>
			</div>
			<div class='form-group'>
				<!-- `Url` Field -->
				{!! Form::label('url', 'Url') !!}
				{!! Form::text('gig[url]', @$gig->url, ['class'=>'form-control']) !!}
			</div>
			<div class='form-group'>
				<!-- `Published` Field -->
				{!! Form::label('published', 'Published') !!}
				{!! Form::text('gig[published]', @$gig->published, ['class'=>'form-control']) !!}
			</div>
		</div>
		<div class='col-md-12 text-right'>
			<!-- Form actions -->
			<a href='{!!URL::previous()!!}' class='btn btn-default'>Cancel</a>
			<button type='submit' class='btn btn-default'>Submit</button>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@stop