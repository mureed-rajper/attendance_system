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
      <div class="row card p-3">
        <h4>Update Leave Status</h4>
        <div class="col-md-12">
            <form action="{{ route('updateleave',$editleave->id)}}" method="post">
                @csrf
                <div class="row">
                <div class="col-md-6 mt-4">
                     <h5>Check Student's Details Before update leave status</h5>
                     <p>{{ Carbon\Carbon::parse($editleave->created_at)->format('M, Y')}}</p>
                    <!-- leaves -->
                    <label>Total Leaves</label>
                    <span>{{$leave}}</span> <br>
                    <!-- leaves -->
                    <label>Total Present</label>
                    <span>{{$present}}</span> <br>
                    <!-- leaves -->
                    <label>Total absent</label>
                    <span>{{$absent}}</span>
                </div>
                <div class="col-md-6 mt-4">
                    <label for="stauts">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="approved">Approved</option>
                        <option value="notapproved">Not Approved</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                  </div>
                </div>
                
            </form>
        </div>
      </div>
    </section>  
  </main>    
@endsection
