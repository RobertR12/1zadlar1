@extends('main')

@section('title', '|Unos lokacije')

@section('stylesheets')

    {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Create New Lokacija</h1>
            <hr>

            <div id="locationField">
                <h3>Pretraži grad: </h3>
                <input id="autocomplete" placeholder="Enter your address" type="text" onfocus="initialize()" class="form-control"></input>
            </div>

            <hr style="border-width: medium; color: #0cff3f">

         {!! Form::open(['action' => 'LokacijaController@store', 'data-parsley-validate' => '']) !!}

                {{Form::label('Title', 'Title:')}}
                {{Form::text('Title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '70'])}}<br>

                {{Form::label('Country', 'Country:')}}
                {{Form::text('Country', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '70'])}}<br>

                {{Form::label('longt', 'Longt:')}}
                {{Form::text('longt', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '70'])}}<br>

                {{Form::label('langt', 'Langt:')}}
                {{Form::text('langt', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '70'])}}<br>


                {{Form::submit('Create Lokacija', ['class' => 'btn btn-success btn-lg btn-block' ])}}<br>
         {!! Form::close() !!}
        </div>
    </div>

    <div id="map" style="height: 500px; width: 700px"></div>




{{--RADI za popunjavanje forme--}}
    <script>
            $("#autocomplete").on('focus', function () {
            geolocate();
            });

            var placeSearch, autocomplete;
            var componentForm = {

                Title: 'long_name',
                Country: 'long_name',

            };

            function initialize() {
            // Create the autocomplete object, restricting the search
            // to geographical location types.
            autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */ (document.getElementById('autocomplete')), {
            types: ['geocode']
            });
            // When the user selects an address from the dropdown,
            // populate the address fields in the form.
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
            fillInAddress();
            });
            }

            // [START region_fillform]
            function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            document.getElementById("longt").value = place.geometry.location.lat();
            document.getElementById("langt").value = place.geometry.location.lng();

            var puno = document.getElementById("autocomplete").value;
            var puno2 = puno.split(", ");



            document.getElementById("Title").value = puno2[0];
            document.getElementById("Country").value = puno2[1];


            for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
            }
            }
            }
            // [END region_fillform]

            // [START region_geolocation]
            // Bias the autocomplete object to the user's geographical location,
            // as supplied by the browser's 'navigator.geolocation' object.
            function geolocate() {
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = new google.maps.LatLng(
            position.coords.latitude, position.coords.longitude);

            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            document.getElementById("longt").value = latitude;
            document.getElementById("langt").value = longitude;

            autocomplete.setBounds(new google.maps.LatLngBounds(geolocation, geolocation));
            });
            }

            }
            function initMap() {
                var originalMapCenter = new google.maps.LatLng(-25.363882, 131.044922);
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: originalMapCenter
                });

                var infowindow = new google.maps.InfoWindow({
                    content: 'Change the zoom level',
                    position: originalMapCenter
                });
                infowindow.open(map);

                map.addListener('place_changed', function() {

                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        // User entered the name of a Place that was not suggested and
                        // pressed the Enter key, or the Place Details request failed.
                        window.alert("No details available for input: '" + place.name + "'");
                        return;
                    }

                    // If the place has a geometry, then present it on a map.
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);  // Why 17? Because it looks good.
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);
                });





                /*------------------------------------------------*/

                }



    </script>

    <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQObSGMLkHVBcpp2C6CwUk_RizyyzhncE&libraries=places&callback=initMap"></script>



@endsection