@extends('layouts.mainlayout',['activePage' => 'teacher'])

      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.add_teacher')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('teacher/store')}}">
                    @csrf
                    <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="@lang('dashboard.enter') @lang('dashboard.name')">
                    </div>
                    <div class="form-group">
                      <label for="identification_number">@lang('dashboard.identification_number')</label>
                      <input type="text" class="form-control" name="identification_number" id="identification_number" placeholder="@lang('dashboard.enter') @lang('dashboard.identification_number')">
                    </div>
                    <div class="form-group">
                      <label for="email">@lang('dashboard.email')</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="@lang('dashboard.enter') @lang('dashboard.email')">
                    </div>

                    <div class="form-group">
                      <label for="phone">@lang('dashboard.phone')</label>
                      <input type="phone" class="form-control" name="phone" id="phone" placeholder="@lang('dashboard.enter') @lang('dashboard.phone')">
                    </div>
                    
                    <div class="form-group">
                      <label for="gender">@lang('dashboard.gender')</label>
                        <select class="form-control" name="gender" id="gender">
                          <option>@lang('dashboard.male')</option>
                          <option>@lang('dashboard.female')</option>
                        </select>
                      </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">@lang('dashboard.add')</button>
                    <button class="btn btn-light">@lang('dashboard.cancel')</button>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop