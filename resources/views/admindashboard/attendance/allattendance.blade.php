<div>
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

  <!-- show messages  -->
    @if(session('sucess'))
    <div class="alert alert-success">
      {{ session('sucess')}}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
      {{ session('error')}}
    </div>
    @endif

    <div class="row my-3 d-flex justify-content-end">
      <div class="col-md-6 d-flex">
        <form action="{{ route('allattend')}}" method="get" class="d-flex w-100">
          @csrf
          <input type="text" class="form-control" value="{{Request::get('attend')}}" placeholder="search student's attendance by id" name="attend">
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <div class="col-md-2">
          <a href="{{ route('allattend')}}" class="btn btn-secondary ms-3">Clear</a>

        </div>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row card p-3">
         <h4>Student's Attendance </h4>
         <div class="col-md-12">
         <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>Attendance</th>
                <th>Date</th>
                <th>Action Btn</th>
            </thead>
            <tbody>
                @foreach($allattendance as $attendance)
                <tr>
                    <td>{{ $attendance->user->name}}</td>
                    @if($attendance->attendance == 'present')
                    <td class="text-success">{{ $attendance->attendance}}</td>
                    @elseif($attendance->attendance == 'absent')
                    <td class="text-danger">{{ $attendance->attendance}}</td>
                    @endif
                    <td>{{ Carbon\Carbon::parse($attendance->date)->format('d M, Y')}}</td>
                    <td class="d-flex ">
                      <div class="">
                      <a href="{{ route('editattendance',$attendance->id)}}" class="btn btn-primary text-decoration-none">update</a>
                      </div>
                      <form action="{{ route('deleteattendance',$attendance->id)}}" method="post" class="ms-3">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">delete</button>
                      </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
         </table>
         {{$allattendance->links()}}
         </div>
  </main>  

 @endsection