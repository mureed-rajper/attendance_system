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
        @if(session('sucess'))
        <div class="alert alert-success">
            {{ session('sucess')}}
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error')}}
        </div>
        @endif


        
    </div>
      <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6 card p-4">
                <table class="table table-bordered">
                    <thead>
                        <td>Subject</td>
                        <td>Description</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Status</td>
                        <td>Action Btn</td>
                    </thead>
                    <tbody>
                        @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $leave->subject}}</td>
                            <td>{{ $leave->description}}</td>
                            <td>{{ Carbon\Carbon::parse($leave->start_date)->format('d M, Y')}}</td>
                            <td>{{Carbon\Carbon::parse( $leave->end_date)->format('d M, Y')}}</td>
                            @if($leave->status == "approved")
                            <td><button  class="btn btn-success text-light">{{ $leave->status}}</button></td>
                            @elseif($leave->status == "not approved")
                            <td><button  class="btn btn-danger text-light">{{ $leave->status}}</button></td>
                            @else
                            <td><button  class="btn btn-warning text-secondary">{{ $leave->status}}</button></td>
                            @endif
                            <td class="d-flex">
                                <form action="{{ route('deleteleave',$leave->id)}}" method="post" class="d-flex">
                                @method('DELETE')    
                                 @csrf
                                <button type="submit" class="btn btn-danger btn-sm me-1">delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Sales Card -->
      </div>
    </section>

  </main>
 @endsection
