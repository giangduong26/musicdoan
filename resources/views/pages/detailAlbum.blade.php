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
		<h1 class="tittle">Album  <span class="new">{{$detailalbum->name}}</span></h1>
		<div class="tittle">Artist: <a href="detailSinger/{{$detailalbum['id_singer']}}">{{$detailalbum->singer->nickname}}</a></div>
		<br>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-3 content-grid">
		<a class="play-icon popup-with-zoom-anim" >
			<img src="upload/image_video/{{$detailalbum->image}}" title="{{$detailalbum->singer->nickname}}">
		</a>
	</div> 
	<br><br><br><br><br>
	<div class="jp-type-playlist">	
		<div id="small-dialog" class="mfp-hide">
			<img src="upload/image_video/{{$detailalbum->image}}" width="600">
		</div>
		<div class="clearfix"> </div>
	</div>
	<hr>
	<div class="video-main">
		<div class="video-record-list">
			<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
				<div class="jp-type-playlist">
					<div class="jp-playlist">
						<h1>List song  <span style="font-weight: bold;"></span></h1>
						<ul style="display: block;">
							@foreach($detailalbum->song as $sog)
								@if($sog->type == 0)
								<form method="POST" action="addToPlaylist/{{$sog->id_song}}" id="list" name="list">
								{!! csrf_field() !!}
									<span class="jp-artist" style="float: right;">
										<button type="submit" onlick="" style="border-radius: 100px;
										margin-top: 15px " class="btn btn-info">
											<i class="glyphicon glyphicon-heart"></i>
										</button>
									</span>
								</form>
								<form method="POST" action="albumsong" id="nghenhac">
									{!! csrf_field() !!}
									<input type="hidden" name="song" value="{{$sog->id_song}}">
									<input type="hidden" name="singer" value="{{$detailalbum->singer->id_singer}}">
									<input type="hidden" name="id_album" value="{{$detailalbum->id_album}}">
									<li class="jp-playlist-current" style="list-style-type: none;">
										<div>										
											<a  class="jp-playlist-item jp-playlist-current" 
												href="javascript:{}" 
												onclick="document.getElementById('nghenhac').submit();">{{$sog->name_song}}
												<span class="jp-artist"> - {{$sog->album->singer->nickname}}</span> 
												<span class="jp-artist" style="float: right;">View: {{$sog->view}} |  </span>
											</a>
										</div>
									</li>
								</form>	
								@endif										
							@endforeach
						</ul>					
					</div>
					<hr>
<!-- 					<div class="jp-playlist">
						<h1>List video  <span style="font-weight: bold;">album: {{$detailalbum->name}}</span></h1>
						<ul style="display: block;">
							@foreach($detailalbum->song as $sog)
								@if($sog->type == 1)
								<form method="POST" action="addToPlaylist/{{$sog->id_song}}" id="list" name="list">
								{!! csrf_field() !!}
									<span class="jp-artist" style="float: right;">
										<button type="submit" onlick="" style="border-radius: 100px;
										margin-top: 15px " class="btn btn-info">
											<i class="glyphicon glyphicon-heart"></i>
										</button>
									</span>
								</form>
								<div>
									<a href="playvideo/{{$sog->id_song}}" 
										class="jp-playlist-item jp-playlist-current" 
										tabindex="0">{{$sog->name_song}}
										<span class="jp-artist"> - {{$sog->album->singer->name}}</span> 
										<span class="jp-artist" style="float: right;">View: {{$sog->view}} |  </span>
									</a>
								</div>	
								@endif										
							@endforeach
						</ul>					
					</div>
					<hr> -->
					<div class="tittle-head">
						<h1>List video  <span style="font-weight: bold;"></span></h1>
						<div class="clearfix"> </div>
					</div>
						@foreach($detailalbum->song as $sog)
							@if($sog->type == 1)
								<div class="col-md-3 content-grid">
									<a href="playvideo/{{$sog->id_song}}" class="jp-playlist-item jp-playlist-current" 
											tabindex="0">{{$sog->name_song}}
										<img src="upload/image_video/{{$sog->path_image}}"  width="200" height="200" title="{{$sog->name_song}}">
									</a>
									<div class="inner-info" style="background-color: rgba(95, 95, 95, 0.65);">
										<form method="POST" action="addToPlaylist/{{$sog->id_song}}" id="list" name="list">
											{!! csrf_field() !!}
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_song" value="{{$sog->id_song}}">
											<button type="submit" onlick="add({{$sog->id_song}})" style="border-radius: 100px" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i></button>	
										</form>
									</div>
								</div>
							@endif
						@endforeach
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()
