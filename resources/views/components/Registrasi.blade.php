<!-- resources/views/components/Registrasi.blade.php -->

<div id="registerForm" class="form-container">
    <button class="closeButton"><i class="fas fa-times"></i></button>
    <h2>Registrasi</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" id="name" name="name" placeholder="Nama" required><br>
        <input type="email" id="email" name="email" placeholder="Email" required><br>
        <input type="text" id="phone_number" name="phone_number" placeholder="Nomor HP" required><br>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="client">Client</option>
            <option value="developer">Developer</option>
        </select><br>
        <input type="password" id="password" name="password" placeholder="Min 8 kata / huruf" required><br>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required><br>
        <input type="submit" value="Registrasi">
    </form>
    <div class="additional-links">
        <a href="#" id="loginLink"><i class="fas fa-sign-in-alt"></i>Login</a>
    </div>
</div>
