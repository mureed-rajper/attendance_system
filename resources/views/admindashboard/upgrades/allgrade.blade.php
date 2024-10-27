@extends('admindashboard')

<!-- title -->
@section('title')
 admin all grades
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

     <!--show messages  -->
       @if(session('sucess'))
       <div class="alert alert-success">
         {{session('sucess')}}
       </div>
       @elseif(session('error'))
       <div class="alert alert-danger">
         {{session('error')}}
       </div>
       @endif

    <section class="section dashboard">
      <a href="{{ route('adminupgrad')}}" class="btn btn-primary my-3">Add Grade</a>
      <div class="row card p-3">
         <h4>Student's Upgrading</h4>
         <div class="col-md-12">

         <table class="table table-bordered">
            <thead class="w-50">
                <th>Id</th>
                <th>Grades</th>
                <th>Present Days A Month</th>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->id}}</td>
                    <td>{{ $grade->grades}}</td>
                    <td>{{ $grade->days}}</td>
                </tr>
                @endforeach
            </tbody>
         </table>
          </div>
         </div>
      </div>
    </section>

  </main>
 @endsection
