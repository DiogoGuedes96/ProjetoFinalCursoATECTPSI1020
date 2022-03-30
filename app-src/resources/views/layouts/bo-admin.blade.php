<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Bootstrap css-->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Responsive css-->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
  <!-- latest jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
  <!-- Loader starts-->
  <!--<div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>-->
  <!-- Loader ends-->
  <!-- page-wrapper Start       -->
  <div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
      <div class="main-header-right row m-0">
        <div class="main-header-left">
          <div class="logo-wrapper"><a href="{{ route('dashboardAdmin') }}"><img class="img-fluid"
                src="{{ asset('img/logo.png') }}" alt=""></a></div><!-- ../assets/images/logo/logo.png -->
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
              id="sidebar-toggle"></i></div>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
          <ul class="nav-menus">
            @if(!empty(auth()->user()))
            @php
            $roles = auth()->user()->user_profiles;
            @endphp
            @if ($roles->count() > 1)
            <li class="onhover-dropdown p-0">
              <select class="form-select form-control" id="switchRole" name="course_id" onchange="switchRole()">
                @foreach ($roles as $role)
                @if($role->profile_id == 4)
                <option disabled selected>{{$role->profile_type}}</option>
                @else
                <option value="{{ route($role->profile_dashboard) }}">{{$role->profile_type}}</option>
                @endif
                @endforeach
              </select>
            </li>
            @endif
            @endif
            <li class="onhover-dropdown p-0">
              <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>Log out</button>
              </form>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
    <!-- Page Header Ends-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
      <!-- Page Sidebar Start-->
      <header class="main-nav">
        <div class="sidebar-user text-center"><a class="setting-primary" href="{{ route('adminProfile') }}"><i
          data-feather="settings"></i></a><img class="img-90 rounded-circle"
            src="
            @php 
              if(isset(auth()->user()->user_image_base64)){
                echo auth()->user()->user_image_base64;
              }else{
                echo asset('img/profile_img/default_profile_img.png');
              }
            @endphp
            " alt="">
          @auth
          <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->user_name }}</h6>
          <p class="mb-0 font-roboto">
          @foreach ($roles as $role)
          @if($role->profile_id == 4)
          {{ $role->profile_type }}
          @endif
          @endforeach
          </p>
          @endauth
        </div>
        <nav>
          <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
              <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                      aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-main-title">
                  <div>
                    <h6>Menu</h6>
                  </div>
                </li>
                <li><a class="nav-link menu-title" href="{{route('dashboardAdmin')}}"><i
                      data-feather="home"></i><span>Dashboard</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('adminCoursesAll')}}"><i
                      data-feather="archive"></i><span>Cursos</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('adminClassesAll')}}"><i
                      data-feather="users"></i><span>Turmas</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('adminUsersAll')}}"><i
                      data-feather="user"></i><span>Utilizadores</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('adminUfcdAll')}}"><i
                      data-feather="book"></i><span>UFCD</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('adminCurriculumAll')}}"><i
                      data-feather="list"></i><span>Curriculos</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
                <li><a class="nav-link menu-title" href="{{route('faq')}}"><i
                  data-feather="users"></i><span>FAQ</span></a>
                  <ul class="nav-submenu menu-content">
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Page Sidebar Ends-->
      <div class="page-body">
        @yield('content')
      </div>
      <!-- footer start-->
      <footer class="footer bg-dark">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 footer-copyright">
              <p class="mb-0">Copyright © ATEC - Academia de Formação.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- feather icon js-->
    <script src="{{ asset('js/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('js/sidebar-menu.js') }}"></script>
    <!--<script src="../assets/js/config.js"></script>-->
    <!-- Bootstrap js-->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="{{ asset('js/clockpicker.js') }}"></script>
    <script src="{{ asset('js/jquery-clockpicked.min.js') }}"></script>
    <!-- js para input file -->
    <script>
      function getFileData(myFile){
            var file = myFile.files[0];
            var filename = file.name;

            document.getElementById("fileButton").innerHTML = filename;
      }

      function switchRole(){
        var selectBox = document.getElementById("switchRole");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        window.location.href = selectedValue;
      }
      $( ".card:has(.table-responsive)" ).addClass( "unsetOverflow" );
    </script>
</body>
</html>
