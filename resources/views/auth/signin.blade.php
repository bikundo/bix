@extends('frontend')

@section('content')
<style>
.outer-div{
     padding: 20%;
     min-height: 2000px;
     overflow-y: hidden;
}
::-webkit-scrollbar { 
    display: none; 
}
.inner-div{
     margin: 0 auto;
}
</style>
	<div class="outer-div blue accent-3">
  		<div class="inner-div">
  			  <a href="/auth/github" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">settings_power</i></a>
  		</div>
	</div>
@endsection
@section('footer-content')
	 <script>
    $( document ).ready(function(){
         Materialize.toast("Click the button below to log in.", 4000, 'rounded');
    })
</script>
@endsection
