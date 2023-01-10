
@extends('userLayouts.index')
@section('content')
<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg">
      <div class="row">

        <!-- Sales Card -->
        @foreach ($movies as $movie)
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">{{ $movie->moviename }}</h5>

              <div class="d-flex align-items-center">
                <iframe width="560" height="315" src="{{ $movie->movie}}">
              </iframe>
                <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div> -->
                <!-- <div class="ps-3">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div> -->
              </div>
            </div>

          </div>
        </div>
        @endforeach
        <!-- End Sales Card -->

        <!-- Revenue Card -->
      
        <!-- End Revenue Card -->

      </div>
    </div><!-- End Left side columns -->
  </div>
</section>

</main>

@endsection