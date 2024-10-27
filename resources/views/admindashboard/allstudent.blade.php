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

    <div class="row my-3 d-flex justify-content-end">
      <div class="col-md-6 d-flex">
        <form action="{{ route('allstudents')}}" method="get" class="d-flex w-100">
          @csrf
          <input type="text" class="form-control" value="{{Request::get('student')}}" placeholder="search student" name="student">
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <a href="{{ route('allstudents')}}" class="btn btn-secondary ms-3">Clear</a>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row card p-3">
         <h4>All Students</h4>
         <div class="col-md-12">
         <table class="table table-bordered">
           <thead>
            <td>Student Id</td>
            <td>Name</td>
            <td>Age</td>
            <td>Class</td>
            <td>Date Of Birth</td>
            <td>City</td>
            <td>Image</td>
            <td>Mark Attendance</td>
            <td>Grade</td>
           </thead>
           <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->user->id}}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->age}}</td>
                <td>{{ $student->class}}</td>
                <td>{{ Carbon\Carbon::parse($student->date_of_brith)->format('d M, Y')}}</td>
                <td>{{ $student->city}}</td>
                <td><img src="{{ asset('storage/profile/'. $student->img)}}" style="width:110px;height:70px; border-radius:5px;"></td>
                <td>
                  <a href="{{ route('adminattend',$student->id)}}" class="text-decoration-none btn btn-primary">Attendance</a>
                </td>
                <td>
                  <a href="{{ route('studentgrade',$student->user->id)}}" class="text-decoration-none btn btn-success">Grade</a>
                </td>
               </tr>
            @endforeach
           </tbody>

         </table>
         {{$students->links()}}
         </div>
      </div>
    </section>

  </main>
 @endsection
