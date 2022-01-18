@extends('layouts.mainlayout',['activePage' => 'student_edit'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.edit_student')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('student/update/'.$id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$student['name']}}">
                    </div>

                     <div class="form-group">
                      <label for="identification_number">@lang('dashboard.identification_number')</label>
                      <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{$student['identification_number']}}">
                    </div>

                    <div class="form-group">
                      <label for="address">@lang('dashboard.address')</label>
                      <input type="text" class="form-control" id="address" name="address" value="{{$student['address']}}">
                    </div>

                    

                    <div class="form-group">
                      <label for="email">@lang('dashboard.email')</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$student['email']}}">
                    </div>

                    <div class="form-group">
                      <label for="phone">@lang('dashboard.phone')</label>
                      <input type="phone" class="form-control" name="phone" id="phone" value="{{$student['phone']}}">
                    </div>

                    
                    <div class="form-group">
                      <label for="gender">@lang('dashboard.gender')</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male" @if($student['gender'] == "Male") selected @endif >@lang('dashboard.male')</option>
                          <option value="Female" @if($student['gender'] == "Female") selected @endif>@lang('dashboard.female')</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="section">@lang('dashboard.section')</label>
                        <select class="form-control" name="section" id="section">
                          <option value="-1">@lang('dashboard.select_section')</option>
                          @foreach($sections as $key => $section)
                            <option value="{{$key}}" @if($key == $student['section']) selected @endif >{{$section["name"]}}</option>
                          @endforeach
                        </select>

                      </div>

                      <div class="form-group" >
                          <img src="data:image/png;base64, <?php echo $student['student_qr']; ?> " />
                       
                      </div>
                       


                      
                   
                    <button type="submit" class="btn btn-primary mr-2">@lang('dashboard.edit')</button>
                    <button class="btn btn-light">@lang('dashboard.cancel')</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop