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
      <div class="row d-flex justify-content-center">
            <!-- attendance -->
            <div class="col-xxl-6 col-md-6 card p-2">
                <h2 class=" mt-2 mb-3">Attendacnce</h2>
                <form action="{{ route('markattendance')}}" method="post">
                  @csrf
                    <p>Mark Your Attendacnce</p>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center justify-align-center">
                            <input type="radio" name="attendance" class="me-2" id="present" value="present">
                            <label for="present">Present</label>
                        </div>
                        <div class="col-md-6  d-flex justify-content-center justify-align-center">
                            <input type="radio" name="attendance" class="me-2" id="absent" value="absent">
                            <label for="absent">Absent</label>
                        </div>
                    </div>
                    <div class="row mt-3 d-flex justify-content-center">
                      <div class="col-md-4 ">
                        <button type="submit" class="btn btn-primary">Attendance</button>
                      </div>
                    </div>
                    <!-- dates -->
                    </div>
                </form>
            </div>
            <!-- End attendance -->
      </div>
    </section>

  </main>
 @endsection
