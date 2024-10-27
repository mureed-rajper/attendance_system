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
      <div class="row mt-5 card p-4">
        <h4 class="my-3">Set Your Profile</h4>
        <form action="{{ route('setprofile')}}" method="post" enctype="multipart/form-data">
          @csrf
        
        <!-- name and age -->
        <div class="row">
            <div class="col-md-6">
              <label for="name">Name</label>
              <input type="text" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
              @error('name')
              <span class="text-danger">
                {{ $message}}
              </span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="age">Age</label>
              <input type="text" value="{{ old('age')}}" class="form-control @error('age') is-invalid @enderror" name="age" id="age">
                @error('age')
                <span class="text-danger">
                  {{ $message}}
                </span>
                @enderror
            </div>
        </div>

        <!-- class and date of birth -->
          <!-- name and age -->
        <div class="row mt-3">
            <div class="col-md-6">
              <label for="class">Class</label>
              <select class="form-control @error('class') is-invalid @enderror" name="class" id="class">
                <option value="">Select Your Class</option>
                <option value="one_class">One Class</option>
                <option value="two_class">Two Class</option>
                <option value="three_class">Three Class</option>
                <option value="four_class">Four Class</option>
                <option value="five_class">Five Class</option>
                <option value="six_class">Six Class</option>
              </select>
              @error('class')
                <span class="text-danger">
                  {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="birthday">Date of Birth</label>
              <input type="date" value="{{ old('birthday')}}" class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="birthday">
                @error('birthday')
                <span class="text-danger">
                  {{ $message}}
                </span>
                @enderror
            </div>
        </div>

        <!-- image -->
         <div class="row d-flex mt-3">
         <div class="col-md-6">
                <label for="city">City</label>
                <input type="text" name="city" value="{{old('city')}}" id="city" class="form-control @error('city') is-invalid @enderror">
                @error('city')
                <span class="text-danger">
                  {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="img">Image</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
         </div>

         <!-- submit button -->
          <div class="row  d-flex justify-content-end mt-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Set Profile</button>
            </div>
          </div>
      </div>
      </form>
    </section>
</main>
@endsection       
