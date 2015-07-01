<div class="overlay overlay-hugeinc">
    <button type="button" class="overlay-close">
        <i class="fa fa-times fa-lg"></i>
    </button>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="">
            <h3 class="text-center">Create</h3>
            <hr>
            <form role="form" action="/dashboard/portfolio" method="post" id="new-job-form"
                  enctype="multipart/form-data">
               <span class="input input--isao">
					<input class="input__field input__field--isao" type="text" name="name"
                           id="input-38"/>
					<label class="input__label input__label--isao" for="input-38" data-content=" Name">
                        <span class="input__label-content input__label-content--isao">name</span>
                    </label>
				</span>
				<span class="input input--isao">
					<input class="input__field input__field--isao  my-editable-divs" name="url"
                           type="text"
                           id="input-39"/>
					<label class="input__label input__label--isao" for="input-39" data-content="Link ">
                        <span class="input__label-content input__label-content--isao">Link</span>
                    </label>
				</span>

                <div class="description-editable my-editable-divs" id="description">
                    <p>Description</p>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" class="form-images" name="images[]" id="exampleInputFile">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" class="form-images" name="images[]" id="exampleInputFile">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" class="form-images" name="images[]" id="exampleInputFile">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" id="csrf_token" v-model="newMessage._token"
                       value="<?php echo csrf_token(); ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@section('footer-scripts')
    <script>
        var descriptionEditor = new MediumEditor('.description-editable ');
        $("#new-job-form").submit(function (eventObj) {
            var desc = descriptionEditor.serialize();
            var d = desc['description']['value'];
            $(this).append('<input type="hidden" name="description" value="' + d + '" /> ');
            return true;
        });
    </script>
@endsection
