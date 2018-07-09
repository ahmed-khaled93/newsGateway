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
  			
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					
					<article class="article col-md-12">
						<div class="inner">
							
							@foreach($articles as $article)

							<figure>
								<a href="/articles/{{ $article->id }}">
									<img src="/images/articles/{{ $article->banner }}" alt="Sample Article">
								</a>
							</figure>
							
							<div class="padding">								

								<div class="detail">
									<div class="time"> {{ $article->created_at->toFormattedDateString() }} </div>
									<div class="category"><a href="category.html">Lifestyle</a></div>
								</div>
								
								<h2>
									<a href="/articles/{{ $article->id }}">

									{{ $article->title }}

									</a>
								</h2>

								<p> {{ $article->body }} </p>
	
								<footer>
									
									<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1083</div></a>
									<a class="btn btn-primary more" href="single.html">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
								
								</footer>
							
							@endforeach

							</div>
						
						</div>
					</article>
					
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