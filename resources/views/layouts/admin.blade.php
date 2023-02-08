<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <!-- font-awesome -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ admin_path('assets/css/dashboard.css') }}" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        
        {{-- <x-database-notification/> --}}
        
        
        {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> 
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
        </li>
        </ul> --}}
    </nav>

<div class="container-fluid">
  <div class="row">
    <x-admin.sidebar />

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @yield('content')
        <p class="text-center text-primary"><small>Tutorial by http://rajtechnologies.com</small></p>
    </main>
    
  </div>
</div>
    <script>
        $(document).ready(function() {
        // show the alert
        setTimeout(function() {
        $(".alert").alert('close');
        }, 2000);
        });
    </script>
    @yield('js')
</body>
</html>

{{-- <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyD6TpPkYjgFYmeoqBd_mGVfnd5arly-lrw",
    authDomain: "indiangamergroups.firebaseapp.com",
    databaseURL: "https://indiangamergroups.firebaseio.com",
    projectId: "indiangamergroups",
    storageBucket: "indiangamergroups.appspot.com",
    messagingSenderId: "1044084915673",
    appId: "1:1044084915673:web:8da44b99a595dc851a2dc8"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script> --}}