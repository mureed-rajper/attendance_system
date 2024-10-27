@extends('admindashboard')

<!-- title -->
@section('title')
 admin edit attendance
@endsection

<!-- image -->

@php
$img_name ="";

foreach($profile as $imgs)
$img_name = $imgs->img;
@endphp

@section('image')
  @if(!empty($profile))
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
           <div class="col-xxl-6 col-md-6 card p-2">
                <h2 class=" mt-2 mb-3">Attendacnce</h2>
                <form action="{{ route('updateattendance',$attendance->id)}}" method="post">
                  @csrf
                    <p>Admin Mark student's Attendacnce</p>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center justify-align-center">
                            <input type="radio" name="attendance" class="me-2" id="present" value="present" {{($attendance->attendance == 'present')? 'checked' : ''}}>
                            <label for="present">Present</label>
                        </div>
                        <div class="col-md-6  d-flex justify-content-center justify-align-center">
                            <input type="radio" name="attendance" class="me-2" id="absent" value="absent" {{($attendance->attendance == 'absent')? 'checked' : ''}}>
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

      </div>
    </section>

  </main>
 @endsection


