@extends('layouts.mainlayout',['activePage' => 'student_create'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.add_student')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('student/store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="@lang('dashboard.enter') @lang('dashboard.name')">
                    </div>

                     <div class="form-group">
                      <label for="identification_number">@lang('dashboard.identification_number')</label>
                      <input type="text" class="form-control" id="identification_number" name="identification_number" placeholder="@lang('dashboard.enter') @lang('dashboard.identification_number')">
                    </div>
                    <div class="form-group">
                      <label for="address">@lang('dashboard.address')</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="@lang('dashboard.address') @lang('dashboard.enter')">
                    </div>

                    

                    <div class="form-group">
                      <label for="email">@lang('dashboard.email')</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="@lang('dashboard.email') @lang('dashboard.enter')">
                    </div>

                    <div class="form-group">
                      <label for="phone">@lang('dashboard.phone')</label>
                      <input type="phone" class="form-control" name="phone" id="phone" placeholder="@lang('dashboard.phone') @lang('dashboard.enter')">
                    </div>

                    
                    <div class="form-group">
                      <label for="gender">@lang('dashboard.gender')</label>
                        <select class="form-control" name="gender" id="gender">
                          <option value="Male">@lang('dashboard.male')</option>
                          <option value="Female">@lang('dashboard.female')</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="section">@lang('dashboard.section')</label>
                        <select class="form-control" name="section" id="section">
                          <option value="-1">@lang('dashboard.select_section')</option>
                          @foreach($sections as $key => $section)
                            <option value="{{$key}}">{{$section["name"]}}</option>
                          @endforeach
                        </select>

                      </div>

                      
                   
                    <button  id="myBtn" class="btn btn-primary mr-2">@lang('dashboard.add')</button>
                    <button class="btn btn-light">@lang('dashboard.cancel')</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop