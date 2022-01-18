@extends('layouts.mainlayout',['activePage' => 'section_details'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0" style="margin : 20px 10px">{{$section['name']}}</p>
                  <hr>
                     <div class="col" style="margin : 20px 10px">
                     <h6>Name : {{$section['name']}}</h6>
                     <br>
                     <h6>Category : {{$section['category']}}</h6>
                     <br>
                     <h6>Teacher Name : 
                      @if(!$teachers== null)
                       @foreach($teachers as $key=>$teacher)
                            @if($key == $section['teacher_id'])
                            {{$teacher['name']}}
                            @endif
                       @endforeach
                      @else
                        --Unknown--
                      @endif
                        
                     </h6>
                    </div>  

                    @php $isEmpty = true;  @endphp 
                  @if(!$students== null)
                    @foreach($students as $student)
                      @if($id == $student['section'])
                         @php $isEmpty=false ; @endphp
                         @break
                      @endif
                    @endforeach
                  @endif

                    @if(! $isEmpty)
                      <div class="col-6 table-responsive">
                        <table class="table table-striped table-borderless">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Student Name</th>
                            </tr>  
                          </thead>
                          <tbody>
                            @php $i=1; @endphp 
                            @foreach($students as $student)
                               @if($id == $student['section'])
                                 <tr>
                                   <td>{{ $i++ }}</td>
                                   <td>{{$student['name']}}</td>
                                 </tr>
                               @endif

                            @endforeach
                           
                           
                          </tbody>
                        </table>
                      </div>
                    @endif
                    <div class="row" style="margin : 20px 10px">
                         <form action="{{url('teacher/delete/'.$id)}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url('section')}}" method="GET">
                           @csrf
                           <button type="submit" class="btn btn-light">Cancel</button>
                         </form>
                         <br>
                         

                       </div>

                     
                </div>
              </div>
            </div>
            
          </div>
          </div>
        @stop