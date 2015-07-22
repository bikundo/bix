@extends('frontend')

@section('content')
<style>
.outer-div{
    /*padding: 20%;*/
    min-height: 100%;
    min-width: 100%;
    position: absolute;
    top: 0;
    width: auto;
}
::-webkit-scrollbar { 
    display: none; 
}
.inner-div{
    margin: 0 auto;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100px;
    height: 100px;
    -webkit-transform: translate(-50%, -50%);  
    transform: translate(-50%, -50%); 
}
</style>
	<div class="outer-div blue accent-3">
  		<div class="inner-div">
  			  <a href="/auth/github" class="btn-floating btn-large waves-effect waves-light red">
                  <i class="material-icons">settings_power</i>
              </a>
  		</div>
	</div>
@endsection
@section('footer-content')
	 <script>
    $( document ).ready(function(){
         Materialize.toast("Click the button log in.", 4000, 'rounded');
    })
</script>
@endsection
