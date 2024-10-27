@extends('admindashboard')

<!-- title -->
@section('title')
 admin all reports
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

    <!-- show all message -->
      @if(session('sucess'))
        <div class="alert alert-success">
            {{session('sucess')}}
        </div>
      @elseif( session('error'))
      <div class="alert alert-danger">
            {{session('error')}}
        </div>
      @endif

      <div class="row my-3 d-flex justify-content-end">
      <div class="col-md-6 d-flex">
        <form action="{{ route('allreports')}}" method="get" class="d-flex w-100">
          @csrf
          <input type="text" class="form-control" value="{{Request::get('repots')}}" placeholder="search reports by status" name="repots">
          <button type="submit" class="btn btn-primary ms-2">Search</button>
        </form>
        <div class="col-md-2">
          <a href="{{ route('allreports')}}" class="btn btn-secondary ms-3">Clear</a>

        </div>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row card p-3">

      @if($reports->isNotEmpty())
         <h4 class="mt-3 text-capitalize">reports for students</h4>
         <div class="col-md-12">
         <table class="table table-bordered">
           <thead>
            <td>Id</td>
            <td>Title</td>
            <td>Status</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Action Btn</td>
           </thead>
           <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id}}</td>
                <td>{{ $report->title}}</td>
                <td>{{ $report->students}}</td>
                <td>{{ Carbon\Carbon::parse($report->startdate)->format('d M, Y')}}</td>
                <td>{{ Carbon\Carbon::parse($report->enddate)->format('d M, Y')}}</td>
                <td class="d-flex justify-conent-center gap-2">
                    <div class="">
                        <a href="{{ route('editreport',$report->id)}}" class="btn btn-warning">update</a>
                    </div>
                    <div class="">
                        <form action="{{ route('deletereport',$report->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
           </tbody>

         </table>
         </div>
      @else
        <div class="col-md-3 ms-5 mt-4">
            <button type="submit" class="btn btn-primary">Create Report</button>
        </div>
      @endif   
      </div>
    </section>

  </main>
 @endsection