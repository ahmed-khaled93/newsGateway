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

@if($flash = session('CreateArticle'))
  <div class="alert alert-success" role="alert">
    {{ $flash }}
  </div>
@elseif($flash = session('UpdateArticle'))
  <div class="alert alert-warning" role="alert">
    {{ $flash }}
  </div>
@elseif($flash = session('DeleteArticle'))
  <div class="alert alert-danger" role="alert">
    {{ $flash }}
  </div>
@endif

<div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- box-body -->
            <div class="box-body">

              <label> Add New Article : </label>
              <a class="btn btn-success" href="#" data-toggle="modal" data-target="#modal-add" data-id=""> Add </a>

              <br><br>

              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                  <tr>
                    
                    <th> ID </th>
                    <th> Title </th>
                    <th> Body </th>
                    <th> Image </th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                
                <tbody>
                @foreach($articles as $article)

                <tr>  

                  <td> {{ $article->id }} </td>
                  <td class="article-title"> {{ $article->title }} </td>
                  <td class="article-body"> {{ $article->body }} </td>
                  <td class="article-image"><img src="/images/articles/{{ $article->image }}" style="width:100px"></td> 
                  <td>   
                    <a class="btn btn-warning" href="#"  data-toggle="modal" data-target="#modal-edit" data-id="{{ $article->id }}"> Edit </a>
                  </td>
                  <td>
                    <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#modal-delete" data-id="{{ $article->id }}">Delete</a>
                  </td>
                
                </tr>

                @endforeach
                
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Add Article Modal -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Create An Article </h4>
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
            
            
            <form method="post" action="/dashboard/createArticle" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('catg_id') ? ' has-error' : '' }}">
                    <label> Category type : </label>
                                      
                    <select name="catg_id" class="form-control" required >
                        
                        <option></option>

                        @foreach($catgs as $catg)
                            
                            <option value="{{ $catg->id }}"> {{ $catg->title }} </option>
                        
                        @endforeach
                    
                    </select>

                </div>
                
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title : </label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Article Title" autofocus required>
                </div>
                
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body">Body : </label>
                    <textarea id="body" name="body" class="form-control" placeholder="Article Body" required ></textarea>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image" class="form-control">
                </div>               
                
                </div>                
              <!-- /.box-body -->
              
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Create" />
              <input type="hidden" name="hdnAddId" id="hdnAddId" value="">
            </div>
            
            </form>

            
          </div>
          
        
        </div>
        <!-- /.modal-content -->
      </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Edit Article Modal -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"> Update Article </h4>
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
            
            <!-- form start -->
            <form method="post" action="/dashboard/articles/edit" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('catg_id') ? ' has-error' : '' }}">
                    <label> Category type : </label>
                    
                    <select name="catg_id" class="form-control{{ $errors->has('catg_id') ? ' is-invalid' : '' }}" required >
                        
                        @foreach($catgs as $category)
                            
                            <option value="{{ $category->id }}" {{ ($articles[0]->catg_id == $category->id)? 'selected' : '' }}> {{ $category->title }} </option>
                        
                        @endforeach
                    
                    </select>

                </div>
                                                
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title : </label>
                    <input type="text" class="form-control" name="title" id="title"  autofocus  value="">
                </div>
                
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body">Body : </label>
                    <textarea id="body" name="body" class="form-control" required >  </textarea>
                </div>
                <div id="photo">
                <figure>
                    <label for="body">Image : </label><br>
                    <img src="" style="width:60%" > 
                </figure>
                </div>

                <br>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image" >
                </div>
                
            </div>                
            <!-- /.modal-body -->
              
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Update"/>
              <input type="hidden" name="hdnEditId" id="hdnEditId" value="">
            </div>
            
            </form>
            
          </div>
                
        </div>
        <!-- /.modal-content -->
      </div>
          <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Default Modal</h4>
          </div>
          
          <div class="modal-body">
            <p> Do You Want To Delete This Article ? </p> 
          </div>
          
          <div class="modal-footer">
            <form action="{{ route('delete_article') }}" method="post">
                {{ csrf_field() }}
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-danger" value="Delete" />
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
  
    $('#modal-delete').on('shown.bs.modal', function (e) {
      var articleId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnId').val(articleId);
      //console.log($(e.currentTarget));
      //$("#modal-default .modal-body").html('the deleted article id is ' + articleId);
      // $(e.currentTarget).find('.modal-body');
    });

    $('#modal-edit').on('shown.bs.modal', function (e) {
   
      // alert($(e.relatedTarget).closest('tr').find('.news-row').html());
      var articleId = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('#hdnEditId').val(articleId);
      $(e.currentTarget).find('#title').val($(e.relatedTarget).closest('tr').find('.article-title').html());
      $(e.currentTarget).find('#body').val($(e.relatedTarget).closest('tr').find('.article-body').html());
      $(e.currentTarget).find('#photo').find('img').attr('src', $(e.relatedTarget).closest('tr').find('img').attr('src'
        ));
    });

    $('#modal-edit').on('hidden.bs.modal', function (e) {
   
      $(e.currentTarget).find('#hdnEditId').val('');
      $(e.currentTarget).find('#title').val('');
      $(e.currentTarget).find('#body').val('');
      $(e.currentTarget).find('#photo').find('img').attr('src','');

    });

  })
</script>


@endsection