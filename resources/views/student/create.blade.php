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
                    <input type="hidden" name = "lang" value = "{{app()->getLocale()}} ">
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
                     
                      <div class="form-group">
                         <label>@lang('dashboard.select_location')</label>
                         <div id="map" style="height:400px; " class="my-3"></div>
                       </div>                      <script>
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
                              // google.maps.event.addListener(marker,'position_changed',
                              //     function (){
                              //         let lat = marker.position.lat()
                              //         let lng = marker.position.lng()
                              //         $('#lat').val(lat);
                              //         $('#lng').val(lng);
                              //     });
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

                       <div class=" form-group col-12" >
<!--                          <a class="btn btn-block btn-primary btn-sm font-weight-medium" href="{{url('select_location' .'?lang=' .app()->getLocale())}}">select Location</a>
 -->                              <div class="row">
                                      <div class="form-group name1 col-md-3">
                                          <label for="exampleInputEmail1" class="formText">Lat</label>
                                 <input type="text" class="form-control" name="lat" id="lat" aria-describedby="emailHelp" value="{{session()->has('lat') ? Session::get('lat') : ''  }}">
                                      </div>

                                      <div class="form-group name2 col-md-3">
                                          <label for="exampleInputEmail1## Heading ##" class="formText">Long </label>
                                          <input type="text" class="form-control" name="lng" id="lng"  aria-describedby="emailHelp" value="{{session()->has('lng') ? Session::get('lng') : ''  }}">
                                      </div>
                                  </div>
                                                      
                               
                           
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