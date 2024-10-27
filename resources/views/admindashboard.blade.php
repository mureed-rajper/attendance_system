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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
   <a href="{{ route('admindash')}}" class="logo d-flex align-items-center">
     <span class="d-none d-lg-block">Admin</span>
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
          <a class="dropdown-item d-flex align-items-center" href="{{ route('adminprofile')}}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('signout')}}">
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
         <a class="nav-link " href="{{ route('admindash')}}">
           <i class="bi bi-grid"></i>
           <span>Dashboard</span>
         </a>
       </li>

       <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('allstudents')}}">
          <i class="fa-solid fa-graduation-cap"></i><span>All Students</span> 
          </a>
         </li>
       <!-- all attendances -->
         <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('allattend')}}">
           <i class="fa-solid fa-clipboard-user"></i><span>All Attendance</span> 
          </a>
         </li>
          <!-- all leaves -->
         <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('allleaves')}}">
          <i class="fa-solid fa-person-through-window"></i><span>All Leaves</span> 
          </a>
         </li>

         <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="fa-solid fa-newspaper"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li> 
            <a href="{{ route('reports')}}">
              <i class="bi bi-circle"></i><span>Create Report</span>
            </a>
          </li>
          <li>
            <a href="{{ route('allreports')}}">
              <i class="bi bi-circle"></i><span>Reports</span>
            </a>
          </li>
        </ul>
      </li>
       <!-- End Components Nav -->
       
       <li class="nav-heading">Pages</li>
     
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('adminprofile')}}">
           <i class="bi bi-person"></i>
           <span>Profile</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('adminupgrad')}}">
         <i class="fa-solid fa-chart-simple"></i>
           <span>Student's Upgrading</span>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link collapsed" href="{{ route('signout')}}">
           <i class="bi bi-box-arrow-in-right"></i>
           <span>Sign Out</span>
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