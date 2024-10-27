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
      <a href="{{ route('allgrades')}}" class="btn btn-primary my-3">Grades</a>
      <div class="row card p-3">
         <h4>Student's Upgrading</h4>
         <div class="col-md-12">

         <form action="{{ route('grades')}}" method="post">    
          @csrf    
           <!-- name and total present -->
          <div class="row mt-2">
            <div class="col-md-6">
                <label for="grad">Grades</label>
                <select name="grade" id="grad" class="form-control">
                    <option value="a grade">A Grades</option>
                    <option value="b grade">B Grades</option>
                    <option value="c grade">C Grades</option>
                    <option value="d grade">D Grades</option>
                    <option value="e grade">E Grades</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="days">Min Present Days</label>
                <select name="days" id="days" class="form-control">
                    <option value="26">26 days A Grade</option>
                    <option value="20">20 days B Grade</option>
                    <option value="15">15 days C Grade</option>
                    <option value="10">10 days D Grade</option>
                    <option value="9">9 days C Grade</option>
                </select>
            </div>
          </div>

           <!-- grade -->
            <div class="row d-flex justify-content-end">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary mt-4 w-100">Upgrading</button>
                </div>
            </div>
            </form>
         </div>
         </div>
      </div>
    </section>

  </main>
 @endsection
