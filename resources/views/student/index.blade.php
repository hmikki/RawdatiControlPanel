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

              @endif
            </div>
             
          </div>
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                  <p class="card-title mb-0">All Student</p>
                   <form action="{{url('student/create')}}" method="GET">
                    @csrf
                        <button type="submit" class="btn btn-success">Add</button>
                   </form>
                  </div> 
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Student</th>
                          <th>Phone</th>
                          <th>Gender</th>
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
                            <form action="{{ url('student/edit/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-success btn-sm">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('student/delete/'.$id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm">
                                  <span class="mdi mdi-delete-forever" style="color:red"></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('student/details/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-primary btn-sm">
                                  <span class="mdi mdi-account" style="color:blue"></span>
                              </button>
                            </form>
                            </div>

                          </td>
                        </tr>
                        @endforeach
                        @else

                          <tr>
                             <td>
                             </td> 
                             <td>
                                  there is  no student added yet 
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