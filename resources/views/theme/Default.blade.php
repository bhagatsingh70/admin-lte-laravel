<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | ChartJS</title>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   
  <!-- daterange picker -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/daterangepicker/daterangepicker.css') !!}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/select2/css/select2.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') !!}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/bs-stepper/css/bs-stepper.min.css') !!}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{!! asset('theme/plugins/dropzone/min/dropzone.min.css') !!}">
 
  
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