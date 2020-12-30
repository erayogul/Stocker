
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stocker</title>
  <link rel="icon" href="{{ asset('/img/favicon.svg') }}">
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


@include('layouts.partials.header')

@include('layouts.partials.sidebar')
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  @include('layouts.partials.footer')

</div>
<!-- ./wrapper 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script> -->
<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('/js/app.js') }}"defer></script>
</body>
</html>
