
<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  @include('backend/includes.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('backend/includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    
        
        
        @yield('content')
        

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  @include('backend/includes.footer')


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->

@yield('js')

</body>
</html>
