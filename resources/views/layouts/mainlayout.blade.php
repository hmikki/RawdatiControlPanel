<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rawdati Admin</title>
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('js/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('images/logo.svg')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
        
          <!-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="{{url('localization')}}" >
              <i class="icon-ellipsis"></i>
            </a>
          </li> -->
          <li>
             <div class="dropdown" style="margin:10px ;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{app()->getLocale() == 'ar'? 'العربية':'English'}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{url(app()->getLocale() == 'ar'? 'en'.'/' .'index?name=admin&password=123456':'ar' .'/' .'index?name=admin&password=123456')}}">{{app()->getLocale() == 'ar'? 'English':'العربية'}}</a>
                </div>
              </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{asset('images/admin.png')}}" alt="profile"/>
            </a>
           
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
     
<!-- {{($activePage == 'teacher_details' || $activePage == 'teacher_edit') ? ' active' : '' }}
 -->   <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item{{ $activePage == 'dashboardd' ? ' active' : '' }}">
            <a class="nav-link" href="{{url(app()->getLocale() .'/'.'index'.'?name=admin&password=123456')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">@lang('dashboard.dashboard')</span>
            </a>
          </li>
          <li class="nav-item {{$activePage == 'teacher' ? ' active' : '' }}" >
            <a class="nav-link" data-toggle="collapse" href="#ui-basic"  aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">@lang('dashboard.teachers')</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" > <a class="nav-link" href="{{url( app()->getLocale() .'/'.'teacher')}}">@lang('dashboard.all_teachers')</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url(app()->getLocale() .'/'. 'teacher/create')}}">@lang('dashboard.add_teacher')</a></li>
<!--                 <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
 -->              </ul>
            </div>
          </li>
          <li class="nav-item {{$activePage == 'student_details' || $activePage =='student_create' || $activePage =='student_edit' ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">@lang('dashboard.students')</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{url(app()->getLocale() .'/'. 'student')}}">@lang('dashboard.all_students')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url(app()->getLocale() .'/'. 'student/create')}}">@lang('dashboard.add_student')</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ $activePage == 'section_details' || $activePage =='section_create' || $activePage =='section_edit'? ' active' : '' }}" >
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">@lang('dashboard.sections')</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url(app()->getLocale() .'/'. 'section')}}">@lang('dashboard.all_sections')</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url(app()->getLocale() .'/'. 'section/create')}}">@lang('dashboard.add_section')</a></li>
              </ul>
            </div>
          </li>
         
        </ul>
      </nav>


      @yield('page_content')
    <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACa0meLptdLQtMUZSFST8awFKIMiBbhGg&callback=initMap"type="text/javascript">
  </script>

  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/dashboard.js')}}"></script>
  <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
  <!-- End custom js for this page-->

   <!--<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>-->
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!--<script src="{{asset('vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/select2/select2.min.js')}}"></script>-->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!--<script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>-->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!--<script src="{{asset('js/file-upload.js')}}"></script>
  <script src="{{asset('js/typeahead.js')}}"></script>
  <script src="{{asset('js/select2.js')}}"></script>-->
  <!--<script src="{{asset('js/hoverable-collapse.js')}}"></script>-->


 



</body>

</html>

