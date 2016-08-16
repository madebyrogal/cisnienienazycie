function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 8
    };
    map = new google.maps.Map(document.getElementById(mapSelector), mapOptions);
    geocoder = new google.maps.Geocoder();
    var marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(lat,lng)
    });
    markers.push(marker);
}
google.maps.event.addDomListener(window, 'load', initialize);

$(document).ready(function(){
    var $locationsWrapper = $(locationsWrapperSelector);
    $locationsWrapper.on('click', 'li', function(e){
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
        $(submitButtonSelector).removeAttr('disabled');
        var $this = $(this);
        map.setCenter($this.data('location'));
        var marker = new google.maps.Marker({
            map: map,
            position: $this.data('location')
        });
        markers.push(marker);
        $(formLatSelector).attr('value', marker.position.lat());
        $(formLngSelector).attr('value', marker.position.lng());
    });

    $(findLocationButtonSelector).on('click', function(){
        var locationQueryString = getLocationQueryString();
        geocoder.geocode({'address': locationQueryString}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var $locationsList = $('<ul>');
                for (var i in results) {
                    var $li = $('<li>');
                    $li.html(results[i].formatted_address).data('location', results[i].geometry.location);
                    $locationsList.append($li);
                }
                $locationsWrapper.empty().append($locationsList);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });

        return false;
    });

});