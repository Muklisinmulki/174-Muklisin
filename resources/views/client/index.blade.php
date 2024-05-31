<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Payment Tracker</title>
    <!-- Sertakan Leaflet CSS --> 
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
    <link rel="stylesheet" href="{{ asset('css/client/styles.css') }}">


</head>
<body>
  <!-- resources/views/layouts/app.blade.php atau file Blade yang relevan -->

<!-- Container -->
<div id="container">
  <!-- Judul -->
  <div class="title">Home Payment Tracker</div>

  <!-- Buat elemen div dengan id "map" -->
  <div id="map"></div>

  <!-- Tombol pembelian -->
  <a href="{{ route('client.buy') }}" id="buyButton">
      <i id="buyIcon" class="fas fa-shopping-cart buy-icon"></i>
  </a>

  <!-- Tombol pembayaran -->
  <a href="{{ route('client.pay') }}" id="registerButton">
      <i id="registerIcon" class="fas fa-wallet"></i>
  </a>

  <!-- Tombol informasi -->
  <a href="{{ route('client.doc') }}" id="infoButton">
      <i id="infoIcon" class="fas fa-envelope"></i>
  </a>
</div>


    <script src="{{ asset('js/client/scripts.js') }}"></script>
 
</body>
</html>
