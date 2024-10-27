@extends('userdashboard')

<!-- title -->
@section('title')
 user profile 
@endsection

<!-- image -->
@php
  $img_name ="";
  foreach($profile as $imgs)
   $img_name = $imgs->img
@endphp

@section('image')
<img src="{{ asset('storage/profile/'.$img_name)}}" alt="Profile"  style="border-radius:10px;">
@endsection

<!-- main -->
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
      @if(session('sucess'))
      <div class="alert alert-success">
        {{ session('sucess')}}
      </div>
      @endif
      <div class="row mt-5">
      @if($profile->isEmpty())
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-sm">
            <a href="{{ route('getprofile')}}" class="text-decoration-none text-light">Update Profile</a>  
            </button>
          </div>  
         @else
          
         <div class="col-md-4 card">
         
          @foreach($profile as $pro)
              
          <div class="d-flex justify-content-center">
             <img src="{{ asset('storage/profile/'.$pro->img)}}" alt="no image" class=" mt-4 d" style="width:190px; height:190px; border-radius:50%;">
          </div>
             <h5 class="mt-4 text-center text-capitalize">{{$pro->name}}</h5>
             <h6 class="text-center">student</h6>
            </div>
            <div class="col-md-4 card ms-4 p-3">
              <h5 class="mt-3">Name: {{$pro->name}}</h5>
              <h5 class="mt-3">Age: {{$pro->age}}</h5>
              <h5 class="mt-3">Class: {{$pro->class}}</h5>
              <h5 class="mt-3">Date of Birth: {{ Carbon\Carbon::parse($pro->date_of_brith)->format('d M, Y')}}</h5>
              <h5 class="mt-3">City: {{$pro->city}}</h5>
              </h5>
            </div>
          @endforeach
        @endif
      </div>

    </section>
</main>    
@endsection

         


          