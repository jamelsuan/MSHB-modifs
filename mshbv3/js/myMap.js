var _aestivo_marker_start=null, aestivo_marker_end;
var _aestivo_map;

function aestivo_initMap() {
    var latLng_end = new google.maps.LatLng(48.117265, -1.704245);
    var geocoder = new google.maps.Geocoder();
    //
    _aestivo_map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: latLng_end
    });
    aestivo_marker_end=new google.maps.Marker({
        position: latLng_end,
        map:_aestivo_map
    });

    document.getElementById('submit_showInfo').addEventListener('click', function() {
        aestivo_geocodeAddress('address_start',geocoder, aestivo_listener_geoError);

    });
}

function aestivo_listener_geoError(errorStatus) {
    if (errorStatus==null) {
        if (_aestivo_marker_start!=null){
            aestivo_calculateDistanceAndTime(document.getElementById('show_info'), _aestivo_marker_start.getPosition(), aestivo_marker_end.getPosition(),aestivo_listener_calculateError);
        } else {
            //todo : incomplete
        }
    } else {
        // Error GeoCode
    }

}

function aestivo_listener_calculateError(errorStatus) {
    if (errorStatus==null) {
        aestivo_showPath(_aestivo_marker_start.getPosition(), aestivo_marker_end.getPosition(), aestivo_listener_showPathError);
    } else {

    }
}

function aestivo_listener_showPathError(errorStatus) {

}

function aestivo_geocodeAddress(inputId,geocoder,listener_geoError) {
    var address = document.getElementById(inputId).value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (_aestivo_marker_start!=null) _aestivo_marker_start.setMap(null);
            _aestivo_marker_start= new google.maps.Marker({
                map: _aestivo_map,
                position: results[0].geometry.location
            });
            _aestivo_map.setCenter(_aestivo_marker_start.getPosition());
            listener_geoError(null);
        } else {
            listener_geoError(status);
        }
    });
}

function aestivo_calculateDistanceAndTime(outputDiv, origin, destination, listener_error) {
    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function(response, status) {
        if (status !== google.maps.DistanceMatrixStatus.OK) {
            listener_error(status);
            //alert('Error: ' + status);
        } else {
            //console.log(response);
            var element=response.rows[0].elements[0];
            outputDiv.innerHTML=element.distance.text+" "+element.duration.text;
            listener_error(null);
        }
    });
}
var aestivo_directionsDisplay=null;
function aestivo_showPath(origin, destination, listener) {
    var directionsService = new google.maps.DirectionsService();
    if (aestivo_directionsDisplay==null) {
        aestivo_directionsDisplay =new google.maps.DirectionsRenderer();
    } else {
        aestivo_directionsDisplay.setMap(null);
    }
    var request = {
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            aestivo_directionsDisplay.setMap(_aestivo_map);
            aestivo_directionsDisplay.setDirections(response);
            listener(null);
        } else {
            aestivo_directionsDisplay.setMap(null);
            listener(status);
        }
    });
}