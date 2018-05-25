@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>
<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">
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
	<!--//Album-view-->
		<div class="tittle-head">
			<h1 class="tittle">Album <span class="new">Hot</span></h1>
			<div class="clearfix"> </div>
		</div>

		<div class="albums">
		@foreach($albums as $al)	
			<div class="col-md-3 content-grid">
				<a href="detailAlbum/{{$al['id_album']}}">
					<img src="upload/image_video/{{$al->image}}" title="{{$al->name}}" width="200" height="200">
				</a>
				<div class="inner-info">
					<a href="detailAlbum/{{$al['id_album']}}"><h5>{{$al->name}}</h5></a>
				</div>
			</div>
		@endforeach
			<div class="clearfix"> </div>
			<div align="center">{{$albums->links()}}</div>
		</div>
<!--//End Album-->
</div>

@endsection()
