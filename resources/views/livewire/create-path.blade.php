<div>
    Coucou c'est la path creation
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <div class="h-[450px] w-[900px] map" id="map"></div>
    <script>
        var map = L.map('map').setView([47.639674, 6.86], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        L.Routing.control({
            waypoints: [
                L.latLng(57.74, 11.94),
                L.latLng(57.6792, 11.949)
            ],
            routeWhileDragging: true
        }).addTo(map);
    </script>
</div>
