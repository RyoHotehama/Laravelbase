<html>
  <head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class = "header">
      @include('Common.header')
    </div>
    <div>
      @include('Common.sidebar')
    </div>
    <div>
      @yield('content')
    </div>
    <div>
      @include('Common.footer')
    </div>
  </body>
</html>