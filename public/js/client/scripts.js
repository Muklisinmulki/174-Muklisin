document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('buyButton').addEventListener('click', function() {
      window.location.href = "{{ route('client.buy') }}";
  });
});

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

fetch('/properties')
   .then(response => response.json())
   .then(properties => {
       properties.forEach(property => {
           const marker = L.marker([property.latitude, property.longtitude], { icon: homeIcon })
               .addTo(leafletMap)
               .bindPopup(`
                   <b>Alamat:</b> ${property.alamat}<br>
                   <b>Harga Properti:</b> Rp.${property.property_harga}<br>
                   <b>Luas:</b> ${property.luas} m²<br>
                   <b>Lebar:</b> ${property.lebar} m²<br>
                   <b>Jumlah Lantai:</b> ${property.jumlah_lantai}<br>
                   <b>Tanggal Jual:</b> ${property.tanggal_jual}<br>
               `);
       });
   })
   .catch(error => console.error('Error fetching properties:', error));
