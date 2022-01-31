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
                     <h6>@lang('dashboard.name') : {{$section['name']}}</h6>
                     <br>
                     <h6>@lang('dashboard.category') : {{$section['category']}}</h6>
                     <br>
                     <h6>@lang('dashboard.teacher_name') : 
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
                              <th>@lang('dashboard.student_name')</th>
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
                         <form action="{{url('section/delete/'.$id)}}" method="GET">
                           @csrf
                           <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                           <button type="submit" class="btn btn-danger">@lang('dashboard.delete')</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url('section')}}" method="GET">
                           @csrf
                           <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                           <button type="submit" class="btn btn-light">@lang('dashboard.cancel')</button>
                         </form>
                         <br>
                         

                       </div>

                     
                </div>
              </div>
            </div>
            
          </div>
          </div>
        @stop