
<div class="owl-carousel owl-theme slide" id="featured">
	
	@foreach($articles as $article)
		<div class="item">
			<article class="featured">
				<div class="overlay"></div>
				<figure>
					<img src="/images/articles/{{ $article->image }}" alt="Sample Article">
				</figure>
				<div class="details">
					<!-- <div class="category"><a href="category.html">Computer</a></div> -->
					<h1><a href="{{ action('ArticleController@show', $article) }}">{{$article->title}}</a></h1>
					<div class="time">{{$article->created_at->toFormattedDateString()}}</div>
					<!-- <div class="time"> -->
									<a href="/categories/{{ $article->catgs->title }}">
									{{$article->catgs->title}}
									</a>
								<!-- </div> -->
				</div>
					
			</article>
		</div>
	@endforeach
				
</div>

