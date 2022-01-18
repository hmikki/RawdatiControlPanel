@extends('layouts.mainlayout', ['activePage' => 'dashboard'])



      @section('page_content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0" >
                  <h3 class="font-weight-bold">Welcome to Rawdati</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.teachers')</p>
                      <!-- <form method="GET" action="{{URL('teacher')}}"> 
                          <button type="submit" class="btn btn-sm" style="background-color: white; color:black">Lets Go</button>
                      </form> -->
                      <hr>
                      <a href="{{URL(app()->getLocale() .'/'.'teacher')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.students')</p>
                      <hr>
                       <!-- <form method="GET" action="{{URL('student')}}"> 
                          <button type="submit" class="btn btn-sm" style="background-color: white; color:black">Lets Go</button>
                      </form> -->
                      <a href="{{URL(app()->getLocale() .'/'.'student')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>

                     </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.sections')</p>
                      <hr>
                      <a href="{{URL(app()->getLocale() .'/'.'section')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>

                      <!-- <form method="GET" action="{{URL('section')}}"> 
                          <button type="submit" class="btn btn-sm" style="background-color: white; color:black">Lets Go</button>
                      </form> -->
                       </div>
                  </div>
                </div>
               
              </div>
            </div>
            <!-- <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
 @stop