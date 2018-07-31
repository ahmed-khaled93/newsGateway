
@extends('backend/layouts.master')

@section('css')

<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/backend/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/backend/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
@endsection


@section('content')

<!-- Main content -->
<section class="content-header">

  <h1>
    Photo Albums
    <small>management</small>
  </h1>

</section>

<section class="content">

<div class="row" style="padding: 20px">
      <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-default" data-id="" >
        <i class="fa fa-plus"></i> 
        Add New Album 
      </a>
</div>


<div class="row">

@foreach($albums as $album)
    
    <a href="/dashboard/albums/photos/{{$album->id}}">
        	
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->

	        @if($album->photos->last())
      		
      		<div class="small-box bg-aqua" style="background-image:url('/images/albums/{{$album->photos->last()->image}}');background-repeat:no-repeat; background-size:cover;">
      		@else

      		<div class="small-box bg-aqua" style="background-image:url('');background-repeat:no-repeat; background-size:cover;">
	            
	        @endif

        <div class="inner" style="height: 150px">
          <p> {{ $album->title }} </p>
        </div>
      
      </div>
    </div>
    
    </a>

@endforeach

</div>


</section> 

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> New Album </h4>
          </div>
          
          <div class="modal-body">
            @if(count($errors) > 0)
              <div class="row col-lg-12">
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              </div>
            @endif
          	
            <form method="post" action="/dashboard/albums/createNewAlbum" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title"> Album Title : </label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Album Title" autofocus required>
                </div>
                
                
                </div>                
              <!-- /.box-body -->
              
	          <div class="modal-footer">
	            <input type="submit" class="btn btn-primary" value="Create Album" />
	            <input type="hidden" name="hdnId" id="hdnId" value="">
	          </div>
            
            </form>

          	
          </div>
          
        
        </div>
        <!-- /.modal-content -->
      </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection


@section('js')

<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/backend/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/backend/bower_components/raphael/raphael.min.js"></script>
<script src="/backend/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/backend/bower_components/moment/min/moment.min.js"></script>
<script src="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>

<script>
  $(function () {

    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  

    $('#modal-default').on('shown.bs.modal', function (e) {
      // var articleId = $(e.relatedTarget).data('id');
      // $(e.currentTarget).find('#hdnId').val(articleId);
      //console.log($(e.currentTarget));
      //$("#modal-default .modal-body").html('the deleted article id is ' + articleId);
      $(e.currentTarget).find('.modal-body').html('the deleted article id is ' + articleId);
    })
  })
</script>

@endsection