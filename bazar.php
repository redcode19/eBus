<?php
    require_once('header.php');
?>
<?php 
    require_once('menu.php');
?>
<div id='map' class="animated bounceInDown" style=' height: 600px;  '></div>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-primary animated fadeInUp">
				<div class="panel-heading">
                    <div class="panel-title">
                        <table>
                            <tr>
                                <td rowspan="2">
                                    <img src="img/ptop.png" width="40" alt="">
                                </td>
                                <td>
                                    Your place
                                </td>
                                <td style="width:35%;"> </td>
                                <td><img src="img/ptoop.png" width="25" class="img-fluid" alt=""> 8 km</td>

                            </tr>
                            <tr>
                                <td> <b>Bazar</b></td>
                                <td> </td>
                                <td><img src="img/watch.png"  width="25" class="img-fluid" alt=""> 15 mins</td>
                            </tr>
                        </table>
                    </div>
					<span class="pull-right clickable"><i class="fa fa-bus" aria-hidden="true"></i></span>
				</div>
				<div class="panel-body">
                    <span style="padding:10px; margin:10px; display:block; background:#B2022F; border:0; border-radius:10px; color:#fff; text-align:center" class="animated shake">The bus is about 5 mins away from chosen station</span>
                    <div class="cardss animated bounceInLeft">
                        
                        <table>
                            <tr>
                                <td rowspan="2">
                                     <img src="img/walking.png" width="50" style="margin-left:20px; margin-right:20px" alt="">
                                </td>
                                <td colspan="3" style="text-align:center; color:#fff">
                                    To <b>Bus Station</b>
                                </td>
                            </tr>
                            <tr>
                                <td style=" color:#fff">
                                    <img src="img/watch.png"  width="25" class="img-fluid" alt=""> 5 mins
                                </td >
                                <td style="width:10%"> </td>
                                <td style=" color:#fff"><img src="img/ptoop.png"  width="25" class="img-fluid" alt=""> 100 m</td>
                            </tr>
                        </table>
                    </div>
                    <div class="cardss animated bounceInRight">
                        
                        <table>
                            <tr>
                                <td rowspan="2">
                                     <img src="img/buss.png" width="50" style="margin-left:20px; margin-right:20px" alt="">
                                </td>
                                <td colspan="3" style="text-align:center; color:#fff">
                                    To <b> Saholaka</b>
                                </td>
                            </tr>
                            <tr>
                                <td style=" color:#fff">
                                    <img src="img/watch.png"  width="25" class="img-fluid" alt=""> 6 mins
                                </td >
                                <td style="width:10%"> </td>
                                <td style=" color:#fff"><img src="img/ptoop.png"  width="25" class="img-fluid" alt=""> 7 km</td>
                            </tr>
                        </table>
                    </div>
                    <div class="cardss animated bounceInLeft">
                        
                        <table>
                            <tr>
                                <td rowspan="2">
                                     <img src="img/buss.png" width="50" style="margin-left:20px; margin-right:20px" alt="">
                                </td>
                                <td colspan="3" style="text-align:center; color:#fff">
                                    To <b> Bazar</b>
                                </td>
                            </tr>
                            <tr>
                                <td style=" color:#fff">
                                    <img src="img/watch.png"  width="25" class="img-fluid" alt=""> 4 mins
                                </td >
                                <td style="width:10%"> </td>
                                <td style=" color:#fff"><img src="img/ptoop.png"  width="25" class="img-fluid" alt=""> 1 km</td>
                            </tr>
                        </table>
                    </div>
                </div>
			</div>
        </div>
    </div>
</div>
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
    "description": "Name of the place"
},
     },{"type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [45.357151,  35.572735]
},
         "properties": {
        "title": " ",
    "description": "In front of AUIS "
}
     },{"type": "Feature",
         "geometry": {
        "type": "Point",
    "coordinates": [45.41603014050733, 35.559987774452324]
},
         "properties": {
        "title": " ",
    "description": "Name of the place"
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
                        'color': '#303030' // red
                    },
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': [
                            [45.35719954, 35.572617864],
                            [45.361468, 35.572378],
                            [45.367862, 35.569254],
                            [45.369965, 35.567788],
                            [45.375544, 35.566042],
                            [45.380780, 35.564540],
                            [45.383612, 35.564121],
                            [45.387089, 35.564504],
                            [45.394277, 35.565964],
                            [45.395800, 35.565929],
                            [45.396959, 35.565702],
                            [45.399534, 35.564916],
                            [45.402946, 35.563973],
                            [45.403868, 35.563660],
                            [45.412709, 35.561120],
                            [45.418149, 35.559688],
                            [45.419930, 35.559409],
                            [45.421807, 35.559016],
                            [45.423041, 35.558885],
                            [45.425530, 35.558126],
                            [45.429843, 35.557096],
                            [45.435046, 35.555778],
                            [45.435143, 35.555800],
                            [45.435658, 35.557528],
                            [45.436452, 35.557284]
                        ]
                    }
                }, {
                    'type': 'Feature',
                    'properties': {
                        'color': '#F7455D' // blue
                    },
                    'geometry': {
                        'type': 'LineString',
                        'coordinates': [
                            [45.35589990, 35.572126 ],
                            [45.35558795, 35.572245 ],
                            [45.35323737, 35.571927],
                            [45.35450007, 35.572151],
                            [45.35323737, 35.571927 ],
                            [45.35321191, 35.572043 ],
                            [45.35340030, 35.572453 ],
                            [45.35348177, 35.5725116 ],
                            [45.35360396, 35.572476 ],
                            [45.35392473, 35.573029 ],
                            [45.35453244, 35.5729584],
                            [45.35719954, 35.572617864]
                        ]
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