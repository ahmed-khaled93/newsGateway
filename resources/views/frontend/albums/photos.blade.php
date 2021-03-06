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
        <!-- Magnific Popup core CSS file -->
        <link rel="stylesheet" href="magnific-popup/magnific-popup.css">
        <!-- Custom style -->
        <link rel="stylesheet" href="/frontend/css/style.css">
        <link rel="stylesheet" href="/frontend/css/skins/all.css">
        <link rel="stylesheet" href="/frontend/css/demo.css">
@endsection

@section('content')

<section class="category">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                      
                    @foreach( $photos as $photo )
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <h6 style="max-height: 20px;"> {{ $photo->title }} </h6>
                    
                            <figure>  
                                <a class="test-popup-link" href="/images/albums/{{ $photo->image }}">
                                <img src="/images/albums/{{ $photo->image }}" style="width: 100%; max-height: 150px;height: 150px">
                                </a>
                            </figure>
                        </div>
                    @endforeach

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
    <!-- Magnific Popup core JS file -->
    <script src="magnific-popup/jquery.magnific-popup.js"></script>
    
    <script>
        $(document).ready(function() {
        $('.test-popup-link').magnificPopup({
            type:'image',
            gallery:{
                enabled:true
              }
        });
        });

    </script>
@endsection