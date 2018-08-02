@extends('backend/layouts.master')

@section('css')

<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

@endsection

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>

</section>

<div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- box-body -->
            <div class="box-body">

              <label> Add New Article : </label>
              <a class="btn btn-success" href="/dashboard/articles/create" role="button"> Add </a>

              <br><br>

              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                  <tr>
                    
                    <th> ID </th>
                    <th> Title </th>
                    <th> Body </th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                
                <tbody>
                @foreach($articles as $article)

                <tr>  

                  <td> {{ $article->id }} </td>
                  <td> {{ $article->title }} </td>
                  <td> {{ $article->body }} </td>
                  <td>   
                    <a class="btn btn-warning" href="/dashboard/articles/edit/{{ $article->id }}" role="button"> Edit </a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-default" data-id="{{ $article->id }}">Delete</a>
                  </td>
                
                </tr>

                @endforeach
                
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
</div>
<!-- /.box -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          <div class="modal-body">
          
          </div>
          
          <div class="modal-footer">
            <form action="{{ route('delete_article') }}" method="post">
                {{ csrf_field() }}
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Save changes" />
              <input type="hidden" name="hdnId" id="hdnId" value="">
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

<!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
<!-- page script -->
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
      var articleId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnId').val(articleId);
      //console.log($(e.currentTarget));
      //$("#modal-default .modal-body").html('the deleted article id is ' + articleId);
      $(e.currentTarget).find('.modal-body').html('the deleted article id is ' + articleId);
    })
  })
</script>


@endsection