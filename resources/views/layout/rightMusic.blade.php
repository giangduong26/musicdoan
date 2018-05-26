<div class="music-right">
	<!--/video-main-->
	<div class="video-main">
		<div class="video-record-list">
			<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
				<div class="jp-type-playlist">
					<div id="jquery_jplayer_1" class="jp-jplayer" style="width: 480px; height: 270px;">
						<img id="jp_poster_0" src="trangchu/video/play1.png" style="width: 480px; height: 270px; display: inline;">
						<video id="jp_video_0" preload="metadata" src="trangchu/http://192.168.30.9/vijayaa/2015/Dec/mosaic/web/video/Ellie-Goulding.webm" title="1. Ellie-Goulding" style="width: 0px; height: 0px;"></video>
					</div>
					<div class="jp-gui">
							<div class="jp-video-play" style="display: block;">
								<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
							</div>
							<div class="jp-interface">
								<div class="jp-progress">
									<div class="jp-seek-bar" style="width: 100%;">
										<div class="jp-play-bar" style="width: 0%;"></div>
									</div>
								</div>
									<div class="jp-current-time" role="timer" aria-label="time">00:00</div>
									<div class="jp-duration" role="timer" aria-label="duration">00:18</div>
									<div class="jp-controls-holder">
									<div class="jp-controls">
										<button class="jp-previous" role="button" tabindex="0">previous</button>
										<button class="jp-play" role="button" tabindex="0">play</button>
									</div>
									<div class="jp-volume-controls">
										<button class="jp-mute" role="button" tabindex="0">mute</button>
										<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
									<div class="jp-volume-bar">
										<div class="jp-volume-bar-value" style="width: 100%;"></div>
									</div>
									</div>
									<div class="jp-toggles">
										<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
									</div>
									</div>
								<div class="jp-details" style="display: none;">
									<div class="jp-title" aria-label="title">1. Ellie-Goulding</div>
								</div>
							</div>
							<!-- <div class="jp-playlist">
								<ul style="display: block;"><li class="jp-playlist-current"><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item jp-playlist-current" tabindex="0">1. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">2. Mark-Ronson-Uptown <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">3. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">4. Maroon-Sugar <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">5. Pharrell-Williams <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">6. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">7. Pharrell-Williams <span class="jp-artist">by Pixar</span></a></div></li></ul>
							</div>
							<div class="jp-no-solution" style="display: none;">
								<span>Update Required</span>
								To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
							</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<!-- ============================================= -->
	<h1 class="">List song <span class="new">HOT</span></h1>
	<div class="video-main">
		<div class="video-record-list">
			<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
				<div class="jp-type-playlist">					
					<div class="jp-playlist">
						<ul style="display: block;" >
							@foreach($lsong as $s)
							<li class="jp-playlist-current" style="list-style-type: none;">
								<form method="POST" action="addToPlaylist/{{$s->id_song}}" id="list" name="list">
									{!! csrf_field() !!}
										<span class="jp-artist" style="float: right;">
											<button type="submit" onlick="" style="border-radius: 100px;
											margin-top: 15px " class="btn btn-info">
												<i class="glyphicon glyphicon-heart"></i>
											</button>
										</span>
								</form>
								<form method="post" id="nghenhac{{$s->id_song}}" action="listright">
									<div>
										{!! csrf_field() !!}
										<input type="hidden" name="song" value="{{$s->id_song}}">
									@foreach($s->show as $lol)
										<input type="hidden" name="singer" value="{{$lol->id_singer}}">
									@break
									@endforeach()										
										<a onclick="document.getElementById('nghenhac'+{{$s->id_song}}).submit();" 
											class="jp-playlist-item jp-playlist-current" 
											tabindex="0">{{$s->name_song}} 
											<span class="jp-artist" style="float: right;">View: {{$s->view}} |  </span>
										</a>
									</div>								
								</form>	
							</li>							
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- script for play-list -->
	<link href="trangchu/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="trangchu/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="trangchu/js/jplayer.playlist.min.js"></script>
	<script type="text/javascript">
<![CDATA[
$(document).ready(function(){
	// new jPlayerPlaylist({
	// 	jPlayer: "#jquery_jplayer_1",
	// 	cssSelectorAncestor: "#jp_container_1"
	// }, 
	// [
	// {
	// 	title:"1. Ellie-Goulding",
	// 	artist:"",
	// 	mp4: "trangchu/video/Ellie-Goulding.mp4",
	// 	ogv: "trangchu/video/Ellie-Goulding.ogv",
	// 	webmv: "trangchu/video/Ellie-Goulding.webm",
	// 	poster:"trangchu/video/play1.png"
	// },
	// {
	// 	title:"2. Mark-Ronson-Uptown",
	// 	artist:"",
	// 	mp4: "trangchu/video/Mark-Ronson-Uptown.mp4",
	// 	ogv: "trangchu/video/Mark-Ronson-Uptown.ogv",
	// 	webmv: "trangchu/video/Mark-Ronson-Uptown.webm",
	// 	poster:"trangchu/video/play2.png"
	// },
	// {
	// 	title:"3. Ellie-Goulding",
	// 	artist:"",
	// 	mp4: "video/Ellie-Goulding.mp4",
	// 	ogv: "video/Ellie-Goulding.ogv",
	// 	webmv: "video/Ellie-Goulding.webm",
	// 	poster:"video/play1.png"
	// },
	// {
	// 	title:"4. Maroon-Sugar",
	// 	artist:"",
	// 	mp4: "video/Maroon-Sugar.mp4",
	// 	ogv: "video/Maroon-Sugar.ogv",
	// 	webmv: "video/Maroon-Sugar.webm",
	// 	poster:"video/play4.png"
	// },
	// {
	// 	title:"5. Pharrell-Williams",
	// 	artist:"",
	// 	mp4: "video/Pharrell-Williams.mp4",
	// 	ogv: "video/Pharrell-Williams.ogv",
	// 	webmv: "video/Pharrell-Williams.webm",
	// 	poster:"video/play5.png"
	// },
	// {
	// 	title:"6. Ellie-Goulding",
	// 	artist:"",
	// 	mp4: "video/Ellie-Goulding.mp4",
	// 	ogv: "video/Ellie-Goulding.ogv",
	// 	webmv: "video/Ellie-Goulding.webm",
	// 	poster:"video/play1.png"
	// },
	// {
	// 	title:"7. Pharrell-Williams",
	// 	artist:"",
	// 	mp4: "video/Pharrell-Williams.mp4",
	// 	ogv: "video/Pharrell-Williams.ogv",
	// 	webmv: "video/Pharrell-Williams.webm",
	// 	poster:"video/play5.png"
	// }
	// ], {
	// 	swfPath: "../../dist/jplayer",
	// 	supplied: "webmv,ogv,mp4",
	// 	useStateClassSkin: true,
	// 	autoBlur: false,
	// 	smoothPlayBar: true,
	// 	keyEnabled: true
	// });
});
]]>
</script>
<!-- //script for play-list -->

<!--//video-main-->
<!--/app_store-->
<div class="apps">
	<h3 class="hd-tittle">DuGiaMuSic now available in</h3>
	<div class="banner-button">
		<a href="#"><img src="trangchu/images/1.png" alt=""></a>
	</div>
	<div class="banner-button green-button">
		<a href="#"><img src="trangchu/images/2.png" alt=""></a>
	</div>
	<div class="clearfix"></div>
</div>
<!--//app_store-->
<!--/start-paricing-tables-->
<div class="price-section">
	<div class="pricing-inner">
		<h3 class="hd-tittle">Upgrade your Plan</h3>
		<div class="pricing">
			<div class="price-top">
				<h3><span>$20</span></h3>
				<h4>per year</h4>
			</div>
			<div class="price-bottom">
				<ul>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Download unlimited songs</a>
						<div class="clearfix"></div>
					</li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Stream songs in High Definition</a>
						<div class="clearfix"></div>
					</li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">No ads unlimited Devices</a>
						<div class="clearfix"></div>
					</li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Stream songs in High Definition</a>
						<div class="clearfix"></div>
					</li>
				</ul>
				<a href="single.html" class="price">Upgrade</a>
			</div>
		</div>
		<div class="pricing two">
			<div class="price-top">
				<h3><span>$30</span></h3>
				<h4>per year</h4>
			</div>
			<div class="price-bottom">
				<ul>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Download unlimited songs</a>
						<div class="clearfix"></div>
					</li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Stream songs in High Definition</a>
						<div class="clearfix"></div></li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">No ads unlimited Devices</a>
						<div class="clearfix"></div>
					</li>
					<li>
						<a class="icon" href="#">
							<i class="glyphicon glyphicon-ok"></i></a>
							<a class="text" href="#">Stream songs in High Definition</a>
						<div class="clearfix"></div>
					</li>
				</ul>
				<a href="single.html" class="price">Upgrade</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!--//end-pricing-tables-->
</div>
</div>
