@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>
<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">

	<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">

		<div class="tittle-head">
			<h1 class="tittle">Song <span class="new">Hot</span></h1>
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

		<div class="albums">
		@foreach($songs as $sog)	
			<div class="col-md-3 content-grid">
				<!-- <div class="button play-icon popup-with-zoom-anim">{{$sog->name_song}}</div> -->
					@foreach($sog->show as $gett)
					<form method="POST" action="playsong" id="nghenhac{{$gett->song->id_song}}">
						{!! csrf_field() !!}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="show" value="{{$gett->id_show}}">
						<input type="hidden" name="song" value="{{$sog->id_song}}">									
					</form>
					@endforeach
					<a class="jp-playlist-item jp-playlist-current" 						
						onclick="document.getElementById('nghenhac'+{{$sog->id_song}}).submit();">
						<span class="button play-icon popup-with-zoom-anim">{{$sog->name_song}}</span>
						<img src="upload/image_video/{{$sog->path_image}}" title="Play" width="200" height="200">
					</a>					
		
				<!-- thêm nhạc vào nhạc yêu thích -->
				<div class="inner-info" style="background-color: rgba(95, 95, 95, 0.65);">
					<form method="POST" action="addToPlaylist/{{$sog->id_song}}" id="list" name="list">
						{!! csrf_field() !!}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<input type="hidden" name="id_song" value="{{$sog->id_song}}">
						<button type="submit" onlick="add({{$sog->id_song}})" style="border-radius: 100px" class="btn btn-info"><i class="glyphicon glyphicon-heart"></i></button>						
					</form>
				</div>
			</div>				
		@endforeach
			<div class="clearfix"> </div>
			<div align="center">{{$songs->links()}}</div>
		</div>
</div>
@endsection
@section('script')
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection
