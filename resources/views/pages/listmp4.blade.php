@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>
<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">

	<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">

		<div class="tittle-head">
			<h1 class="tittle">Video <span class="new">Hot</span></h1>
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
		@foreach($video as $list)	
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
		@endforeach
			<div class="clearfix"> </div>
			<div align="center">{{$video->links()}}</div>
		</div>
</div>
@endsection()
@section('script')
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection
