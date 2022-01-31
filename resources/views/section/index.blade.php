@extends('layouts.mainlayout',['activePage' => 'section'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class='col-12'>
                 @if(session()->has('data'))
                 @if(Session::get('data'))
                 <div class="alert alert-success" role="alert">
                   Section Added Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Add Section!
                 </div>
                 @endif
              @elseif(session()->has('update'))
                @if(session('update'))
                 <div class="alert alert-success" role="alert">
                   Section Updated Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Update Section!
                 </div>
                 @endif
              @elseif(session()->has('deleted'))
                @if(session('deleted'))
                 <div class="alert alert-success" role="alert">
                   Section Deleted Successfully!
                 </div>
                 @else
                 <div class="alert alert-success" role="alert">
                   Failed To Delete Section!
                 </div>
                 @endif
              
              @endif
            </div>
             
          </div>
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                       <p class="card-title mb-0">@lang('dashboard.all_sections')</p>
                       <form action="{{url(app()->getLocale() .'/'.'section/create')}}" method="GET">
                        @csrf
                            <button type="submit" class="btn btn-success">@lang('dashboard.add')</button>
                       </form>
                       

                     </div>
                  <div>
                    <form method="GET" action="section">

                       <div class="input-group" >
                          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                            <!-- <span class="input-group-text" id="search">
                              <i class="icon-search"></i>
                            </span> -->
                            <button type="submit" class="btn btn-success" >
                              <i class="icon-search"></i>
                            </button>
                          </div>
                           <select name="filter" id="filter" class="form-control">

                             <option value="-1" @if ($filter_word==-1) selected @endif>All</option>
                             <option value="تمهيدي"@if ($filter_word=='تمهيدي') selected @endif>تمهيدي</option>
                             <option value="بستان" @if ($filter_word=='بستان') selected @endif>بستان</option>
                             <
                          </select>
                        </div>
                    </form>
                  </div>  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>@lang('dashboard.section')</th>
                          <th>@lang('dashboard.category')</th>
                          <th>@lang('dashboard.teacher_name')</th>
                          <th></th>
                        </tr>  
                      </thead>
                      <tbody>
                        @if(!empty($sections))
                        
                        @foreach($sections as $id => $section)
                             <tr>
                          <td>{{$section['name']}}</td>
                          <td>{{$section['category']}}</td>
                          <td>
                            @if(!$teachers== null)
                                 @foreach($teachers as $key => $teacher)
                                  @if($section['teacher_id'] == $key)
                                    {{$teacher['name']}}
                                  @endif
                                 @endforeach
                            @else
                              --Unknown--
                            @endif

                          
                          </td>
                          <td >
                            <div class="row">

                            <form action="{{ url('section/edit/'.$id) }}" method="GET">
                              @csrf
                             <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                              <button type="submit" class="btn  btn-outline-success btn-sm">
                                 <span class="mdi mdi-pencil mdi-lg" style="color:green "></span>
                              </button>
                            </form>
                            <div style="margin:0 10px"></div>
                            <form>
                              @csrf
                              <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ url('section/delete/'.$id.'?lang='). app()->getLocale()}}"> <span class="mdi mdi-delete-forever" style="color:red"></span></a>

                            </form>
                            <div style="margin:0 10px"></div>
                            <form action="{{ url('section/details/'.$id) }}" method="GET">
                              @csrf
                              <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                              <button type="submit" class="btn btn-outline-primary  btn-sm">
                                  <span class="mdi mdi-account" style="color:blue"></span>
                              </button>
                            </form>
                            </div>

                          </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                             <td>
                             </td> 
                             <td>
                                  @lang('dashboard.there_is_no_section_added_yet') 
                             </td> 
                             <td>
                             </td>
                             <td>
                             </td>
                          </tr>
                     @endif

                       
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          </div>
        @stop