@extends('layouts.mainlayout',['activePage' => 'attendance'])
      @section('page_content')
<div class="main-panel">        
        <div class="content-wrapper">
           
     <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                  <p class="card-title mb-0">@lang('dashboard.attendance')</p>
                   
                  </div> 
              

              <div class="row-12" style="margin-top:20px;">
                    <form method="GET" action="get_attendance">
                         <div class=" form-group col-12" >
                            <div class="row">
                                <div class="form-group name1 col-md-3">
                                    <label>@lang('dashboard.day')</label>
                                    <select name="day" id="day" class="form-control">
                                       <option value="-1" >--Select Day--</option>
                                       @for ($i = 1; $i <= 31; $i++)
                                         <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                    </select>
                                </div>

                                <div class="form-group name2 col-md-3">
                                    <label>@lang('dashboard.month')</label>
                                    <select name="month" id="month" class="form-control">
                                        <option value='-1'>--Select Month--</option>
                                        <option value='1'>Janaury</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>

                            </div>
                           </div> 
                        </div>

                    <button type="submit" class="btn btn-success">@lang('dashboard.go')</button>

                    </form>

                    @if($isFirst)
                      <p style="margin:20px; ">@lang('dashboard.select_date')</p> 
                    @else 
                    @if(!empty($attendances))
                      <div class="table-responsive">
                     <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>@lang('dashboard.students')</th>
                        </tr>  
                      </thead>
                      <tbody>
                        @if(!$attendances== null)
                           @foreach($attendances as $key => $attendance)
                              @foreach( $students as $stdkey => $student)
                                  @if($attendance['stdId'] == $stdkey)
                                     <tr>
                                      <td>{{$student['name']}}</td>
                                     </tr>
                                  @endif

                              @endforeach
                             
                              
                           @endforeach

                        @endif
                        
                      </tbody>
                    </table>
                   </div>
                   @else
                          <p style="margin:20px; "> @lang('dashboard.no_attendance')</p> 
                    @endif
                    @endif

                    
                  </div>



                  
                  
                </div>
              </div>
            </div>
            
          </div>
          </div>
        @stop