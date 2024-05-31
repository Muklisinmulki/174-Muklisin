<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Payment Tracker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <!-- Make sure you put this AFTER leaflet.js, when using with leaflet -->
    <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>

    <!-- Sertakan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/develop/styles.css') }}">
    
    

</head>
<body>
  
    <div class="container">
      <div class="nav-profile">
        <div class="search-bar">
          <input type="text" placeholder="Search...">
          <button type="submit"><i class="fas fa-search"></i></button>
        </div>
        @if(session('name'))
          <span>Hi, {{ session('name') }}</span>
        @endif
        <a href="#">
          <i class="fas fa-user"></i>
        </a>
      </div>
      <div class="sidebar">
          <div class="header">
            <div class="list-item">
              <a href="#">
                <i class="fas fa-home"></i> 
                <span class="description-header">Home Payment Tracker</span>
              </a>
            </div>

            <div class="illustration">
              <img width="200" height="150" src="{{ asset('img/ilustrasi.png') }}" alt="">
            </div>

            <div class="main">
              <div class="list-item">
                <a href="{{ route('developer.dashboard') }}">
                  <i class="fas fa-tachometer-alt"></i>
                  <span class="description">Dasboard</span>
                </a>
              </div>
              <div class="list-item"> 
                <a href="{{ route('developer.analytics') }}">
                  <i class="fas fa-chart-line"></i>
                  <span class="description">Analytic</span>
                </a>
              </div>
              <div class="list-item">
                <a href="{{ route('developer.settings') }}">
                  <i class="fas fa-cog"></i>
                  <span class="description">Setting</span>
                </a>
              </div>
              <div class="list-item">
                <a href="{{ route('developer.members') }}">
                  <i class="fas fa-user"></i>
                  <span class="description">Member</span>
                </a>
              </div>
              <div class="list-item">
                <a href="{{ route('developer.history') }}">
                  <i class="fas fa-history"></i>
                  <span class="description">History</span>
                </a>
              </div>
              
            </div>
          </div>
          
      </div>
     
      
      <div class="main-content">
        @yield('main-content')
      </div>
    </div>

    <script src="{{ asset('js/develop/scripts.js') }}"></script>
    <script>
      // you want to get it of the window global
      const providerOSM = new GeoSearch.OpenStreetMapProvider();

      //leaflet map
      var leafletMap = L.map('map', {
      fullscreenControl: true,
      // OR
      fullscreenControl: {
          pseudoFullscreen: false // if true, fullscreen to page width and height
      },
      minZoom: 2
      }).setView([-6.977688, 107.640778], 29.5);

      L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        attribution: '© Google Maps'
      }).addTo(leafletMap);
      

      let theMarker = {};

      leafletMap.on('click',function(e) {
          let latitude  = e.latlng.lat.toString().substring(0,15);
          let longitude = e.latlng.lng.toString().substring(0,15);
          // document.getElementById("latitude").value = latitude;
          // document.getElementById("longitude").value = longitude;
          let popup = L.popup()
              .setLatLng([latitude,longitude])
              .setContent("Kordinat : " + latitude +" - "+  longitude )
              .openOn(leafletMap);


          if (theMarker != undefined) {
              leafletMap.removeLayer(theMarker);
          };

          document.querySelector("#longtitude").value = longitude;
          document.querySelector("#latitude").value = latitude;

          theMarker = L.marker([latitude,longitude]).addTo(leafletMap);  
      });

      const search = new GeoSearch.GeoSearchControl({
          provider: providerOSM,
          style: 'icon',
          searchLabel: 'Bandung',
      });

      leafletMap.addControl(search);

      const homeIcon = L.divIcon({
        html: '<i class="fas fa-home fa-2x" style="color: blue;font-size: 50px;"></i>',
        className: 'custom-div-icon',
        iconSize: [10,10],
        popupAnchor: [0, -10]
    });

    // Fetch properties from the server
    fetch('/properties')
        .then(response => response.json())
        .then(properties => {
            properties.forEach(property => {
                // Create a marker for each property using the custom icon
                const marker = L.marker([property.latitude, property.longtitude], { icon: homeIcon })
                    .addTo(leafletMap)
                    .bindPopup(`<b>Alamat:</b> ${property.alamat}<br><b>Harga:</b> Rp.${property.harga}<br><b>Luas:</b> ${property.luas} m²<br><b>Lebar:</b> ${property.lebar} m²<br><b>Jumlah Lantai:</b> ${property.jumlah_lantai}<br><b>Tanggal Jual:</b> ${property.tanggal_jual}`);
            });
        })
        .catch(error => console.error('Error fetching properties:', error));
  </script>
 
</body>
</html>
