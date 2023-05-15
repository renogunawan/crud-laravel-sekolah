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

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    @if(\Session::has('message'))
                        <div class="alert alert-danger">
                            {{\Session::get('message')}}
                        </div>
                    @endif
                    @if(Session::get('success'))
    <script>alert("Berhasil registrasi!   ")</script>
@endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('postlogin') }}">
                            @csrf
                            <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold"> <i class="fa fa-envelope"></i> email :</label>
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                    autofocus>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
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
                                <div class="checkbox">
                                    {{-- <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label> --}}
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <a href="signup" class="btn btn-dark btn-block">Register</a><br>
                                <button type="submit" class="btn btn-dark btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection