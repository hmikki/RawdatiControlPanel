@extends('layouts.mainlayout',['activePage' => 'student'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
            <div class="row">
            <div class='col-12'>
                 @if(session()->has('data'))
                 @if(Session::get('data'))
                 <div class="alert alert-success" role="alert">
                   Student Added Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Add Student!
                 </div>
                 @endif
              @elseif(session()->has('update'))
                @if(session('update'))
                 <div class="alert alert-success" role="alert">
                   Student Updated Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Update Student!
                 </div>
                 @endif
              @elseif(session()->has('deleted'))
                @if(session('deleted'))
                 <div class="alert alert-success" role="alert">
                   Student Deleted Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Delete Student!
                 </div>
                 @endif
              
              @endif
            </div>
             
          </div>
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                  <p class="card-title mb-0">@lang('dashboard.all_students')</p>
                   <form action="{{url(app()->getLocale() .'/'. 'student/create')}}" method="GET">
                    @csrf
                        <button type="submit" class="btn btn-success">@lang('dashboard.add')</button>
                   </form>
                  </div> 
                  <div class="row-12">
                    <form method="GET" action="student">

                       <div class="input-group" >
                          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            
                            <button type="submit" class="btn btn-success" >
                              <i class="icon-search"></i>
                            </button>
                          </div>
                          <input type="text" class="form-control" name="search" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                        </div>
                    </form>
                    

                  </div>

                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>@lang('dashboard.student')</th>
                          <th>@lang('dashboard.phone')</th>
                          <th>@lang('dashboard.gender')</th>
                          <th></th>
                        </tr>  
                      </thead>
                      <tbody>
                        @if(!empty($students))
                        @foreach($students as $id => $student)
                         <tr>
                          <td>{{$student['name']}}</td>
                          <td >{{$student['phone']}}</td>
                          <td>{{$student['gender']}}</td>
                          <td >

                             <div class="row">
                              <a type="submit" class="btn btn-outline-success btn-sm" href="{{ url('student/edit/'.$id .'?lang='). app()->getLocale() }}">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </a>

                            <div style="margin:0 10px"></div>
                            <form>
                              @csrf
                              <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ url('student/delete/'.$id.'?lang='). app()->getLocale() }}"> <span class="mdi mdi-delete-forever" style="color:red"></span></a>
                            </form>
                            <div style="margin:0 10px"></div>
                              @csrf
                              <a type="submit" class="btn btn-outline-primary btn-sm" href="{{ url('student/details/'.$id.'?lang='). app()->getLocale() }}">
                                  <span class="mdi mdi-account" style="color:blue"></span>
                              </a>
                            </div>

                          </td>
                        </tr>
                        @endforeach
                        @else

                          <tr>
                             <td>
                             </td> 
                             <td>
                                  @lang('dashboard.there_is_no_student_added_yet')
                             </td> 
                             <td>
                             </td>
                             <td>
                             </td>
                          </tr>
                        @endif
                       
                        
                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          </div>
        @stop