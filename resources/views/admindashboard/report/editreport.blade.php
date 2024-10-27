@extends('admindashboard')

<!-- title -->
@section('title')
 admin update report
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
        
      <div class="row card">
        <div class="col-md-12">
         <h4 class="mt-3 m2-3 mb-4 text-capitalize">update report</h4> 
        <form action="{{ route('updatereport',$editreport->id)}}" method="post">
            @csrf
        <!-- title and to -->
         <div class="row mt-2">
            <div class="col-md-6">
                <label for="title">Title</label>
                <input type="text" value="{{old('title',$editreport->title)}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="title">
                @error('title')
                <span class="text-danger">
                    {{ $message}}
                </span>
                @enderror
            </div>
            <div class="col-md-6">
            <label for="abstu">Absent Students</label>
            <select class="form-control @error('abstu') is-invalid @enderror" name="abstu" id="abstu">
                <option value="general report" {{($editreport->students == 'general report')? 'selected' : ''}}>General Report</option>
                <option value="absent" {{($editreport->students == 'absent')? 'selected' : ''}}>Absent Students</option>
            </select>
               @error('abstu')
                <span class="text-danger">
                    {{ $message}}
                </span>
               @enderror
            </div>
         </div>

         <!-- start date  and end start -->
         <div class="row mt-2">
            <div class="col-md-6">
                <label for="startdate">Start Date</label>
                <input type="date" value="{{old('sdate',$editreport->startdate)}}" class="form-control @error('sdate') is-invalid @enderror" name="sdate" id="startdate">
                @error('sdate')
                 <span class="text-danger">
                     {{ $message}}
                 </span>
                @enderror
            </div>
            <div class="col-md-6">
            <label for="endate">End Start</label>
            <input type="date" value="{{old('edate', $editreport->endate)}}" class="form-control @error('edate') is-invalid @enderror" name="edate" id="endate">
                @error('edate')
                 <span class="text-danger">
                     {{ $message}}
                 </span>
                @enderror
            </div>
         </div>

         <!-- submit btn -->
          <div class="row d-flex justify-content-end me-4 mt-4 mb-3">
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Update Report</button>
            </div>
          </div>
        </div>
        </form>        
      </div>
    </section>

  </main>
 @endsection


