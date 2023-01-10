
@extends('adminLayouts.index')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Language</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Category</li>
      <li class="breadcrumb-item active">Language</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Language</h5>

          <!-- General Form Elements -->
          <form  id="language_form" action="javascript:void(0)" enctype="multipart/form-data" method="POST" >
          @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Language</label>
              <div class="col-sm-10">
                <input type="text" class="form-control language-modal-input" id="languageInput" name="language" placeholder="Enter language name...">
                <span class="language-modal-error" id="language"></span>
              </div>
            </div>

            <div class="row mb-3">
                <center>
                <button type="button" class="btn btn-primary" id="btnsave">Submit</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(function(){
       $('#btnsave').click(function() {
        var formData = $("#language_form").serialize();
          $.ajax({
              url: '/add-language',
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