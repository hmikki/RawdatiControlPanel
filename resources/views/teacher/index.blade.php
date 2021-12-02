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

              @endif
            </div>
             
          </div>
          
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                     <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                       <p class="card-title mb-0">All Teacher</p>
                       <form action="{{url('teacher/create')}}" method="GET">
                        @csrf
                            <button type="submit" class="btn btn-success">Add</button>
                       </form>
                       

                     </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless" >
                      <thead>
                        <tr>
                          <th>Teacher</th>
                          <th>Identification Number</th>
                          <th>Phone</th>
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

                            <form action="{{ url('teacher/edit/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-success btn-sm">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('teacher/delete/'.$id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm">
                                  <span class="mdi mdi-delete-forever" style="color:red"></span>
                              </button>
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