@extends('layouts.mainlayout',['activePage' => 'section_edit'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.edit_section')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{url('section/update/'.$id)}}">
                    @csrf
                    <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$section['name']}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="category">@lang('dashboard.category')</label>
                        <select class="form-control" name="category" id="gender">
                          @foreach($categories as $value)
                         <option  @if ($value== $section['category']) selected @endif > {{ $value }}</option>
                          @endforeach
                        </select>
                          
                      </div>
                      

                    <div class="form-group">
                      <label for="teacher_name">@lang('dashboard.teacher_name')</label>
                        <select class="form-control" name="teacher_id" id="teacher_name">
                          <option></option>
                           @foreach($teachers as $key => $teacher)
                            <option value="{{$key}}" @if ($key == $section['teacher_id']) selected @endif > {{ $teacher['name'] }}</option>
                          @endforeach
                        </select>

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