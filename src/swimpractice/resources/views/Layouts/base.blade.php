<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class = "w-100">
      <div class = "header bg-primary">
        @include('Common.header')
      </div>
      <div class = "row h-75">
        <div class = "col-2 bg-info">
          @include('Common.sidebar')
        </div>
        <div class = "col-10">
          @yield('content')
        </div>
      </div>
      <div class = "footer bg-secondary h-25">
        @include('Common.footer')
      </div>
    </div>
  </body>
</html>