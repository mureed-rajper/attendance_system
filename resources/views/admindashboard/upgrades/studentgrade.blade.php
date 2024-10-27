@extends('admindashboard')

<!-- title -->
@section('title')
 admin student grade
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
      <div class="row">

      <div class="col-md-12 card p-3">
        <h4 class="my-3">Student's Grade</h4>
        <table class="table table-bordered">
            <thead>
                <th>Student Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Total Present</th>
                <th>Grade</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$stupresent}}</td>

                    @if($stupresent >=26 AND $stupresent <=31)
                    <td class="text-success">A Grade</td>
                    @elseif($stupresent >=20 AND $stupresent < 26)
                    <td class="text-primary">B Grade</td>
                    @elseif($stupresent >=15 AND $stupresent < 20)
                    <td class="text-secondary">C Grade</td>
                    @elseif($stupresent >=10 AND $stupresent < 15)
                    <td class="text-warning">D Grade</td>
                    @elseif($stupresent < 10)
                    <td class="text-danger">E Grade</td>
                    @endif
                </tr>
            </tbody>
        </table>
      </div>
      </div>
    </section>

  </main>
 @endsection
