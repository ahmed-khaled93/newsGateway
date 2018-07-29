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
        Add New Image 
      </a>
</div>


<div class="row">
@foreach($photos as $photo)
        
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
                                          
      <h4> {{ $photo->title }} </h4>
             
          <img src="img/blank.gif" alt="Photo" width="250px" height="200px" data-src="/images/albums/{{ $photo->image }}" />
        <br><br>
          
    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-default-delete" data-id="{{ $photo->id }}">Delete </a>
    </div>

    
@endforeach

</div>


</section>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> New Image </h4>
          </div>
          
          <div class="modal-body">
            
            <form method="post" action="/dashboard/albums/addNewImage/{{$albumId}}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group">
                    <label> Album : </label>
                    
                    
                    <select name="album_id" class="form-control" required >
                                          
                        @foreach($albums as $album)
                            
                            <option value="{{ $album->id }}" {{ ($albumId == $album->id)? 'selected' : '' }}> {{ $album->title }} </option>
                        
                        @endforeach

                    </select>

                </div>
                
                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Album Title" autofocus required>
                </div>
                

                <div class="form-group">
                  <label for="exampleInputFile"> Image : </label>
                  <input type="file" id="exampleInputFile" name="image">
                </div>
                
                </div>                
              <!-- /.box-body -->
              
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value=" Add " />
              <input type="hidden" name="hdnId" id="hdnId" value="">
            </div>
            
            </form>

            
          </div>
          
        
        </div>
        <!-- /.modal-content -->
      </div>
          <!-- /.modal-dialog -->
</div> 

<div class="modal fade" id="modal-default-delete">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete Image</h4>
          </div>
          <div class="modal-body">
            <span> Do you realy want to delete this image ? </span>
          </div>
          
          <div class="modal-footer">
            <form action=" {{ route('delete_image') }} " method="post">
                {{ csrf_field() }}
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger  " value="Delete" />
              <input type="hidden" name="hdnDeleteId" id="hdnDeleteId" value="">
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
<!-- <script src="/backend/bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="/backend/bower_components/moment/min/moment.min.js"></script> -->
<!-- <script src="/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<!-- <script src="/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="/backend/dist/js/demo.js"></script> -->
<!-- Lazy Loading -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazyloadxt/1.0.0/jquery.lazyloadxt.min.js"></script>

<script>
  $(function ()
  {
    $('#modal-default-delete').on('shown.bs.modal', function(e) 
    {
      var imageId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnDeleteId').val(imageId);
      //$(e.currentTarget).find('.modal-body').html('the deleted article id is ' + imageId);

    });

  });
</script>

@endsection