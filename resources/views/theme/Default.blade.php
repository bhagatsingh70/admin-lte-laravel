<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | ChartJS</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="{!! asset('theme/plugins/fontawesome-free/css/all.min.css') !!}" rel="stylesheet">
  <link href="{!! asset('theme/dist/css/adminlte.min.css') !!}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navigation -->
        @include('layouts.Header')
        @include('layouts.Sidebar')
       

       
        @yield('content')
         
        <!-- /#page-wrapper -->
        @include('layouts.Footer')
        @yield('script')
    </div>
    <!-- /#wrapper -->
  

</body>
</html>