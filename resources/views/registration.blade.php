@extends('layout')
@section('content')
<style>
    body {
   background-color: #0d6efd;
   animation: changeColor 05s linear infinite;
 }
 
 @keyframes changeColor {
   0% {
     background-color: #0d6efd;
   }
   50% {
     background-color: #f17dde;
   }
   100% {
     background-color: #3dfd77;
   }
 }
 
 
 </style>
 <link href="assets/css/style.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        <form action="{{ route('postsignup') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label fw-bold"> <i class="fa fa-user"></i> username :</label>
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name" autofocus>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror 
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label fw-bold"> <i class="fa fa-envelope"></i> email : </label>
                                <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" autofocus>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label fw-bold"> <i class="fa fa-lock"></i> password :</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label fw-bold"> <i class="fa fa-lock"></i> konfirmas password :</label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password_confirmation"
                                            id="password_confirmation" placeholder="Repeat Password"  oninput="check(this)"
                                            class="form-control">
                                            @error('password')
                                            <div class="invalid-feedback">konfirmasi password tidak boleh kosong</div>
                                          @enderror
                                            <span id="message"></span>
                                            <script>
                                                function check(input) {
                                                  if (input.value !== document.getElementById('password').value) {
                                                    input.setCustomValidity('Passwords tidak cocok!');
                                                    document.getElementById('message').innerHTML = '';
                                                  } else {
                                                    input.setCustomValidity('');
                                                    document.getElementById('message').innerHTML = '';
                                                  }
                                                }
                                                </script>
                                    </div>
                                </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                 
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                
                                <button type="submit" class="btn btn-dark btn-block" href="login">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection