@extends('layouts.app')

@section('content')
<div class="map-location container-fluid">
    <div class="col mt-5 mb-3">
        <h3 class="font-weight-bold">Data Lokasi</h3>
    </div>
    <div class="centre">
        
        <div class="col-md-8">
            <div id='map' style='width: 100%; height: 80vh;'></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYWRpYXRzYSIsImEiOiJja2w1eWhlOXMxcHdxMnBvZXVkcmhnaXF6In0.kZ56zJwTnSp0r5VH3cIKEg';
    var map = new mapboxgl.Map({
        container: 'map', // nama container id untuk memuat map, di sini ada pada baris ke-16
        style: 'mapbox://styles/mapbox/satellite-streets-v11', // stylesheet location, menentukan tampilan map
        center: [110.4188121, -7.259209], // starting position [lng, lat]
        zoom: 12 // starting zoom
    });

    map.addControl(new mapboxgl.GeolocateControl({
        positionOptions: {
            enableHighAccuracy: true
        },
        trackUserLocation: true
    }));

    map.addControl(new mapboxgl.NavigationControl());

    

</script>
@endpush
@endsection