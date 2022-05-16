@extends('layouts.mainlayout', ['activePage' => 'dashboard'])



      @section('page_content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0" >
                  <h3 class="font-weight-bold">@lang('dashboard.welcome')</h3>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.teachers')</p>
                      <!-- <form method="GET" action="{{URL('teacher')}}"> 
                          <button type="submit" class="btn btn-sm" style="background-color: white; color:black">Lets Go</button>
                      </form> -->
                      <hr>
                      <a href="{{URL(app()->getLocale() .'/'.'teacher')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.students')</p>
                      <hr>
                       <!-- <form method="GET" action="{{URL('student')}}"> 
                          <button type="submit" class="btn btn-sm" style="background-color: white; color:black">Lets Go</button>
                      </form> -->
                      <a href="{{URL(app()->getLocale() .'/'.'student')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>

                     </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="fs-30 mb-2">@lang('dashboard.sections')</p>
                      <hr>
                      <a href="{{URL(app()->getLocale() .'/'.'section')}}" style="color:white ; text-decoration: underline">@lang('dashboard.more_details')</a>

                    </div>
              

               
                 </div>
          
                </div>
        </div>
      </div>
      <div class="col-md-12 grid-margin transparent" style="margin-top: 20px;">
                <form action="{{url('select_teacher')}}" method="GET">
                  @csrf
                  <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
                  <label for="category">@lang('dashboard.bus_teacher')</label>
                  <select class="form-control" name="bus_teacher" id="bus_teacher" onchange="this.form.submit()" >
                    <option value="">
                      @php $check = false ; @endphp 
                        @if(!is_null($teachers))
                        @foreach($teachers  as $key => $teacher)
                        @if($teacher['in_bus'] == true)
                          {{$teacher['name']}}
                          {{$check = true }}
                          @break
                        @endif
                        
                      @endforeach
                      @endif
                      

                      @if(!$check)
                       @lang('dashboard.select')
                      @endif
                    </option>
                    <option value="-2">no one</option>
                    @if(!is_null($teachers))
                     @foreach($teachers  as $key => $teacher)
                       <option value="{{$key}}">{{$teacher['name']}}</option>
                      @endforeach
                    @endif
                  </select>

                </form>
      </div>
      <br>
      <div class="col_md_12 grid_margin transparent" style="margin-top: 50px;">
           <!-- <div class="form-group">
             <label>@lang('dashboard.select_location')</label>
             <div id="map" style="height:400px; width : 1000px; " class="my-3"></div>
           </div> -->
           <div class="row  d-flex justify-content-between" style="margin:10px 10px">
                  <label >@lang('dashboard.edit_kindergarten_location')</label>
                   
          </div>  
          <div id="map" style="height:400px; width : 1000px; " class="my-3"></div>   
          <form action="{{url('select_kindergarten_location')}}" method="GET">
              @csrf
              <div class=" form-group col-12" >
               <button type="submit" class="btn btn-success">@lang('dashboard.edit')</button>
<!--                          <a class="btn btn-block btn-primary btn-sm font-weight-medium" href="{{url('select_location' .'?lang=' .app()->getLocale())}}">select Location</a>
-->                              <div class="row">
                                <div >
<!--                                  <label for="exampleInputEmail1" class="formText">Lat</label>
-->                                 <input type="text" class="form-control" name="lat" id="lat" aria-describedby="emailHelp" hidden value="{{session()->has('lat') ? Session::get('lat') : ''  }}">
                                </div>

                                <div >
<!--                                           <label for="exampleInputEmail1## Heading ##" class="formText">Long </label>
-->                                          <input type="text" class="form-control" name="lng" id="lng"  aria-describedby="emailHelp" hidden value="{{session()->has('lng') ? Session::get('lng') : ''  }}">
                                </div>
                            </div>
                                                
                         
                     
                   </div>
                  
             </form>
           <script>
              let map;
              let pos = { lat: 31.490077, lng: 34.462188 };

              let myId = location.search.split('id=')[1] ? location.search.split('id=')[1] : 'myDefaultValue';
              let myLng = location.search.split('lng=')[1] ? location.search.split('lng=')[1] : 'myDefaultValue';
              let myLat = location.search.split('lat=')[1] ? location.search.split('lat=')[1] : 'myDefaultValue';
              let numberLng = parseFloat(myLng).toFixed(14);
              let numberLat = parseFloat(myLat).toFixed(14);



              function initMap() {
                  map = new google.maps.Map(document.getElementById("map"), {
                      center: pos,
                      zoom: 12,
                      scrollwheel: true,
                  });
                  const uluru = { lat: 31.490077, lng: 34.462188 };
                  
                  const currentLoc =  {lat: parseFloat(myLng).toFixed(14) , lng:parseFloat(myLat).toFixed(14)}
                  let marker = new google.maps.Marker({
                      position: uluru,
                      map: map,
                      draggable: true,
                  });
                  
                  google.maps.event.addListener(marker,'dragend', function(evt) {
                      document.getElementById('lat').value = this.getPosition().lat();
                      document.getElementById('lng').value = this.getPosition().lng();
                  });
                              google.maps.event.addListener(map,'dragend',
                              function (event){
                                  pos = event.latLng
                                  marker.setPosition(pos)


                              })
                          }

          </script>

                       

      </div>

 @stop