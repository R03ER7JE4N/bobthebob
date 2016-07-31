//Google API

//Mettre ceci dans le HTML: <div id="map-canvas"></div>

function initialize() {
  var styles = {
    'bellarosa':  [
    {
      "stylers": [
        { "saturation": -92 },
        { "visibility": "on" },
        { "invert_lightness": true },
        { "lightness": -51 }
      ]
    },{
      "featureType": "road.highway",
      "stylers": [
        { "hue": "#ff0022" },
        { "saturation": 41 }
      ]
    },{
      "featureType": "road.arterial",
      "stylers": [
        { "hue": "#ff005d" },
        { "saturation": 41 }
      ]
    },{
      "featureType": "road.local",
      "stylers": [
        { "hue": "#ff0000" },
        { "saturation": 40 }
      ]
    }
  ]};

  var myLatlng = new google.maps.LatLng(46.804642, -71.250107);
  var mapOptions = {
    zoom: 15,
    center: myLatlng,
    scrollwheel: false,
    mapTypeId: 'bellarosa'
  }
  console.log(templateUrl + "/img/marker2.png");
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var styledMapType = new google.maps.StyledMapType(styles['bellarosa'], {name: 'bellarosa'});
  map.mapTypes.set('bellarosa', styledMapType);
  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      animation: google.maps.Animation.DROP,
      icon: templateUrl + "/img/marker2.png"
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

// Add class on scroll
$(window).scroll(function(){
  
  var scroll = $(window).scrollTop();

  if ( scroll >= 50 ) {
    $('header').addClass('header_bg_white');
  }else{
    $('header').removeClass('header_bg_white');
  }

});