<html>



<body>

<div class="content">
        <form action="{{ request()->get('id') ? url('edit_location?lang=' . app()->getLocale()) : url('submit_location?lang='  . app()->getLocale() ) }}" method="get">
            @csrf
            <div class="mapform" >
                <div class="row">
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" value="{{request()->get('lat') ? request()->get('lat') : "" }}">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" value="{{request()->get('lng')? request()->get('lng')  : "" }}">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="id" name="id" id="id" value="{{request()->get('id')?request()->get('id') :"" }}">
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control" placeholder="lang" name="lang" id="lang" value="{{request()->get('lang')?request()->get('lang') :"" }}">
                    </div>

                </div>

                <div id="map" style="height:400px; width: 800px;" class="my-3"></div>
                <script>
                    let map;
                    let pos = { lat: -34.397, lng: 150.644 };

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
                        const uluru = { lat: -34.397, lng: 150.644 };
                        
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
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACa0meLptdLQtMUZSFST8awFKIMiBbhGg&callback=initMap"
                        type="text/javascript">
                </script>
                </div>

            <input type="submit" class="btn btn-primary">
        </form>


    </div>

</body>	
</html>