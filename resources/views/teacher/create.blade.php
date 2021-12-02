@extends('layouts.mainlayout',['activePage' => 'teacher'])

      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Teacher</h4>
                  <p class="card-description">
                    Please Enter Required Information
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('teacher/store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="identification_number">Identification Number</label>
                      <input type="text" class="form-control" name="identification_number" id="identification_number" placeholder="Identification Number">
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
                          <option>Male</option>
                          <option>Female</option>
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