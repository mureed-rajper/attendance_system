@extends('userdashboard')

<!-- title -->
@section('title')
 user grades
@endsection

<!-- image -->
@php
  $img_name ="";
  $name ="";
  foreach($profile as $imgs)
   $img_name = $imgs->img;
   $name = $imgs->user->name;
   $userid = $imgs->user->id;
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
        <div class="col-md-12">
         <h4 class="mt-3 m2-3 mb-4 text-capitalize">upgrading attendance behave </h4>
         
         <table class="table table-bordered">
            <thead>
                <th>Id</th>
                <th>Student</th>
                <th>Total Present</th>
                <th>Month</th>
                <th>Grade</th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-capitalize">{{ $userid}}</td>
                    <td class="text-capitalize">{{ $name}}</td>
                    <td class="text-capitalize">{{ $pcount}}</td>
                    <td class="text-capitalize">{{Carbon\Carbon::parse($dates->date)->format('M, Y') }}</td>
                    @if($pcount >= 26 AND $pcount <=31)
                     <td><bold>A Grade</bold></td>
                    @elseif($pcount < 26 AND $pcount >=20)
                     <td><bold>B Grade</bold></td>
                    @elseif($pcount < 20 AND $pcount >=15)
                     <td><bold>C Grade</bold></td>
                    @elseif($pcount < 15 AND $pcount >=10)
                     <td><bold>D Grade</bold></td>
                     @elseif($pcount < 10)
                     <td><bold>E Grade</bold></td>
                    @endif
                </tr>
            </tbody>
         </table>
              
      </div>
    </section>

  </main>
 @endsection

