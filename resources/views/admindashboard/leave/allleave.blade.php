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

    @if(session('sucess'))
    <div class="alert alert-success">
        {{ session('sucess')}}
    </div>
    @endif

    <div class="row my-3 d-flex justify-content-end">
      <div class="col-md-6 d-flex">
        <form action="{{ route('allleaves')}}" method="get" class="d-flex w-100">
          @csrf
          <input type="text" class="form-control" value="{{Request::get('leav')}}" placeholder="search student's leave by id" name="leav">
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <div class="col-md-2">
          <a href="{{ route('allleaves')}}" class="btn btn-secondary ms-3">Clear</a>

        </div>
      </div>
    </div>
    <section class="section dashboard">
      <div class="row card p-3">
         <h4>Student's All Leaves</h4>
         <div class="col-md-12">
         <table class="table table-bordered">
           <thead>
            <td>Student</td>
            <td>Subject</td>
            <td>Description</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Status</td>
           </thead>
           <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->user->name}}</td>
                <td>{{ $leave->subject}}</td>
                <td>{{ $leave->description}}</td>
                <td>{{ Carbon\Carbon::parse($leave->start_date)->format('d M, Y')}}</td>
                <td>{{ Carbon\Carbon::parse($leave->end_date)->format('d M, Y')}}</td>
                <td>
                  @if($leave->status == 'approved')  
                  <a href="{{ route('editleave',$leave->id)}}" class="text-decoration-none btn btn-primary text-light">{{ $leave->status}}</a>
                  @elseif($leave->status == 'notapproved')  
                  <a href="{{ route('editleave',$leave->id)}}" class="text-decoration-none btn btn-danger text-light">{{ $leave->status}}</a>
                  @else
                  <a href="{{ route('editleave',$leave->id)}}" class="text-decoration-none btn btn-warning">{{ $leave->status}}</a>
                  @endif

                </td>
            </tr>
            @endforeach
           </tbody>

         </table>
         </div>
         {{$leaves->links()}}
      </div>
    </section>

  </main>
 @endsection
