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

<section class="content-header">
      <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
</section>

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


<section class="content">
    <div class="row">
        
        <!-- left column -->
        <div class="col-md-8">
          
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit An Article</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <form method="post" action="/dashboard/articles/edit/{{ $article->id }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}

              <div class="box-body">

                <div class="form-group{{ $errors->has('catg_id') ? ' has-error' : '' }}">
                    <label> Category type : </label>
                    
                    

                    <select name="catg_id" class="form-control{{ $errors->has('catg_id') ? ' is-invalid' : '' }}" required >
                        

                        @foreach($categories as $category)
                            
                            <option value="{{ $category->id }}" {{ ($article->catg_id == $category->id)? 'selected' : '' }}> {{ $category->title }} </option>
                        
                        @endforeach
                    
                    </select>

                </div>
                
                
                
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title : </label>
                    <input type="text" class="form-control" name="title" id="title"  autofocus  value="{{ $article->title or ''}}">
                </div>

                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}"></div>
                
                <div class="form-group">
                    <label for="body">Body : </label>
                    <textarea id="body" name="body" class="form-control" required > {{ $article->body or ""}} </textarea>
                </div>

                

                <figure>
                    <label for="body">Image : </label><br>
                    <img src="/images/articles/{{ $article->image }}" style="width:100%"> 
                </figure>

                <br>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="image" >
                </div>
                
                </div>                

              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"> Update </button>
              </div>
            
            </form>
          
          </div>
          <!-- /.box -->
        
        </div>
    </div>
</section>

@endsection


@section('js')
    <!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>

@endsection
