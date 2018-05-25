@extends('layout.index')

@section('content')	
<!-- SEARCH here -->

<div class="clearfix"></div>
</div>
<!--notification menu end -->
<!-- //header-ends -->

<!-- //slide -->
			
<div id="page-wrapper">
	@if(session('loi'))
		<div class="alert alert-danger" align="center">
			{{session('loi')}}
		</div>
	@endif
	@if(session('thanhcong'))
		<div class="alert alert-success" align="center">
			{{session('thanhcong')}}
		</div>
	@endif
	<div class="inner-content">
		<div class="music-left">
			<!--banner-section-->
			<div class="banner-section">
				<div class="banner">
					<div class="callbacks_container">
						<ul class="rslides callbacks callbacks1" id="slider4">
							<li>
								<div class="banner-img">
									<img src="trangchu/images/11.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info">
									<a class="trend" href="#">TRENDING</a>
									<h3>Let Your Home</h3>
									<p>Album by <span>Rock star</span></p>
								</div>

							</li>
							<li>
								<div class="banner-img">
									<img src="trangchu/images/22.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info">
									<a class="trend" href="#">TRENDING</a>
									<h3>Charis Brown feet</h3>
									<p>Album by <span>Rock star</span></p>
								</div>
							</li>
							<li>
								<div class="banner-img">
									<img src="trangchu/images/33.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info"> 
									<a class="trend" href="#">TRENDING</a>
									<h3>Let Your Home</h3>
									<p>Album by <span>Rock star</span></p>
								</div>

								<!-- /w3layouts-agileits -->
							</li>
						</ul>
					</div>
					<!--banner-->
					<script src="trangchu/js/responsiveslides.min.js"></script>
					<script>
		// You can also use "$(window).load(function() {"
		$(function () {
		  // Slideshow 4
		  $("#slider4").responsiveSlides({
		  	auto: true,
		  	pager:true,
		  	nav:true,
		  	speed: 500,
		  	namespace: "callbacks",
		  	before: function () {
		  		$('.events').append("<li>before event fired.</li>");
		  	},
		  	after: function () {
		  		$('.events').append("<li>after event fired.</li>");
		  	}
		  });

		});
	</script>
	<div class="clearfix"> </div>
</div>
</div>	
<!--//end-slide-->

<!--albums-->
<!-- pop-up-box --> 
<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
<script src="trangchu/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});
	});
</script>	

<!--//music-left -->
<div class="albums ">
	<div class="tittle-head">
		<h3 class="tittle">Songs <span class="new">Hot</span></h3>
		<a href="{{'song'}}"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<?php 
		$data = $song->where('type','0')->sortByDesc('id_song')->take(8);
	?>
	@foreach($data as $list)
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" 
			onclick="document.getElementById('nghenhac'+{{$list->id_song}}).submit();">
			<img src="upload/image_video/{{$list->path_image}}" 
				 title="{{$list->name_song}}"
				 width="200" height="200"></a>
		<a class="button play-icon popup-with-zoom-anim" 
			onclick="document.getElementById('nghenhac'+{{$list->id_song}}).submit();">Listen now</a>		
	</div>
	@endforeach
	<div id="small-dialog" class="mfp-hide">
		@foreach($data as $list)	
			<div class="col-md-3 content-grid">
				@foreach($list->show as $gett)
				<form method="POST" action="playsong" id="nghenhac{{$gett->song->id_song}}">
					{!! csrf_field() !!}
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="show" value="{{$gett->id_show}}">
					<input type="hidden" name="song" value="{{$list->id_song}}">									
				</form>
				@endforeach
				<a class="jp-playlist-item jp-playlist-current" 
					onclick="document.getElementById('nghenhac'+{{$list->id_song}}).submit();">
					<span class="button play-icon popup-with-zoom-anim">{{$list->name_song}}</span>
					<img src="upload/image_video/{{$list->path_image}}" title="Play" width="200" height="200">
				</a>					
			</div>	
		@endforeach						
	</div>		
	<div class="clearfix"> </div>	
</div>
<!--//End-albums-->
<!-- mp4 -->
<div class="albums second">
	<div class="tittle-head">
		<h3 class="tittle">Video <span class="new">Hot</span></h3>
		<a href="video"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
		@foreach($mp4 as $list)
		<div class="col-md-3 content-grid">
			<a href="playvideo/{{$list->id_song}}">
				<img src="upload/image_video/{{$list->path_image}}"  width="200" height="200" title="{{$list->name_song}}">
			</a>
		</div>
		@endforeach
	<!-- 	@foreach($mp4 as $list)	
			<div class="col-md-3 content-grid">
				<div class="button play-icon popup-with-zoom-anim" >{{$list->name_song}}</div>
				<a href="playvideo/{{$list->id_song}}">			
					<img src="upload/image_video/{{$list->path_image}}" title="Play" width="200" height="200">
				</a>
				<div class="inner-info" style="background-color: rgba(95, 95, 95, 0.65) !important;">
					<form method="POST" action="addToPlaylist/{{$list->id_song}}" id="list" name="list">
						{!! csrf_field() !!}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="id_song" value="{{$list->id_song}}">
						<button type="submit" onlick="add({{$list->id_song}})" style="border-radius: 100px" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i></button>						
					</form>
				</div>
			</div>				
		@endforeach -->
	<div class="clearfix"> </div>
</div>
<!-- end mp4 -->
<!--//discover-view-->
<div class="albums second">
	<div class="tittle-head">
		<h3 class="tittle">Albums <span class="new">Hot</span></h3>
		<a href="{{'album'}}"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<!-- lấy những album có hot là 1 -->
		<?php 
			$data = $album->where('hot',1)->sortByDesc('created_at')->take(8);
		?>
		@foreach($data as $list)
		<div class="col-md-3 content-grid">
			<a href="detailAlbum/{{$list['id_album']}}">
				<img src="upload/image_video/{{$list->image}}"  width="200" height="200" title="{{$list->name}}">
			</a>
			<div class="inner-info"><a href="upload/image_video/{{$list->image}}"><h5>{{$list->name}}</h5></a></div>
		</div>
		@endforeach
	<div class="clearfix"> </div>
</div>
<!--//discover-view-->

<!-- Singer -->
<div class="albums second">
	<div class="tittle-head">
		<h3 class="tittle">Singer <span class="new">Hot</span></h3>
		<a href="{{'singer'}}"><h4 class="tittle two">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<!-- lấy 8 singer và sắp xếp theo ngày tạo -->
		<?php 
			$data = $singer->sortByDesc('created_at')->take(8);
		?>
		@foreach($data as $list)
		<div class="col-md-3 content-grid">
			<a href="detailSinger/{{$list['id_singer']}}">
				<img src="upload/image/{{$list->image}}"  width="200" height="200" title="{{$list->nickname}}">
			</a>
			<div class="inner-info"><a href="detailSinger/{{$list['id_singer']}}"><h5>{{$list->nickname}}</h5></a></div>
		</div>
		@endforeach
	<div class="clearfix"> </div>
</div>

<!--End Singer -->
</div>
<br><br><br>
@endsection
@section('script')
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection