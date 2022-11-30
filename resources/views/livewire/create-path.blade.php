<div>
    <div class="py-5 w-full flex justify-between">
        <span class="sm:px-6 lg:px-8 mt-5 text-xl">
            Add your waypoints to create a path
        </span>
        <div class="sm:px-6 lg:px-8 mt-3">
                <div class="flex justify-between rounded-xl border border-gray-200 overflow-hidden">
                    <input wire:model="path.label" class="border-none flex-grow" type="text" placeholder="Path's name ..."/>
                    <button wire:click="save" class="bg-green-500 px-3 text-green-50 font-bold hover:bg-green-700" >Save</button>
                </div>
                @error('path.label') <span class="ml-4 font-light text-red-500">{{ $message }}</span> @enderror
        </div>



    </div>

    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="LeafletRoutingMachine/"></script>


    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


    <div wire:ignore class="h-[70vh] w-[1100px] map" id="map"></div>
    <script wire:ignore>
        var map = L.map('map').setView([47.639674, 6.86], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        L.Routing.control({
            waypoints: [
                L.latLng(47.6378, 6.862),
                L.latLng(47.6426, 6.844)
            ],
            routeWhileDragging: true,
            watpointMode: 'smart',
            geocoder: L.Control.Geocoder.nominatim(),
            language: 'fr',
        })
            .on('waypointschanged', function(e) {
                let coordinates  = [];
                for (const waypoint of e.waypoints) {
                    coordinates.push({
                        latitude: waypoint.latLng.lat,
                        longitude: waypoint.latLng.lng
                    })
                }
                Livewire.emit('waypointsChanged', coordinates);
            })
            .addTo(map);
    </script>
</div>
