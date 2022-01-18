@extends('layouts.mainlayout',['activePage' => 'teacher'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0" style="margin : 20px 10px">@lang('dashboard.teacher_details') </p>
                  <hr>
                  <div class="row justify-content-between">


                  
                     <div class="col-7" style="margin : 20px 10px">
                     <h6>@lang('dashboard.name'): {{$teacher['name']}}</h6>
                     <br>
                     <h6>@lang('dashboard.email'): {{$teacher['email']}}</h6>
                     <br>
                     <h6>@lang('dashboard.identification_number'): {{$teacher['identification_number']}}</h6>
                     <br>
                     <h6>@lang('dashboard.phone'): {{$teacher['phone']}}</h6>
                     <br>
                     <h6>@lang('dashboard.password'): {{$teacher['password']}}</h6>
                     <br>
                     <h6>@lang('dashboard.gender'): {{$teacher['gender']}}</h6>
                    </div>
                    <div class="col-4" >
                        <h6>{{$teacher['name']}} QR :</h6>
                        <img style="hieght:150px ; width:150px" src="data:image/png;base64, <?php echo $teacher['teacher_qr']; ?> " />
                     
                    </div>

</div>
                    <div class="row" style="margin : 20px 10px">
                         <form action="{{url('teacher/delete/'.$id)}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">@lang('dashboard.delete')</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url('teacher')}}" method="GET">
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