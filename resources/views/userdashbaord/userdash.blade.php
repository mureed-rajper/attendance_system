@extends('userdashboard')

<!-- title -->
@section('title')
 user dashboard
@endsection

<!-- image -->
@php
  $img_name ="";
  foreach($image as $imgs)
   $img_name = $imgs->img
@endphp

@section('image')
<img src="{{ asset('storage/profile/'.$img_name)}}" alt="Profile"  style="border-radius:10px;">
@endsection


<!-- main section -->
 @section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
            <!-- present -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">This Month<span>| Present</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $present}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

             <!-- absent Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">This Month<span>| Absent</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-not-equal"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $absent}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

             <!-- leave Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">This Month<span>| Leaves</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $leave}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->
      </div>
    </section>

  </main>
 @endsection
