@extends('frontend/layouts.master')

@section('css')
        <!-- Bootstrap -->
        <link rel="stylesheet" href="/frontend/scripts/bootstrap/bootstrap.min.css">
        <!-- IonIcons -->
        <link rel="stylesheet" href="/frontend/scripts/ionicons/css/ionicons.min.css">
        <!-- Toast -->
        <link rel="stylesheet" href="/frontend/scripts/toast/jquery.toast.min.css">
        <!-- OwlCarousel -->
        <link rel="stylesheet" href="/frontend/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="/frontend/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="/frontend/scripts/magnific-popup/dist/magnific-popup.css">
        <link rel="stylesheet" href="/frontend/scripts/sweetalert/dist/sweetalert.css">
        <!-- Custom style -->
        <link rel="stylesheet" href="/frontend/css/style.css">
        <link rel="stylesheet" href="/frontend/css/skins/all.css">
        <link rel="stylesheet" href="/frontend/css/demo.css">
@endsection

@section('content')

<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="row">                                        

                    <h3> Play List </h3>
                    <div class="gallery-grid">
                    
                        @if(isset($playlistItems['results']))
                            @foreach($playlistItems['results'] as $item)
                                
	                                <div class="col-md-4 gallery-grid">
	                                    <div class="grid">
	                
	                                        <figure class="effect-roxy">
	                                            <a class="example-image-link" href="/album/video/list/{{$item->id}}/show/{{$item->contentDetails->videoId}}">
	                                                <img src="{{$item->snippet->thumbnails->medium->url or ''}}">
	                
	                                                <figcaption>
	                                                    <span>{{$item->snippet->title or ''}}</span>
	                                                </figcaption>   
	                
	                                            </a>
	                                        </figure>
	                                    </div>
	                                </div>

	                            
	                        @endforeach
	                    @else
	                        <center>There are no videos yet !!!!</center>
	                    @endif
                    
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('scripts')
    <script src="/frontend/js/jquery.js"></script>
    <script src="/frontend/js/jquery.migrate.js"></script>
    <script src="/frontend/scripts/bootstrap/bootstrap.min.js"></script>
    <script>var $target_end=$(".best-of-the-week");</script>
    <script src="/frontend/scripts/jquery-number/jquery.number.min.js"></script>
    <script src="/frontend/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
    <script src="/frontend/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/scripts/easescroll/jquery.easeScroll.js"></script>
    <script src="/frontend/scripts/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/frontend/scripts/toast/jquery.toast.min.js"></script>
    <script src="/frontend/js/demo.js"></script>
    <script src="/frontend/js/e-magz.js"></script>
@endsection