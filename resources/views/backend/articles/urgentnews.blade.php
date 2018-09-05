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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Include Editor style. -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css' rel='stylesheet' type='text/css' />
 
<!-- Include JS file. -->
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.min.js'></script>
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

              <div class="row" style="padding: 20px">
                  <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-add" data-id="" >
                    <i class="fa fa-plus"></i> 
                    Add New Urgent News 
                  </a>
              </div>

              <br><br>

              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                  <tr>
                    
                    <th> ID </th>
                    <th> News </th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                
                <tbody>
                @foreach($urgents as $urgent)

                <tr>  

                  <td> {{ $urgent->id }} </td>
                  <td class="news-row"> {{ $urgent->news }} </td>
                  <td>   
                    <a class="btn btn-warning" data-toggle="modal" data-target="#modal-edit" data-id="{{ $urgent->id }}">Edit</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" data-id="{{ $urgent->id }}">Delete</a>
                  </td>
                
                </tr>

                @endforeach
                
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
</div>
<!-- /.box -->



<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete Urgent News</h4>
          </div>
          
          <div class="modal-body">
            <p> Do You Really Want To Delete This Record ? </p>
          </div>
          
          <div class="modal-footer">
            <form action="{{ route('delete_urgentnews') }}" method="post">
                {{ csrf_field() }}
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger" value="Delete" />
              <input type="hidden" name="hdnDeleteId" id="hdnDeleteId" value="">
            </form>
          </div>
        
        </div>
        <!-- /.modal-content -->
      </div>
          <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->

<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Urgent News </h4>
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
            
            <form method="post" action="/dashboard/newUrgentNews" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('news') ? ' has-error' : '' }}">
                    <label for="title"> Urgent Title : </label>
                    <input type="text" class="form-control" name="news" id="news" placeholder="Urgent News" autofocus required>
                </div>
                
                
                </div>                
              <!-- /.box-body -->
              
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Publish" />
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

<!-- Edit Urgent News Modal -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Urgent News </h4>
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
            
            
            <form method="post" action="/dashboard/updateUrgentNews" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('news') ? ' has-error' : '' }}">
                    <label for="title"> Urgent Title : </label>
                    <input type="text" class="form-control" name="news" id="news" autofocus required>

                </div>
                
                
                </div>                
              <!-- /.box-body -->
              
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Update" />
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
  

    $('#modal-edit').on('shown.bs.modal', function (e) {
   
      // alert($(e.relatedTarget).closest('tr').find('.news-row').html());
      var newsId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnId').val(newsId);
      $(e.currentTarget).find('#news').val($(e.relatedTarget).closest('tr').find('.news-row').html());
    });

   $('#modal-edit').on('hidden.bs.modal', function (e) {
   
      // alert($(e.relatedTarget).closest('tr').find('.news-row').html());
      $(e.currentTarget).find('#hdnId').val('');
      $(e.currentTarget).find('#news').val('');
    });
  });

</script>

<script>
  $(function ()
  {
    $('#modal-delete').on('shown.bs.modal', function(e) 
    {
      var newsId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnDeleteId').val(newsId);
      //$(e.currentTarget).find('.modal-body').html('the deleted article id is ' + imageId);

    });

  });
</script>

@endsection