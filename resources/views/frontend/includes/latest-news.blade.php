
<div class="line">
	<div>@lang('lables.latest-news')</div>
</div>
	

<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
		<div class="row">	

			@foreach($hotnews as $article)
			@foreach($categories as $category)
				<article class="article col-md-6">
					<div class="inner">
						<figure>
							<a href="{{ action('ArticleController@show', $article) }}">
								<img src="/images/articles/{{ $article->image }}" alt="Sample Article" style="height: 220px;">
							</a>
						</figure>
						
						<div class="padding">
							
							<div class="detail">
								<div class="time">{{$article->created_at->toFormattedDateString()}}</div>
								
								<div class="category">
									<a href="/categories/{{$category->title}}">
									{{$category->title}}
									</a>
								</div>
							</div>
							
							<h2 style="min-height: 60px;">
								<a href="{{ action('ArticleController@show', $article) }}"></a>{{$article->title}}
							</h2>
							<p class="ArticleBody" style="min-height: 60px;"> 
								{{ str_limit(strip_tags($article->body), 80) }}
							</p>
							
							<footer>
								<a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1263</div></a>
								<a class="btn btn-primary more" href="{{ action('ArticleController@show', $article) }}">
									<div>@lang('lables.latest-news-More')</div>
									<div><i class="ion-ios-arrow-thin-right"></i></div>
								</a>
							</footer>
						</div>
					
					</div>
				</article>
			@endforeach
			@endforeach
		</div>
	</div>
</div>