<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>LaundryDar</title>
    <link rel="stylesheet" href="{{ asset('css/register_style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container">
    <div>Welcome LaundryDar</div>
      <div class="title">Registration</div>
      <div class="content">
        <form action="{{ route('customer.store') }}" method="POST">
          @csrf
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" name="full_name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
              <span class="details">Age</span>
              <input type="number" name="age" placeholder="Enter your age" required>
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" name="address" placeholder="Enter your address" required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" name="phone_number" placeholder="Enter your number" required>
            </div>
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" name="cst_uname" placeholder="Enter your username" required>
              @error('cst_uname')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" name="cst_password" placeholder="Enter your password" required>
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="M" required>
            <input type="radio" name="gender" id="dot-2" value="F" required>
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Register" >
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
