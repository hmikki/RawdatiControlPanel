@extends('layouts.mainlayout',['activePage' => 'student_create'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Student</h4>
                  <p class="card-description">
                    Please Enter Required Information
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('student/store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>

                     <div class="form-group">
                      <label for="identification_number">Identification Number</label>
                      <input type="text" class="form-control" id="identification_number" name="identification_number" placeholder="Identification Number">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div>

                    

                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone">
                    </div>

                    
                    <div class="form-group">
                      <label for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="section">Section</label>
                        <select class="form-control" name="section" id="section">
                          <option value="-1">Select Section</option>
                          @foreach($sections as $key => $section)
                            <option value="{{$key}}">{{$section["name"]}}</option>
                          @endforeach
                        </select>

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