<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>KKU Transcript</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.css"/>
  {{-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
  <link href="{{asset('css/layout_app.css')}}" rel="stylesheet" type="text/css">
  @yield('style')
  <!-- JavaScript -->

</head>
<body>
  <div class="topbar">
    <div class="row row-topbar">
      <div class="col-md-4 col-xs-12 lefttopbar">
        <div class="row">
        <div class="col-xs-4">
          <br>
          <a href="{{asset('/')}}"><center><img src="{{asset('/images/logokku.png')}}" class="logokku"/></center></a>
          <br>
        </div>
        <div class="col-xs-8" class="kadatext">
          <h1>KADA</h1>
          <h3>KKU Academic Document App</h3>
        </div>
      </div>
      </div>

    </div>
  </div>
  @yield('righttopbar')
  @yield('content')
  {{-- <div> --}}
    {{-- <div class="container-fluid panel"> --}}
    {{-- <div class="container" style="padding:0"> --}}
      {{-- <h1 style="color:white">KKU Transcript</h1> --}}
      {{-- <img src="{{asset('/images/HeadMenu.jpg')}}" style="width:100%"></img> --}}
    {{-- </div> --}}
  {{-- </div> --}}
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
@yield('script')
</html>
