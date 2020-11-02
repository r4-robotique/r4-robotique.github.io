$(document).ready(function () {
    var map = L.map('r4-map').setView([44.822486, 0.001405], 5);

       var OpenStreetMap_France = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
         maxZoom: 20,
         attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       });

    var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });


    // Stadia_OSMBright.addTo(map);
    OpenStreetMap_France.addTo(map);

    var markersCluster = new L.MarkerClusterGroup();
    for (let entity of entities) {
        m = L.marker(entity['position']);
        m.bindPopup(entity['name']);
        // m.addTo(map);
        markersCluster.addLayer(m);
    }
    map.addLayer(markersCluster);

    $.getJSON('/js/region.json', function(data) {
        L.geoJSON(data, {
            'color': '#f7002e',
            'fillColor': '#f7002e',
            'fillOpacity': 0.1
        }).addTo(map);
    });
});
