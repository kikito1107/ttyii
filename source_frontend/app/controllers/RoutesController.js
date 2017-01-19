module.exports = function ($scope, uiGmapGoogleMapApi) {

    // instantiate google map objects for directions
    //noinspection JSUnresolvedFunction,JSUnresolvedVariable
    var directionsDisplay = new google.maps.DirectionsRenderer();
    //noinspection JSUnresolvedFunction,JSUnresolvedVariable
    var directionsService = new google.maps.DirectionsService();
    var n = 1;
    var markers = [];
    // var mA = {latitude: 19.4319125, longitude: -99.1694417};
    // var mB = {latitude: 19.4319125, longitude: -99.1694417};
    // Definimos el objeto Route
    var Route = function () {
    };
    $scope.routesObjectCollection = [];

    // Definimos el objeto Checkpoint
    var Checkpoint = function () {
    };
    $scope.checkpointsCollection = [];

    var Posibility = function () {
    };
    $scope.posibilityCollection = [];

    /**
     * CONSTRUCTOR POR OMISIÓN DE LA RUTA
     * @type {{setName: Route.setName, setLocation_name_start: Route.setLocation_name_start, setMain_locations: Route.setMain_locations, setLocation_name_ending: Route.setLocation_name_ending, setLocation_start: Route.setLocation_start, setLocation_ending: Route.setLocation_ending, setKm: Route.setKm}}
     */
    Route.prototype = {
        setName: function (name) {
            this.name = name;
            return this;
        }, setLocation_name_start: function (location_name_start) {
            this.location_name_start = location_name_start;
            return this;
        }, setMain_locations: function (main_locations) {
            this.main_locations = main_locations;
            return this;
        }, setLocation_name_ending: function (location_name_ending) {
            this.location_name_ending = location_name_ending;
            return this;
        }, setLocation_start: function (location_start) {
            this.location_start = location_start;
            return this;
        }, setLocation_ending: function (location_ending) {
            this.location_ending = location_ending;
            return this;
        }, setKm: function (km) {
            this.km = km;
            return this;
        }
    };

    /**
     * Constructor por omision de los Checkpoints
     * @type {{setId: Checkpoint.setId, setLatitude: Checkpoint.setLatitude, setLongitude: Checkpoint.setLongitude}}
     */
    Checkpoint.prototype = {
        setId: function (id) {
            this.id = id;
            return this;
        }, setName: function (name) {
            this.name = name;
            return this;
        }, setLatitude: function (latitude) {
            this.latitude = latitude;
            return this;
        }, setLongitude: function (longitude) {
            this.longitude = longitude;
            return this;
        }
    };

    /**
     * Constructor por omisión de las posibilidades
     * @type {{setName: Posibility.setName, setCheckpoints: Posibility.setCheckpoints, setOrigin: Posibility.setOrigin, setDestination: Posibility.setDestination}}
     */
    Posibility.prototype = {
        setName: function (name) {
            this.name = name;
            return this;
        }, setCheckpoints: function (check) {
            this.check = check;
            return this;
        }, setOrigin: function (origin) {
            this.origin = origin;
            return this;
        }, setDestination: function (destination) {
            this.destination = destination;
            return this;
        }
    };

    /**
     * ASIGNAMOS LOS VALORES INICIALES DE LONGITUD Y LATITUD
     * @type {{control: {}, center: {latitude: number, longitude: number}, zoom: number}}
     */
    $scope.map = {
        control: {},
        center: {latitude: 19.4319125, longitude: -99.1694417},
        zoom: 13,
        markers: [],

        events: {
            click: function (map, eventName, originalEventArgs) {
                var e = originalEventArgs[0];
                var latitude = e.latLng.lat(), longitude = e.latLng.lng();
                var id = n++;

                var name = prompt("Agregue un nombre al punto", "Checkpoint");

                if (name != null) {
                    var marker = new google.maps.Marker({
                        position: e.latLng,
                        map: map
                    });

                    var _checkpoint = new Checkpoint();
                    _checkpoint.setId(id)
                        .setName(name)
                        .setLatitude(latitude)
                        .setLongitude(longitude);

                    $scope.checkpointsCollection.push(_checkpoint);
                    $scope.map.markers.push(marker);
                    $scope.$apply();
                }
            },
            dragend: function (map, eventName, args) {
                console.log("Dragend");
                // $scope.marker.coords.latitude = map.getCenter().lat();
                // $scope.marker.coords.longitude = map.getCenter().lng();
            },
            drag: function (map, eventName, args) {
                console.log("Escuchando");
            },
        }
    };

    $scope.reverseGeocoding= function (marker) {
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(marker.lat, marker.lng);
        var request = {
            latLng: latlng
        };

        geocoder.geocode(request, function(data, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (data[0] != null) {
                    return data[0].formatted_address;
                } else {
                    return "No se puede determinar el checkpoint";
                }
            }
        });
    };

    /**
     * Generamos la ruta optima sugerida ya sea simple oh con marcadores
     */
    $scope.getDirections = function () {
        var waypts = [];
        if ($scope.checkpointsCollection.length != 0) {
            angular.forEach($scope.checkpointsCollection, function (value, key) {
                //noinspection JSUnresolvedVariable,JSUnresolvedFunction
                waypts.push({
                    location: new google.maps.LatLng(value.latitude, value.longitude),
                    stopover: true
                });
            });
        }

        var _origin, _destination;
        if ($scope.update == true) {
            _origin = $scope.origin;
            _destination = $scope.destination;
        } else {
            _origin = document.getElementById('routes-origin').value;
            _destination = document.getElementById('routes-destination').value;
        }
        var request = {
            origin: _origin,
            waypoints: waypts,
            destination: _destination,
            travelMode: google.maps.DirectionsTravelMode.DRIVING,
            provideRouteAlternatives: false
        };
        directionsService.route(request, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap($scope.map.control.getGMap());
                directionsDisplay.setPanel(document.getElementById('directionsList'));
                angular.forEach(response.routes, function (route, index) {
                    var main_locations = JSON.stringify(directionsDisplay.directions);
                    var _route = new Route();
                    _route.setName(route.summary)
                        .setLocation_name_start(response.request.origin)
                        .setLocation_name_ending(response.request.destination)
                        .setMain_locations(main_locations)
                        .setLocation_start(route.legs[0].start_location.lat() + ", " + route.legs[0].start_location.lng())
                        .setLocation_ending(route.legs[0].end_location.lat() + ", " + route.legs[0].end_location.lng())
                        .setKm(route.legs[0].distance.text);
                    $scope.routesObjectCollection.push(_route);
                });
                $scope.showList = true;
            } else {
                alert('Google no puede determinar la ruta.');
            }
        });
    };

    /**
     * Generamos la ruta optima sugerida con marcadores para view y update
     * @param marketsV
     */
    $scope.getDirectionsView = function (marketsV) {
        var waypts = [];

        if (marketsV != 0) {
            angular.forEach(marketsV, function (value, key) {
                waypts.push({
                    location: new google.maps.LatLng(value.latitude, value.longitude),
                    stopover: true
                });
            });
        }
        var origin;
        var destination;
        if ($scope.update) {
            origin = $scope.origin;
            destination = $scope.destination;
        } else {
            origin = $scope.location_origin_name;
            destination = $scope.location_destination_name;
        }
        var request = {
            origin: origin,
            waypoints: waypts,
            destination: destination,
            travelMode: google.maps.DirectionsTravelMode.DRIVING,
            provideRouteAlternatives: false
        };

        directionsService.route(request, function (response, status) {
            //noinspection JSUnresolvedVariable,JSUnresolvedVariable
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                directionsDisplay.setMap($scope.map.control.getGMap());
                directionsDisplay.setPanel(document.getElementById('directionsList'));
            } else {
                alert('Ocurrio un error al generar la ruta.');
            }
        });

    };

    /**
     * CARAGA EL TEMPLETE DE BUSCADOR DE ORIGEN
     * @type {{template: string, events: {places_changed: $scope.searchbox.events.places_changed}, parentDiv: string}}
     */
    $scope.searchbox = {
        template: 'searchbox1',
        events: {
            places_changed: function (searchBox) {
                var places = searchBox.getPlaces();

                if (places.length == 0) {return;}
                markers = [];

                var bounds = new google.maps.LatLngBounds();

                places.forEach(function (place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    var _marker = new google.maps.Marker({
                        map: $scope.map.control.getGMap(),
                        icon: icon,
                        title: 'Origen',
                        position: place.geometry.location,
                        draggable:true,
                        title:"Drag me!"
                    });

                    // Create a marker for each place.
                    markers.push(_marker);

                    $scope.origin = _marker;
                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                $scope.map.control.getGMap().fitBounds(bounds);
            }
        },
        parentDiv: 'origin-container'
    };

    /**
     * CARGA EL TEMPLETE DE BUSCADOR DE DESTINO
     * @type {{template: string, events: {places_changed: $scope.searchbox2.events.places_changed}, parentDiv: string}}
     */
    $scope.searchbox2 = {
        template: 'searchbox2',
        events: {
            places_changed: function (searchBox) {
                var places = searchBox.getPlaces();

                if (places.length == 0) {return;}

                var bounds = new google.maps.LatLngBounds();

                places.forEach(function (place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                        color: '#ff0000'
                    };

                    var _marker = new google.maps.Marker({
                        map: $scope.map.control.getGMap(),
                        icon: icon,
                        title: 'Destino',
                        position: place.geometry.location,
                        draggable: true,
                    });
                    marketAdrag = place.geometry.location;

                    markers.push(_marker);
                    
                    $scope.destination = _marker;

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });

                $scope.map.control.getGMap().fitBounds(bounds);
                $scope.map.zoom = 13;
                $scope.getDirections();
            }
        },
        parentDiv: 'destination-container'
    };

    /**
     * OBTENEMOS LA LATITUD Y LONGITUD PARA EL MARCADOR A
     * @type {{id: number, coords: {latitude: number, longitude: number}}}
     */
    $scope.markerA = {
        id: 0,
        draggable: true,
        coords: {
            latitude: $scope.location_start_lat,
            longitude: $scope.location_start_lng
        },
    };

    /**
     * OBTENEMOS LA LATITUD Y LONGITUD PARA EL MARCADOR B
     * @type {{id: number, coords: {latitude: number, longitude: number}}}
     */
    $scope.markerB = {
        id: 1,
        draggable: true,
        coords: {
            latitude: $scope.location_ending_lat,
            longitude: $scope.location_ending_lng
        }
    };

    /**
     * Array steps
     * @param steps
     */
    $scope.drawPolyLines = function (steps) {
        $scope.polylines = [];

        uiGmapGoogleMapApi.then(function () {
            $scope.polylines = [
                {
                    id: 1,
                    path: steps,
                    stroke: {
                        color: '#3b5998',
                        weight: 3
                    },
                    editable: false,
                    draggable: true,
                    geodesic: true,
                    visible: true,
                    icons: [{
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE
                        },
                        offset: '25px',
                        repeat: '75px'
                    }]
                }

            ];
        });
    };

    /**
     * Elimina un objetivo de la colección
     * @param index
     */
    $scope.deleteCheckpoint = function (index) {

        var response;
        response = confirm('¿Desea eliminar el elemento?');
        if (response) {
            $scope.checkpointsCollection.splice(index, 1);
            $scope.map.markers[index].setMap(null);
        }
    };

    /**
     * Agregamos un nuevo objeto de ruta posible para guardar en el modelo
     */
    $scope.addPosibility = function () {
        var name = prompt("Agregue nombre de la posibilidad", "Posibilidad");

        if (name != null) {
            var _posibility = new Posibility();
            var _origin, _destination;
            if ($scope.update == true) {
                _origin = $scope.origin;
                _destination = $scope.destination;
            } else {
                _origin = document.getElementById('routes-origin').value;
                _destination = document.getElementById('routes-destination').value;
            }
            _posibility.setName(name)
                .setCheckpoints($scope.checkpointsCollection)
                .setOrigin(_origin)
                .setDestination(_destination);

            $scope.posibilityCollection.push(_posibility);

            for (var i = 0; i < $scope.map.markers.length; i++) {
                $scope.map.markers[i].setMap(null);
            }

            markers = [];
            $scope.checkpointsCollection = [];
            $scope.getDirections();
        }
    };

    $scope.markerOptions = {
        draggable: true
    }
};