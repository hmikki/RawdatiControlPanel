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
                       @foreach($teachers as $key=>$teacher)
                            @if($key == $section['teacher_id'])
                            {{$teacher['name']}}
                            @endif
                       @endforeach
                        
                     </h6>
                    </div>
                    <div class="row" style="margin : 20px 10px">
                         <form action="{{url('teacher/delete/'.$id)}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url('teacher')}}" method="GET">
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