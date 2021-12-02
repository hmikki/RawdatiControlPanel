@extends('layouts.mainlayout',['activePage' => 'section_edit'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Section</h4>
                  <p class="card-description">
                    Please Enter Required Information
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('section/update/'.$id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$section['name']}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="category">Category</label>
                        <select class="form-control" name="category" id="gender">
                          @foreach($categories as $value)
                         <option  @if ($value== $section['category']) selected @endif > {{ $value }}</option>
                          @endforeach
                        </select>
                          
                      </div>
                      

                    <div class="form-group">
                      <label for="teacher_name">Teacher Name</label>
                        <select class="form-control" name="teacher_id" id="teacher_name">
                          <option></option>
                           @foreach($teachers as $key => $teacher)
                            <option value="{{$key}}" @if ($key == $section['teacher_id']) selected @endif > {{ $teacher['name'] }}</option>
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