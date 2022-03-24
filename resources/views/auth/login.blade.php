@extends('layouts.layout_auth')
@section('title', "Login")
@section("content")
    <div class="container">
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>
        <div class="row" style="padding-top: 50px">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-login" style="text-align: center;">
                    <img
                    src="https://e-learning.atmi.ac.id/pluginfile.php/1/theme_moove/logo/1627296428/logoatmiWARNA.png"
                    style="max-width: 300px;">
                    
                    <h4>Login</h4>
                </div>
                @if (session("success"))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </div>
                @endif

                <div style="text-align:center">
                  
                </div>

                <form method="post" action="{{ route('login')}}">
                    @csrf
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="text" name="email" class="form-control"
                               placeholder="Enter email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <div style="text-align: center; padding: 5px">
                Atau
                <br>
                </div>
                <a href="{{ route('google') }}" class="btn btn-danger btn-block">Login dengan Google</a>
                <br>
                belum punya akun ? <a href="{{ route("register") }}">Register</a>
            </div>
        </div>
    </div>
@endsection
