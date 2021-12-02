@extends('layouts.mainlayout',['activePage' => 'student_details'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0" style="margin : 20px 10px">{{$student['name']}}</p>
                  <hr>
                     <div class="col" style="margin : 20px 10px">
                     <h6>Name : {{$student['name']}}</h6>
                     <br>
                     <h6>Email : {{$student['email']}}</h6>
                     <br>
                     <h6>Identification Number : {{$student['identification_number']}}</h6>
                     <br>
                     <h6>Phone : {{$student['phone']}}</h6>
                     <br>
                     <h6>Address : {{$student['address']}}</h6>                    
                     <br>
                     <h6>Password : {{$student['password']}}</h6>
                     <br>
                     <h6>Gender : {{$student['gender']}}</h6>
                     <br>
                     <h6>Section : 
                         @foreach($sections as $key => $section)
                           @if($student['section'] == $key )
                             {{$section['name']}}
                           @endif 
                         @endforeach
                       
                     </h6>
                     <br>
                     <h6>Category : 
                         @foreach($sections as $key => $section)
                           @if($student['section'] == $key )
                             {{$section['category']}}
                           @endif 
                         @endforeach
                       
                     </h6>
                     <br>
                      <div class="form-group" >
                      	  <h6>QR : </h6>
                          <img style="hieght:100px ; width:100px" src="data:image/png;base64, <?php echo $student['student_qr']; ?> " />
                       
                      </div>
                    </div>
                    <div class="row" style="margin : 20px 10px">
                         <form action="{{url('student/delete/'.$id)}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                         <div style="margin : 20px 10px" ></div>
                         <form action="{{url('student')}}" method="GET">
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