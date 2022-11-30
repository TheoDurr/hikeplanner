<x-app-layout>
    <x-slot:head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    </x-slot:head>

    <div class="pt-4">
        <div class="flex align-middle justify-center max-w-7xl mx-auto mt-3">
            <div class="overflow-hidden sm:rounded-lg shadow-tile bg-white border-b-0 border-r-0 border border-gray-100">
                @livewire('create-path')
            </div>
        </div>
    </div>


</x-app-layout>
