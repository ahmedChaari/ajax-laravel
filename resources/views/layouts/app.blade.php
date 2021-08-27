<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2">
        <a class="navbar-brand" href="#">Ajax</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Create</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">List</a>
            </li>
          </ul>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div> 


    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    @yield('script')
</body>
</html>