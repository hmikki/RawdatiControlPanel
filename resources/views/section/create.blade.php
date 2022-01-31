@extends('layouts.mainlayout',['activePage' => 'section_create'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.add_section')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('section/store')}}">
                    @csrf
                    <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                    
                    <div class="form-group">
                      <label for="category">@lang('dashboard.category')</label>
                        <select class="form-control" name="category" id="category" >
                          <option value="-1">@lang('dashboard.select') @lang('dashboard.category')</option>
                          <option>تمهيدي</option>
                          <option>بستان</option>
                        </select>
                          
                      </div>

                    <div class="form-group">
                      <label for="teacher_name">@lang('dashboard.teacher_name')</label>
                        <select class="form-control" name="teacher_id" id="teacher_name">
                          <option value="-1">@lang('dashboard.select') @lang('dashboard.teacher')</option>
                          @foreach($teachers  as $key => $teacher)
                          <option value="{{$key}}">{{$teacher['name']}}</option>
                          @endforeach
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