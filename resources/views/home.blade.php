<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Real-Time tentang Aktivitas Seismik Global - WebGIS Sederhana dengan Leaflet</title>
    <!-- Sertakan Leaflet CSS --> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Sertakan Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Sertakan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        /* Gaya container peta */
        #container {
            position: relative;
        }
        #map {
            height: 1200px;
            width: 100%;
        }
        .title {
            position: absolute;
            top: 5%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 40px;
            font-weight: bold;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
        /* Gaya tombol login */
        #loginButton {
            position: absolute;
            top: 300px;
            right: 50px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(253, 255, 0, 0.7);
            z-index: 1000;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none; 
        }
        #loginButton:hover {
            background-color: rgba(253, 255, 0, 0.9);
        }
        #loginIcon {
            font-size: 30px;
            color: #2192FF;
        }
        /* Gaya tombol registrasi */
        #registerButton {
            position: absolute;
            top: 400px;
            right: 50px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(253, 255, 0, 0.7);
            z-index: 1000;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none; 
        }
        #registerButton:hover {
            background-color: rgba(253, 255, 0, 0.9);
        }
        #registerIcon {
            font-size: 30px;
            color: #2192FF;
        }
        /* Gaya form login */
        .form-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            max-width: 300px;
            width: 80%;
            text-align: center;
            transition: opacity 0.3s ease-in-out;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"],
        .form-container select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            outline: none;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .closeButton {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #888;
            transition: color 0.3s;
        }
        .closeButton:hover {
            color: #333;
        }
        /* Gaya tombol ikon untuk registrasi dan lupa password */
        .additional-links {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .additional-links a {
            flex: 1;
            margin: 0 5px;
            padding: 10px;
            background-color: #f0f0f0;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        .additional-links a:hover {
            background-color: #e0e0e0;
            transform: translateY(-3px);
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .additional-links a i {
            margin-right: 5px;
        }
        /* Gaya tombol informasi */
        #infoButton {
            position: absolute;
            top: 500px; /* Sesuaikan posisi dengan kebutuhan */
            right: 50px; /* Sesuaikan posisi dengan kebutuhan */
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(253, 255, 0, 0.7);
            z-index: 1000; /* Tetapkan z-index yang sama dengan tombol registrasi */
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none; 
        }

        #infoButton:hover {
            background-color: rgba(253, 255, 0, 0.9);
        }

        #infoIcon {
            font-size: 30px;
            color: #2192FF;
        }
        /* Gaya form informasi */
        #infoForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            max-width: 300px;
            width: 80%;
            text-align: center;
            transition: opacity 0.3s ease-in-out;
        }

        #infoForm h2 {
            margin-bottom: 20px;
        }

        #loginButton.hide,
        #registerButton.hide,
        #infoButton.hide  {
            transform: translateX(200%);
            transition: transform 0.3s ease-out;
        }
        #loginButton.show,
        #registerButton.show,
        #infoButton.show {
            transform: translateX(0);
            transition: transform 0.3s ease-out;
        }


      
    </style>
</head>
<body>
    <!-- Container -->
    <div id="container">
        <!-- Judul -->
        <div class="title">Home Payment Tracker</div>

        <!-- Buat elemen div dengan id "map" -->
        <div id="map"></div>

        <!-- Tombol login -->
        <button id="loginButton">
            <i id="loginIcon" class="fas fa-sign-in-alt"></i>
        </button>

        <!-- Tombol registrasi -->
        <button id="registerButton">
            <i id="registerIcon" class="fas fa-user-plus"></i>
        </button>

        <!-- Tombol informasi -->
        <button id="infoButton">
            <i id="infoIcon" class="fas fa-info-circle"></i>
        </button>

        <!-- Form login -->
        <div id="loginForm" class="form-container">
            <button class="closeButton"><i class="fas fa-times"></i></button>
            <h2>Login</h2>
            <form>
                <input type="text" id="username" name="username" placeholder="Username"><br>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <input type="submit" value="Login">
            </form>
            <div class="additional-links">
                <a href="#" id="registerLink"><i class="fas fa-user-plus"></i>Registrasi</a>
                <a href="#" id="forgotPasswordLink"><i class="fas fa-key"></i>Lupa Password</a>
            </div>
        </div>
        <!-- Form informasi -->
        <div id="infoForm" class="form-container">
            <button class="closeButton"><i class="fas fa-times"></i></button>
            <h2>Informasi</h2>
            <p>Ini adalah informasi tambahan yang ingin Anda sampaikan kepada pengguna.</p>
        </div>

        <!-- Form registrasi -->
        <div id="registerForm" class="form-container">
            <button class="closeButton"><i class="fas fa-times"></i></button>
            <h2>Registrasi</h2>
            <form>
                <input type="text" id="username" name="username" placeholder="Username"><br>
                <input type="email" id="email" name="email" placeholder="Email"><br>
                <input type="text" id="number" name="number" placeholder="Nomor HP"><br>
                <select id="role" name="role">
                    <option value="" disabled selected>Pilih Peran</option>
                    <option value="admin">Admin</option>
                    <option value="client">Client</option>
                    <option value="developer">Developer</option>
                </select><br>
                <input type="password" id="password" name="password" placeholder="Password"><br>
                <input type="submit" value="Registrasi">
            </form>
            <div class="additional-links">
                <a href="#" id="loginLink"><i class="fas fa-sign-in-alt"></i>Login</a>
            </div>
        </div>

        <!-- Form lupa password -->
        <div id="forgotPasswordForm" class="form-container">
            <button class="closeButton"><i class="fas fa-times"></i></button>
            <h2>Lupa Password</h2>
            <form>
                <input type="email" id="email" name="email" placeholder="Email"><br>
                <input type="submit" value="Kirim">
            </form>
            <div class="additional-links">
                <a href="#" id="loginLinkForgot"><i class="fas fa-sign-in-alt"></i>Login</a>
            </div>
        </div>
        
    </div>
    <script>
        // Inisialisasi peta menggunakan Google Maps
        var peta = L.map('map').setView([-6.977688, 107.640778], 29.5);

        // Tambahkan layer tile peta Google Maps Satelit
        L.tileLayer('https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            attribution: '© Google Maps'
        }).addTo(peta);

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
        


    </script>
</body>
</html>
