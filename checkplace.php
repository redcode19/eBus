<?php
    require_once('header.php');
?>
<?php 
    require_once('menu.php');
?>
<div id='map' class="animated bounceInDown sh" style=' height: 300px; border-bottom:4px solid #face0b; -webkit-box-shadow: inset -5px -79px 97px -96px rgba(0,0,0,0.75); -moz-box-shadow: inset -5px -79px 97px -96px rgba(0,0,0,0.75); box-shadow: inset -5px -79px 97px -96px rgba(0,0,0,0.75);
'></div>
<div class="container">
    <div class="col-xs-12">
        <br>
        <form action="">
        <div class="input-group md-form form-sm form-2 pl-0 animated bounceInLeft">
  <input class="form-control my-0 py-1 red-border" type="text" placeholder="Find My place ...  " aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text red lighten-3" id="basic-text1">
    <i class="fa fa-search" aria-hidden="true" style="color:#fff"></i></span>
  </div>
</div>
        </form>
        <br>
        <div class="buttton">
            <ul>
            <li class="animated bounceInLeft"><a href="bazar.php">Bazar</a></li>
                <li class="animated bounceInLeft"><a href="#" >Raparin</a></li>
                <li class="animated bounceInRight"><a href="#" >Bakrajo</a></li>
                <li class="animated bounceInRight"><a href="#">Bazyan</a></li>
                <li class="animated bounceInLeft"><a href="#">Tasulja</a></li>
                <li class="animated bounceInRight"><a href="#">Tuy Malik</a></li>
                <li class="animated bounceInLeft"><a href="#">Peramerd</a></li>
            </ul>
        </div>
    </div>
</div>

<div style="clear:both"></div>
<br>
<div class="container">
    <div class="col-xs-12">
        <img src="img/banner.jpg" class="img-fluid animated fadeInUpBig" style="border:0; border-radius:10px" alt="">
    </div>
</div>
<br>
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiaGFzdGEiLCJhIjoiY2p1ejhoOWhkMTY3dTN5c2ttaWI5ZXFwcyJ9.85JC-a2KQsY4A0ZL-8DpoQ';
var geojson = {
    "type": "FeatureCollection",
    "features": [{
        "type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [45.436452, 35.557284]
},
         "properties": {
        "title": " ",
    "description": "بەریدەكە"
}
},

     {
        "type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [45.387089, 35.564504]
   },
         "properties": {
        "title": " ",
    "description": "ناوی شوێن"
},
     },{"type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [35.561627, 45.410639]
},
         "properties": {
        "title": " ",
    "description": "Baridaka"
}
     },{"type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [45.41603014050733, 35.559987774452324]
},
         "properties": {
        "title": " ",
    "description": "بەریدەكە"
}
}
]
};

var map = new mapboxgl.Map({
        container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [45.41603014050733, 35.559987774452324 ],
    zoom: 13
    });
    // add markers to map
geojson.features.forEach(function(marker) {

    // create a HTML element for each feature
    var el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add it to the map
    new mapboxgl.Marker(el)
        .setLngLat(marker.geometry.coordinates)
        .setPopup(new mapboxgl.Popup({offset: 25}) // add popups
            .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
.addTo(map);
});
map.on('load', function() {
        map.addLayer({
            'id': 'lines',
            'type': 'line',
            'source': {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [{
                        'type': 'Feature',
                        'properties': {
                            'color': '#F7455D' // red
                        },
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': []
                        }
                    }]
                }
            },
            'paint': {
                'line-width': 3,
                // Use a get expression (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-get)
                // to set the line-color to a feature property value.
                'line-color': ['get', 'color']
            }
        });
    });
</script>
<?php
require_once('footer.php');
?>