
<div class="line">
	<div>Latest News</div>
</div>
	

<div class="row">
	<div class="col-md-12 col-sm-6 col-xs-12">
		<div class="row">	
			@foreach($articles as $article)
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
									<a href="/categories/{{ $article->catgs->title }}">
									{{$article->catgs->title}}
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