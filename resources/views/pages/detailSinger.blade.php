@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>

<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">

<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
@if(count($errors)>0)
	<div class="alert alert-danger">
	@foreach($errors->all() as $err)
	  {{$err}}<br>
	@endforeach
	</div> 
	@endif
	@if(session('loi'))
	  <div class="alert alert-danger">
	    {{session('loi')}}
	  </div>
	@endif 
<!--//music-left -->
	<div class="tittle-head">
		<!-- Tên ca sĩ -->
		<h1 class="tittle">Singer <span class="new">{{$detailsinger->nickname}}</span></h1>
		<div class="clearfix"></div>
	</div>
	<br><br>	
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" >
			<img src="upload/image/{{$detailsinger->image}}">
		</a>
	</div> 
	<div class="col-md-8 ">
		<h2 class="title" style="float: left; font-weight: bold;">Infomation</h2><br><br>
		<div>
			<h2 class="title">{{$detailsinger->name}}<span style="font-size: 24px"> ({{$detailsinger->nickname}})</span></h2>
			<div class="title"><span> - National: {{$detailsinger->national}}</span></div>
			<div>- Birthday: {{$detailsinger->birthday}}</div>
			<div style="float: left;">
				<div id="intro">
					Introduct: {{$detailsinger->introduct}}				
				</div> 			
			</div>
		</div>				
	</div>		
	<br><br><br><br><br>
	<div class="jp-type-playlist">	
		<div id="small-dialog" class="mfp-hide">
			<img src="upload/image/{{$detailsinger->image}}" width="600">
		</div>
		<div class="clearfix"></div>
	</div>
	<hr>	
	<div class="albums">
		<h1 class="title">Album</h1>
		@foreach($al as $namealbum)	
			<div class="col-md-3 content-grid">
				<a href="detailAlbum/{{$namealbum['id_album']}}">
					<img src="upload/image_video/{{$namealbum->image}}" title="{{$namealbum->name}}" width="200" height="200">
				</a>
				<div class="inner-info">
					<a href="detailAlbum/{{$namealbum['id_album']}}"><h5>{{$namealbum->name}}</h5></a>
				</div>
			</div>	
		@endforeach
		<div class="clearfix"> </div>
	</div>
	<hr>
	<div class="clearfix"> </div>
	<div class="video-main">
		<div class="video-record-list">
			<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
				<div class="jp-type-playlist">					
					<div class="jp-playlist">
						<h1 class="title">List song</h1>
						<ul style="display: block;">										
							<li class="jp-playlist-current" style="list-style-type: none;">
								@foreach($detailsinger->show as $getsong)
									@if($getsong->song->type == 0)
									<form method="POST" action="addToPlaylist/{{$getsong->song->id_song}}" id="list" name="list">
									{!! csrf_field() !!}
										<span class="jp-artist" style="float: right;">
											<button type="submit" onlick="" style="border-radius: 100px;
											margin-top: 15px " class="btn btn-info">
												<i class="glyphicon glyphicon-heart"></i>
											</button>
										</span>
									</form>
									<div>
										<a href="singersong/{{$getsong->id_show}}/{{$detailsinger->id_singer}}" 
											class="jp-playlist-item jp-playlist-current" 
											tabindex="0">{{$getsong->song->name_song}} 
											<span class="jp-artist" style="float: right;">View: {{$getsong->song->view}} |</span>
										</a>
									</div>	
									@endif
								@endforeach
							</li>														
						</ul>
					</div>
<!-- 					<hr>
					======================Lấy list video của ca sĩ theo dạng danh sách====================
					<div class="jp-playlist">
						<h1>List video  <span style="font-weight: bold;"></span></h1>
						<ul style="display: block;">
							@foreach($detailsinger->show as $getsong)
								@if($getsong->song->type == 1)
								<form method="POST" action="addToPlaylist/{{$getsong->song->id_song}}" id="list" name="list">
								{!! csrf_field() !!}
									<span class="jp-artist" style="float: right;">
										<button type="submit" onlick="" style="border-radius: 100px;
										margin-top: 15px " class="btn btn-info">
											<i class="glyphicon glyphicon-heart"></i>
										</button>
									</span>
								</form>
								<div>
									<a href="playvideo/{{$getsong->song->id_song}}" 
										class="jp-playlist-item jp-playlist-current" 
										tabindex="0">{{$getsong->song->name_song}}
										<span class="jp-artist"> - {{$getsong->song->album->singer->name}}</span> 
										<span class="jp-artist" style="float: right;">View: {{$getsong->song->view}} | </span>
									</a>
								</div>	
								@endif										
							@endforeach
						</ul>					
					</div> -->
					<hr>
					<!-- ==========================Lấy list video của ca sĩ=========================== -->
					<div class="tittle-head">
						<h1>List video  <span style="font-weight: bold;"></span></h1>
						<div class="clearfix"> </div>
					</div>
						@foreach($detailsinger->show as $getsong)
							@if($getsong->song->type == 1)
								<div class="col-md-3 content-grid">
									<a href="playvideo/{{$getsong->song->id_song}}" class="jp-playlist-item jp-playlist-current" 
											tabindex="0">{{$getsong->song->name_song}}
										<img src="upload/image_video/{{$getsong->song->path_image}}"  width="200" height="200" title="{{$getsong->song->name_song}}">
									</a>
									<div class="inner-info" style="background-color: rgba(95, 95, 95, 0.65);">
										<form method="POST" action="addToPlaylist/{{$getsong->song->id_song}}" id="list" name="list">
											{!! csrf_field() !!}
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_song" value="{{$getsong->song->id_song}}">
											<button type="submit" onlick="add({{$getsong->song->id_song}})" style="border-radius: 100px" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i></button>	
										</form>
									</div>
								</div>
							@endif
						@endforeach
					<div class="clearfix"></div>
					</div>
<!-- 					======================================== -->
				</div>
			</div>
		</div>
	</div>
</div>
<link href="trangchu/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="trangchu/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="trangchu/js/jplayer.playlist.min.js"></script>
<script>
	$('#intro').readmore({
      moreLink: '<a href="#">Read more</a>',
      collapsedHeight: 20,
    });

    $('article').readmore({speed: 500});
</script>
@endsection()
