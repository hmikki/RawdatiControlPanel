@extends('layouts.mainlayout',['activePage' => 'student_edit'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Student</h4>
                  <p class="card-description">
                    Please Enter Required Information
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('student/update/'.$id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$student['name']}}">
                    </div>

                     <div class="form-group">
                      <label for="identification_number">Identification Number</label>
                      <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{$student['identification_number']}}">
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" name="address" value="{{$student['address']}}">
                    </div>

                    

                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$student['email']}}">
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="phone" class="form-control" name="phone" id="phone" value="{{$student['phone']}}">
                    </div>

                    
                    <div class="form-group">
                      <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male" @if($student['gender'] == "Male") selected @endif >Male</option>
                          <option value="Female" @if($student['gender'] == "Female") selected @endif>Female</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="section">Section</label>
                        <select class="form-control" name="section" id="section">
                          <option value="-1">Select Section</option>
                          @foreach($sections as $key => $section)
                            <option value="{{$key}}" @if($key == $student['section']) selected @endif >{{$section["name"]}}</option>
                          @endforeach
                        </select>

                      </div>

                      <div class="form-group" >
                          <img src="data:image/png;base64, <?php echo $student['student_qr']; ?> " />
                       
                      </div>
                       


                      
                   
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop