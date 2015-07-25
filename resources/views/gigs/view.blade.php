@extends('frontend')

@section('content')
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h5 class="center">Description</h5>
            <p class="light">{!!$gig->description !!}</p>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>
          
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
@endsection
@section('footer-content')
	 <script>
    $( document ).ready(function(){
         Materialize.toast("Click the button log in.", 4000, 'rounded');
    })
</script>
@endsection
