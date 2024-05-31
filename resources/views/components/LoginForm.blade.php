<div id="loginForm" class="form-container">
  <button class="closeButton"><i class="fas fa-times"></i></button>
  <h2>Login</h2>
  <form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="text" id="name" name="name" placeholder="Username"><br>
    <input type="password" id="password" name="password" placeholder="Password"><br>
    <input type="submit" value="Login">
  </form>


  <div class="additional-links">
      <a href="#" id="registerLink"><i class="fas fa-user-plus"></i>Registrasi</a>
      <a href="#" id="forgotPasswordLink"><i class="fas fa-key"></i>Lupa Password</a>
  </div>
</div>