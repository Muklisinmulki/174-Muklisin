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
 // Fungsi untuk menampilkan form
 function showForm(formId) {
     var forms = document.querySelectorAll('.form-container');
     forms.forEach(function(form) {
         form.style.display = 'none';
     });
     document.getElementById(formId).style.display = 'block';
 }

 // Tambahkan event listener untuk tombol login
 document.getElementById('loginButton').addEventListener('click', function() {
     showForm('loginForm');
 });

 // Tambahkan event listener untuk tombol registrasi
 document.getElementById('registerButton').addEventListener('click', function() {
     showForm('registerForm');
 });

 // Tambahkan event listener untuk tombol keluar di form login
 document.querySelectorAll('.closeButton').forEach(function(closeButton) {
     closeButton.addEventListener('click', function() {
         this.closest('.form-container').style.display = 'none';
     });
 });

 // Tambahkan event listener untuk tombol registrasi di form login
 document.getElementById('registerLink').addEventListener('click', function() {
     showForm('registerForm');
 });

 // Tambahkan event listener untuk tombol lupa password
 document.getElementById('forgotPasswordLink').addEventListener('click', function() {
     showForm('forgotPasswordForm');
 });

 // Tambahkan event listener untuk tombol login di form registrasi
 document.getElementById('loginLink').addEventListener('click', function() {
     showForm('loginForm');
 });

 // Tambahkan event listener untuk tombol login di form lupa password
 document.getElementById('loginLinkForgot').addEventListener('click', function() {
     showForm('loginForm');
 });
 // Tambahkan event listener untuk tombol informasi
 document.getElementById('infoButton').addEventListener('click', function() {
     showForm('infoForm');
 });


 
 function showForm(formId) {
     var forms = document.querySelectorAll('.form-container');
     forms.forEach(function(form) {
         form.style.display = 'none';
     });

     // Hilangkan tombol login saat menampilkan form
     var loginButton = document.getElementById('loginButton');
     loginButton.classList.remove('show');
     loginButton.classList.add('hide');

     // Hilangkan tombol registrasi saat menampilkan form
     var registerButton = document.getElementById('registerButton');
     registerButton.classList.remove('show');
     registerButton.classList.add('hide');

     // Hilangkan tombol informasi saat menampilkan form
     var infoButton = document.getElementById('infoButton');
     infoButton.classList.remove('show');
     infoButton.classList.add('hide');

     document.getElementById(formId).style.display = 'block';
 }

 // Tambahkan event listener untuk tombol keluar di form login, registrasi, dan informasi
 document.querySelectorAll('.closeButton').forEach(function(closeButton) {
     closeButton.addEventListener('click', function() {
         this.closest('.form-container').style.display = 'none';

         // Tampilkan kembali tombol login saat menutup form
         var loginButton = document.getElementById('loginButton');
         loginButton.classList.remove('hide');
         loginButton.classList.add('show');

         // Tampilkan kembali tombol registrasi saat menutup form
         var registerButton = document.getElementById('registerButton');
         registerButton.classList.remove('hide');
         registerButton.classList.add('show');

         // Tampilkan kembali tombol informasi saat menutup form
         var infoButton = document.getElementById('infoButton');
         infoButton.classList.remove('hide');
         infoButton.classList.add('show');
     });
 });