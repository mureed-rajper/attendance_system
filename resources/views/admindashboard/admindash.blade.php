@extends('admindashboard')

<!-- title -->
@section('title')
 admin dashboard
@endsection

<!-- image -->
@php
  $img_name ="";
  foreach($profile as $imgs)
   $img_name = $imgs->img
@endphp

@section('image')
  @if(!empty($img_name))
   <img src="{{ asset('storage/adminprofile/'.$img_name)}}" alt="Profile"  style="border-radius:10px;">
   @endif
@endsection


<!-- main section -->
 @section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
            <!-- Total students -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total <span>| students</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-book-open-reader"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $students}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>

             <!-- total reports -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total <span>| reports</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $reports}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

             <!-- total leaves -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total <span>| leaves</span></h5>

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
