<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>LaundryDar</title>
    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
    <div>Welcome LaundryDar</div>
      <div class="title">Login</div>
      <div class="content">
        <form action="{{ route('customer.login') }}" method="POST">
          @csrf
          <div class="user-details">
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" name="username" placeholder="Enter your username" required>
              @error('username')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="password" placeholder="Enter your password" required>
              @error('password')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          @if ($errors->has('login_error'))
            <div class="error">{{ $errors->first('login_error') }}</div>
          @endif
          <div class="button">
            <input type="submit" value="Login">
          </div>
        </form>
        <div class="register-link">Belum punya akun? <a href="{{ route('customer.store') }}">Register Sekarang</a></div>
      </div>
    </div>
  </body>
</html>