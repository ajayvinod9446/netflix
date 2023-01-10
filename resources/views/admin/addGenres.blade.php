
@extends('adminLayouts.index')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Genres</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Category</li>
      <li class="breadcrumb-item active">Genres</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Genres</h5>

          <!-- General Form Elements -->
          <form  id="genres_form" action="javascript:void(0)" enctype="multipart/form-data" method="POST" >
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Genres</label>
              <div class="col-sm-10">
                <input type="text" class="form-control genres-modal-input" id="genresInput" name="genres" placeholder="Enter genres name...">
                <span class="genres-modal-error" id="genres"></span>
              </div>
            </div>

            <div class="row mb-3">
                <center>
                <button type="button" class="btn btn-primary" id="btnsave">Submit</button>
                </center>
              
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>
  </div>
</section>

</main>
  @endsection
  @section('before_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(function(){
       $('#btnsave').click(function() {
        var formData = $("#genres_form").serialize();
        console.log(formData);  
          $.ajax({
              url: '/add-genres',
              type:'post',
              data:formData,
              dataType: 'JSON',
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