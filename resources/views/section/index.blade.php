@extends('layouts.mainlayout',['activePage' => 'section'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class='col-12'>
                 @if(session()->has('data'))
                 @if(Session::get('data'))
                 <div class="alert alert-success" role="alert">
                   Section Added Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Add Section!
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
                       <p class="card-title mb-0">All Section</p>
                       <form action="{{url('section/create')}}" method="GET">
                        @csrf
                            <button type="submit" class="btn btn-success">Add</button>
                       </form>
                       

                     </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Section</th>
                          <th>Category</th>
                          <th>Teacher Name</th>
                          <th></th>
                        </tr>  
                      </thead>
                      <tbody>
                        @if(!empty($sections))
                        
                        @foreach($sections as $id => $section)
                             <tr>
                          <td>{{$section['name']}}</td>
                          <td>{{$section['category']}}</td>
                          <td>
                           @foreach($teachers as $key => $teacher)
                              @if($section['teacher_id'] == $key)
                                {{$teacher['name']}}
                              @endif
                           @endforeach
                          </td>
                          <td >
                            <div class="row">

                            <form action="{{ url('section/edit/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn  btn-outline-success btn-sm">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('section/delete/'.$id) }}" method="POST">
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm">
                                  <span class="mdi mdi-delete-forever" style="color:red"></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('section/details/'.$id) }}" method="GET">
                              @csrf
                              <button type="submit" class="btn btn-outline-primary  btn-sm">
                                  <span class="mdi mdi-account" style="color:blue"></span>
                              </button>
                            </form>
                            </div>

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