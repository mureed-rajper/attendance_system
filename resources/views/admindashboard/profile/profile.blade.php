@extends('admindashboard')

<!-- title -->
@section('title')
 admin profile
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
         <h4>Profile</h4>

         <!-- show message -->
          @if(session('sucess'))
          <div class="alert alert-success">
            {{ session('sucess')}}
          </div>
          @endif
         @if($profile->isEmpty())
           <div class="col-md-3 d-flex justify-content-center">
            <a href="{{ route('adminsetprofile')}}" class="text-decoration-none">
               <button type="submit" class="btn btn-primary">Update</button>
            </a>   
           </div>
         @else
         <div class="col-md-10">
          <div class="row">
              <div class="col-md-5  card ">
              @foreach($profile as $pro)
              <div class="d-flex justify-content-center">
               <img src="{{ asset('storage/adminprofile/'.$pro->img)}}" alt="no image" class=" mt-4" style="width:190px; height:190px; border-radius:50%;">
            </div>
                <h5 class="mt-4 text-center text-capitalize">{{$pro->name}}</h5>
                <h6 class="text-center">Admin</h6>
            </div>
          <div class="col-md-6 card ms-4 p-3">
              <h5 class="mt-3">Name: {{$pro->name}}</h5>
              <h5 class="mt-3">Age: {{$pro->age}}</h5>
              <h5 class="mt-3">Education: {{$pro->class}}</h5>
              <h5 class="mt-3">Date of Birth: {{ Carbon\Carbon::parse($pro->date_of_brith)->format('d M, Y')}}</h5>
              <h5 class="mt-3">City: {{$pro->city}}</h5>
            @endforeach  
            </div>
         </div>   
         @endif 
      </div>
      </div>
    </section>

  </main>
 @endsection
