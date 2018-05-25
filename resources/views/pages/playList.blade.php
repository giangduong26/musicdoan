@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>

<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">

<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">


<!--//music-left -->
	<div class="tittle-head">
		<div class="tittle-head">
			@if(session('loi'))
				<div class="alert alert-danger">
					{{session('loi')}}
				</div>
			@endif
			@if(session('thanhcong'))
					<div class="alert alert-success">
						{{session('thanhcong')}}
					</div>
				@endif
			<div class="clearfix"> </div>
		</div>
		<h1 class="tittle"><span class=""><i class="fa fa-heart"></i></span><span style="font-weight: bold;"><u>-My play list-</u></span><span class=""><i class="fa fa-heart"></i></span></h1>
		<div class="clearfix"></div>
		<hr>
	</div>
	<br><br><br><br>
	<div class="jp-type-playlist">	
		<div id="small-dialog" class="mfp-hide">
			<img src="" width="600">
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="video-main">
		<div class="video-record-list">
			<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
				<div class="jp-type-playlist">
					<div class="jp-playlist">
						<h1>List song favourite <span style="font-weight: bold;">></span></h1>
						<ul style="display: block;">
							<li class="jp-playlist-current" style="list-style-type: none;">
								<?php $index =1;?>
								@foreach($list as $l)								
									@if($l->song->type == 0)
									<form method="POST" action="delToPlaylist/{{$l->id_favorite}}">
									{!! csrf_field() !!}
										<span class="jp-artist" style="float: right;">
											<button type="submit" onlick="" style="border-radius: 100px;
											margin-top: 15px " class="btn btn-success" title="Remove">
												<i class="fa fa-trash-o fa-fw"></i>
											</button>
										</span>
									</form>
									<form  method="POST" action="playList" id="nghenhac{{$index}}">
										<div>
											{!! csrf_field() !!}
											<input type="hidden" name="song" value="{{$l->song->id_song}}">
											<input type="hidden" name="singer" value="{{$l->song->album->singer->id_singer}}">
											<a onclick="document.getElementById('nghenhac{{$index}}').submit();" 
												class="jp-playlist-item jp-playlist-current" 
												tabindex="0">{{$l->song->name_song}}<span class="jp-artist"> - {{$l->song->album->singer->nickname}}</span> <span class="jp-artist" style="float: right;">View: {{$l->song->view}} |  </span>
											</a>
											<?php $index++; ?>
										</div>	
									</form>											
									@endif								
								@endforeach
							</li>							
						</ul>					
					</div>
					<!-- <hr>
					<div class="jp-playlist">
						<h1>List video favourite <span style="font-weight: bold;">></span></h1>
						<ul style="display: block;">
							<li class="jp-playlist-current" style="list-style-type: none;">
								@foreach($list as $l)
									@if($l->song->type == 1)
									<form method="POST" action="delToPlaylist/{{$l->id_favorite}}">
									{!! csrf_field() !!}
										<span class="jp-artist" style="float: right;">
											<button type="submit" onlick="" style="border-radius: 100px;
											margin-top: 15px " class="btn btn-success" title="Remove">
												<i class="fa fa-trash-o fa-fw"></i>
											</button>
										</span>
									</form>
										<div>
											<a href="playvideo/{{$l->song->id_song}}" 
												class="jp-playlist-item jp-playlist-current" 
												tabindex="0">{{$l->song->name_song}}
												<span class="jp-artist"> - {{$l->song->album->singer->name}}</span> 
												<span class="jp-artist" style="float: right;">View: {{$l->song->view}} |  </span>
											</a>
										</div>	
									@endif
								@endforeach
							</li>							
						</ul>					
					</div> -->
					<hr>
					<div class="tittle-head">
						<h1>List video favourite <span style="font-weight: bold;">></span></h1>
						<div class="clearfix"> </div>
					</div>
						@foreach($list as $l)
							@if($l->song->type == 1)
								<div class="col-md-3 content-grid">
									<a href="playvideo/{{$l->song->id_song}}" class="jp-playlist-item jp-playlist-current" 
											tabindex="0">{{$l->song->name_song}}
										<img src="upload/image_video/{{$l->song->path_image}}"  width="200" height="200" title="{{$l->song->name_song}}">
									</a>
									<div class="inner-info" style="background-color: rgba(95, 95, 95, 0.65);">
										<form method="POST" action="addToPlaylist/{{$l->song->id_song}}" id="list" name="list">
											{!! csrf_field() !!}
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_song" value="{{$l->song->id_song}}">
											<button type="submit" onlick="add({{$l->song->id_song}})" style="border-radius: 100px" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i></button>						
										</form>
									</div>
								</div>
							@endif
						@endforeach
					<div class="clearfix"> </div>
					<!-- ============================================ -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()