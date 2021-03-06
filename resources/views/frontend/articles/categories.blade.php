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
  			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					
					@foreach($articles as $article)
					<article class="article col-md-6 col-sm-6 col-xs-12">
						<div class="inner">
							
							<figure>
								<a href="/articles/{{ $article->id }}">
									<img src="/images/articles/{{ $article->image }}" alt="Sample Article">
								</a>
							</figure>
							
							<div class="padding">
																
								<div class="detail">
									<div class="time"> 
										{{ $article->created_at->toFormattedDateString() }} 
									</div>
									<div class="category"><a href="/categories/{{ $article->categories->title }}">
									{{$article->categories->title}}
									</a></div>
								</div>
								

								<h2 style="min-height: 60px;">
									<a href="/articles/{{ $article->id }}">
								 
								 	{{ $article->title }}

									</a>
								</h2>
								
									<p class="ArticleBody" style="min-height: 60px;">
							            {{ str_limit(strip_tags($article->body), 100) }}   
							        </p>

								<footer>
									<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1263</div></a>
									 	<a class="btn btn-primary more" href="{{ action('ArticleController@show', $article) }}">
										<div>More</div>
										<div><i class="ion-ios-arrow-thin-right"></i></div>
									</a>
									
								</footer>
							</div>
								
							

						
						</div>
					</article>
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
@endsection