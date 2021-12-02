@extends('layouts.mainlayout',['activePage' => 'section_create'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Section</h4>
                  <p class="card-description">
                    Please Enter Required Information
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('section/store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                      <label for="category">Category</label>
                        <select class="form-control" name="category" id="category" >
                          <option value="-1">Select Category</option>
                          <option>تمهيدي</option>
                          <option>بستان</option>
                        </select>
                          
                      </div>

                    <div class="form-group">
                      <label for="teacher_name">Teacher Name</label>
                        <select class="form-control" name="teacher_id" id="teacher_name">
                          <option value="-1">Select Teacher</option>
                          @foreach($teachers  as $key => $teacher)
                          <option value="{{$key}}">{{$teacher['name']}}</option>
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