@extends('layouts.mainlayout',['activePage' => 'teacher'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class='col-12'>
             
             @if(session()->has('data'))
                 @if(Session::get('data'))
                 <div class="alert alert-success" role="alert">
                   Teacher Added Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Add Teacher!
                 </div>
                 @endif
              @elseif(session()->has('update'))
                @if(session('update'))
                 <div class="alert alert-success" role="alert">
                   Teacher Updated Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Update Teacher!
                 </div>
                 @endif
              @elseif(session()->has('deleted'))
                @if(session('deleted'))
                 <div class="alert alert-success" role="alert">
                   Teacher Deleted Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Delete Teacher!
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
                       <p class="card-title mb-0">@lang('dashboard.all_teachers')</p>
                       <form action="{{url(app()->getLocale() .'/'.'teacher/create')}}" method="GET">
                        @csrf
                            <button type="submit" class="btn btn-success">@lang('dashboard.add')</button>
                       </form>
                       

                     </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless" >
                      <thead>
                        <tr>
                          <th>@lang('dashboard.teacher')</th>
                          <th>@lang('dashboard.identification_number')</th>
                          <th>@lang('dashboard.phone')</th>
                          <th></th>
                        </tr>  
                      </thead>
                      <tbody>
                       @if(!empty($teachers))
                       
                          @foreach($teachers as $id => $teacher)
                          <tr>
                          <td>{{$teacher['name']}}</td>
                          <td >{{$teacher['identification_number']}}</td>
                          <td>{{$teacher['phone']}}</td>
                          <td >
                            <div class="row">

                            <form action="{{ url('teacher/edit/'.$id)}} " method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-success btn-sm">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form >
                              @csrf
                              <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ url('teacher/delete/'.$id)}}"> <span class="mdi mdi-delete-forever" style="color:red"></span></a>

                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('teacher/details/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-primary btn-sm">
                                  <span class="mdi mdi mdi-account" style="color:blue"></span>
                              </button>
                            </form>
                            </div>
                             <!-- <a href="{{URL('teacher/edit')}}">
                                <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </a>
                              <a href="{{URL('teacher/edit')}}">
                                <span class="mdi mdi-delete-forever" style="color:red"></span>
                              </a>
 -->
                          </td>
                          </tr>
                          @endforeach

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