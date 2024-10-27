@extends('userdashboard')

<!-- title -->
@section('title')
 user all attendance
@endsection

<!-- image -->
@php
  
  $img_name ="";
  foreach($image as $imgs)
   $img_name = $imgs->img

  
   
@endphp

<!-- date -->
 @php
 $attendanc ="";
 foreach($attendances as $attendance)
 $attendanc = $attendance;
 @endphp


@section('image')
<img src="{{ asset('storage/profile/'.$img_name)}}" alt="Profile"  style="border-radius:10px;">
@endsection

<!-- main content -->
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


        <div class="row my-3 d-flex justify-content-end">
      <div class="col-md-6 d-flex">
        <form action="{{ route('allattendance')}}" method="get" class="d-flex w-100">
          @csrf
          <input type="text" class="form-control" value="{{Request::get('atend')}}" placeholder="searching by attendance" name="atend">
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <div class="col-md-2">
          <a href="{{ route('allattendance')}}" class="btn btn-secondary ms-3">Clear</a>

        </div>
      </div>
    </div>
      <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-12 col-md-6 card p-4">
              @if(!empty($attendanc))
              <h4 class="mb-4 text-capitalize">{{ Auth::user()->name}} your all attendance of this {{Carbon\Carbon::parse($attendanc->date)->format('M, Y')}} </h4>
              @endif 
              <table class="table table-bordered">
               <thead>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Attendacnce</td>
                    <td>Date</td>
                </thead>
                <tbody>
                  @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id}}</td>
                        <td>{{ $attendance->user->name}}</td>
                        @if($attendance->attendance == 'present')
                        <td class="text-primary text-bold">{{ $attendance->attendance}}</td>
                        @elseif($attendance->attendance == 'absent')
                        <td class="text-danger text-bold">{{ $attendance->attendance}}</td>
                        @endif
                        <td>{{Carbon\Carbon::parse($attendance->date)->format('d M, Y')}}</td>
                    </tr>
                   @endforeach 
                </tbody>

               </table>
           </div>    
   </section>
 </main> 
@endsection  



