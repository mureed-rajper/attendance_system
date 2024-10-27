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
            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6 card p-4">
                <h4 class=" mt-2 mb-4">Leave</h4>
                <form action="{{ route('getleave')}}" method="post">
                  @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="subject">Subject</label>
                            <input type="text" value="{{ old('subject')}}" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject">
                            @error('subject')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="description">Description</label>
                          <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="1">{{ old('description')}}</textarea>
                           @error('description')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- dates -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="sdate">Starting Date</label>
                            <input type="date" value="{{ old('sdate')}}" class="form-control @error('sdate') is-invalid @enderror" name="sdate" id="sdate">
                            @error('sdate')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="edate">End Date</label>
                          <input type="date" value="{{ old('edate')}}" class="form-control  @error('edate') is-invalid @enderror" name="edate" id="edate">
                          @error('edate')
                            <span class="text-danger">
                              {{ $message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- submit button -->
                     <div class="row mt-4 d-flex justify-content-end">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Leave</button>

                        </div>
                     </div>
                </form>
            </div>
            <!-- End Sales Card -->
      </div>
    </section>

  </main>
 @endsection
