<aside>
	<div class="aside-body">
		<div class="featured-author">
			<div class="featured-author-inner">
				
				<div class="featured-author-cover" style="background-image: url('/frontend/images/news/img15.jpg');">
					
					<div class="badges">
						<div class="badge-item"><i class="ion-star"></i> Featured</div>
					</div>
					
					<div class="featured-author-center">
						<figure class="featured-author-picture">
							<img src="/frontend/images/img01.jpg" alt="Sample Article">
						</figure>
						<div class="featured-author-info">
							<h2 class="name">John Doe</h2>
							<div class="desc">@JohnDoe</div>
						</div>
					</div>
				</div>
				
				<div class="featured-author-body">
					<div class="featured-author-count">
						<div class="item">
							<a href="#">
								<div class="name"> @lang('lables.posts') </div>
								<div class="value">208</div>														
							</a>
						</div>
						
						<div class="item">
							<a href="#">
													
								<div class="name"> 	@lang('lables.rate') </div>
													@lang('lables.posts')
								<div class="value">3,729</div>														
							</a>
						</div>
						
						<div class="item">
							<a href="#">
								<div class="icon">
									<div>More</div>
									<i class="ion-chevron-right"></i>
								</div>														
							</a>
						</div>
					</div>
					
					<div class="featured-author-quote">
						"Eur costrict mobsa undivani krusvuw blos andugus pu aklosah"
					</div>
					
					<div class="block">
						<h2 class="block-title">@lang('lables.latest-photos')</h2>
						
						<div class="block-body">
							<ul class="item-list-round" data-magnific="gallery">
								
								@foreach($photos as $photo)
									<li><a href="/images/albums/{{ $photo->image }}" style="background-image: url('/images/albums/{{ $photo->image }}');"></a></li>
								@endforeach

							</ul>
						</div>
					
					</div>
					
					<div class="featured-author-footer">
						<a href="#">See All Authors</a>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</aside>