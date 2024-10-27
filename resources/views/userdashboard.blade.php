<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--  -->
  @include('js_and_css_links.css_links')
  @yield('links')

</head>

<body>

  <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('userdash')}}" class="logo d-flex align-items-center">
          <span class="d-none d-lg-block">Student</span>
        </a>
     
       <i class="bi bi-list toggle-sidebar-btn"></i>
       <div class="ms-5 mt-2">
       <h4 class="ms-5 text-capitalize">Welcome Back {{Auth::user()->name}}</h4>
       </div>
    </div>
  <!-- End Logo -->
    <nav class="header-nav ms-auto">
     <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3"> 

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        @yield('image')
        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name}}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('profile')}}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('signout') }}">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul>
      <!-- End Profile Dropdown Items -->
      </li>
    <!-- End Profile Nav -->
     </ul>
    </nav>
   <!-- End Icons Navigation -->

 </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
     <ul class="sidebar-nav" id="sidebar-nav">
       <li class="nav-item">
         <a class="nav-link " href="{{ route('userdash')}}">
           <i class="bi bi-grid"></i>
           <span>Dashboard</span>
         </a>
       </li>
       <!-- End Dashboard Nav -->
         <li class="nav-item">
           <a class="nav-link collapsed" href="{{ route('attendance')}}">
             <i class="fa-solid fa-clipboard-user"></i><span>Attendance</span>
           </a>
         </li>
       
         <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('allattendance')}}">
            <i class="bi bi-menu-button-wide"></i><span>All Attendacnce</span>
          </a>
         </li>
         <li class="nav-item">
           <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
             <i class="bi bi-menu-button-wide"></i><span>Leave</span><i class="bi bi-chevron-down ms-auto"></i>
           </a>
           <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
             <li>
               <a href="{{ route('leave')}}">
                 <i class="bi bi-circle"></i><span>Add Leave</span>
               </a>
             </li>
             <li>
               <a href="{{ route('viewleave')}}">
                 <i class="bi bi-circle"></i><span>View Leave</span>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('absentreport', Auth::user()->id)}}">
            <i class="bi bi-menu-button-wide"></i><span>Reports</span>
          </a>
         </li>
       <!-- End Components Nav -->
       
       <li class="nav-heading">Pages</li>
     
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('profile')}}">
           <i class="bi bi-person"></i>
           <span>Profile</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('upgrading')}}">
         <i class="fa-solid fa-chart-simple"></i>
           <span>Upgrading</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('signout')}}">
           <i class="bi bi-box-arrow-in-right"></i>
           <span>Sign out</span>
         </a>
       </li>
     </ul>

  </aside>
  <!-- End Sidebar-->
  
  <!-- ======= main======= -->
   @yield('main')
  <!-- End #main -->

  
  <!-- js links -->
   @include('js_and_css_links.js_links')
</body>

</html>