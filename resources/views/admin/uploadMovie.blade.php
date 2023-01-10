
@extends('adminLayouts.index')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Upload Movie</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Movie</li>
      <li class="breadcrumb-item active">Upload</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Upload Movie</h5>

          <!-- General Form Elements -->
          <!-- action="{{ route('store-Movie') }}" -->
          <form method="POST" id="upload_video" enctype="multipart/form-data" >
{{ csrf_field() }}
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Movie name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control movieName-modal-input" id="movieNameInput" name="movieName" placeholder="Enter Movie name...">
                <span class="movieName-modal-error" id="movieName"></span>
              </div>
            </div>
            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="languageInput" name="language">
                      <option selected>select language</option>
                      @foreach($languages as $data)
                        <option value="{{$data->language}}">{{$data->language}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" id="genreInput" name="genre">
                      <option selected>select genre</option>
                      @foreach($genres as $data)
                        <option value="{{$data->genre}}">{{$data->genre}}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Upload movie</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="file" id="file" placeholder="Add a video to upload">
                  </div>
            </div>
            <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px" id="descriptionInput" name="description"></textarea>
                  </div>
            </div>

            <div class="row mb-3">
                <center>
                <button type="button" id= "saveNewVideo" class="btn btn-primary" >Submit</button>
                </center>
              
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>

</main>
@endsection
@section('before_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(function(){
       $('#saveNewVideo').click(function() {
       
        var files = $('#file')[0].files;
        var fd = new FormData();
        var des = $("#descriptionInput").val();
        var genre = $("#genreInput").val();
        var language = $("#languageInput").val();
        var name = $("#movieNameInput").val();
        fd.append('file',files[0]);
        fd.append('genre',genre);
        fd.append('language',language);
        fd.append('name',name);
        fd.append('des',des);
          $.ajax({
              url: '/add-Movie',
              type:'post',
              data:fd,
              contentType: false,
              processData: false,
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              success:function(response){
                window.location = 'adminHome';
              },
            });
       });
    });    
</script>

@endsection