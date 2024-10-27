@extends('userdashboard')

<!-- title -->
@section('title')
 users / report for students
@endsection

<!-- image -->
@php
  $img_name ="";
  foreach($profile as $imgs)
   $img_name = $imgs->img
@endphp

@section('image')
  @if(!empty($img_name))
   <img src="{{ asset('storage/profile/'.$img_name)}}" alt="Profile"  style="border-radius:10px;">
   @endif
@endsection


<!-- main section -->
 @section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>

    <section class="section dashboard">
        
      <div class="row card">
        <div class="col-md-12 p-3">
            <h4 class="mt-2 text-capitalize mb-3">Report for absent student</h4>
         <!-- report for absent students-->
         @php 
     
           $absent = "";
           foreach($attendance as $reporting)
           if($reporting->attendance == 'absent')
           
           $absent = $reporting->attendance;
         
         @endphp

           @if($absent == 'absent')
           <table class="table table-bordered">
               <thead>
                   <th>Title</th>
                   <th>Status</th>
                   <th>Start Date</th>
                   <th>End Date</th>
              </thead>
              <tbody>
                   @foreach($reports as $report)
                  @foreach($attendance as $attend)
                  @if($report->students == $attend->attendance)
                       <tr>
                           <td>{{ $report->title}}</td>
                           <td>{{ $report->students}}</td>
                           <td>{{ $report->startdate}}</td>
                           <td>{{ $report->endate}}</td>
                       </tr>
                 @endif
                @endforeach      
                @endforeach
             </tbody>
               
           </table>
           @else
           <h4 class="mt-4">your attendance too good</h4>
           @endif

           <!-- general report for all students-->
            @if($genreport->isNotEmpty())
              <hr class="mt-3">
              <h4 class="mt-4 mb-2 text-capitalize">general reports for all students</h4>
           <table class="table table-bordered">
               <thead>
                   <th>Title</th>
                   <th>Status</th>
                   <th>Start Date</th>
                   <th>End Date</th>
              </thead>
              <tbody>
                   @foreach($genreport as $report)
                       <tr>
                           <td>{{ $report->title}}</td>
                           <td>{{ $report->students}}</td>
                           <td>{{ $report->startdate}}</td>
                           <td>{{ $report->endate}}</td>
                       </tr>
                   @endforeach
             </tbody>
               
           </table>
           @endif              
        </div>
      </div>
    </section>

  </main>
 @endsection


