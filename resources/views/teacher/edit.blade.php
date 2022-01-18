@extends('layouts.mainlayout',['activePage' => 'teacher'])
      @section('page_content')

      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
             
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">@lang('dashboard.edit_teacher')</h4>
                  <p class="card-description">
                    @lang('dashboard.please_enter_required_information')
                  </p>
                  <form class="forms-sample" method="POST" action="{{URL('teacher/update/'.$id)}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">@lang('dashboard.name')</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$teacher['name']}}">
                    </div>
                    <div class="form-group">
                      <label for="identification">@lang('dashboard.identification_number')</label>
                      <input type="text" class="form-control" name="identification_number" id="identification_number" value="{{$teacher['identification_number']}}">
                    </div>
                    <div class="form-group">
                      <label for="email">@lang('dashboard.email')</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$teacher['email']}}">
                    </div>

                    <div class="form-group">
                      <label for="phone">@lang('dashboard.phone')</label>
                      <input type="phone" class="form-control" name="phone" id="phone" value="{{$teacher['phone']}}">
                    </div>
                    
                    <div class="form-group">
                      <label for="gender">@lang('dashboard.gender')</label>
                        <select class="form-control" name="gender" id="gender">
                          @foreach($gender as $value)
                         <option  @if ($value== $teacher['gender']) selected @endif > {{ $value }}</option>
                          @endforeach
                        </select>
                      </div>
                   
                    <button type="submit" class="btn btn-primary mr-2">@lang('dashboard.edit')</button>

                    <form action="{{url('teacher')}}" method="GET">
                           @csrf
                           <button  class="btn btn-light">@lang('dashboard.cancel')</button>
                    </form>
                  </form>
                </div>
              </div>
            </div>
            </div>

          </div>
        @stop