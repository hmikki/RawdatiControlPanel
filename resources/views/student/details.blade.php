@extends('layouts.mainlayout',['activePage' => 'student_details'])
      @section('page_content')
<div class="main-panel">        
   <div class="content-wrapper">
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0" style="margin : 20px 10px">@lang('dashboard.student_details')</p>
                  <hr>
                     <div class="row justify-content-between">


                           <div class="col-7" style="margin : 20px 10px">
                           <h6>@lang('dashboard.name') : {{$student['name']}}</h6>
                           <br>
                           <h6>@lang('dashboard.email') : {{$student['email']}}</h6>
                           <br>
                           <h6>@lang('dashboard.identification_number') : {{$student['identification_number']}}</h6>
                           <br>
                           <h6>@lang('dashboard.phone') : {{$student['phone']}}</h6>
                           <br>
                           <h6>@lang('dashboard.address') : {{$student['address']}}</h6>                    
                           <br>
                           <h6>@lang('dashboard.password') : {{$student['password']}}</h6>
                           <br>
                           <h6>@lang('dashboard.gender') : {{$student['gender']}}</h6>
                           <br>
                           <h6>@lang('dashboard.section') : 
                               @foreach($sections as $key => $section)
                                 @if($student['section'] == $key )
                                   {{$section['name']}}
                                 @endif 
                               @endforeach
                             
                           </h6>
                           <br>
                           <h6>@lang('dashboard.category') : 
                               @foreach($sections as $key => $section)
                                 @if($student['section'] == $key )
                                   {{$section['category']}}
                                 @endif 
                               @endforeach
                             
                           </h6>
                           <br>
                          </div>
                          <div class="col-4" >
                                <h6>{{$student['name']}} QR :</h6>
                                <img style="hieght:150px ; width:150px" src="data:image/png;base64, <?php echo $student['student_qr']; ?> " />
                             
                          </div>
                     </div>
                    <div class="row" style="margin : 20px 10px">
                          

                         <form action="{{ url('student/delete/'.$id)  }}" method="GET">
                           @csrf
                            <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                           <button type="submit" class="btn btn-danger">@lang('dashboard.delete')</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url(request()->get('lang') .'/'. 'student')}}" method="GET">
                           @csrf
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