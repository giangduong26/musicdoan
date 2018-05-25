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
	<div class="tittle-head">
		<h1 class="tittle">Singer <span class="new">Hot</span></h1>
		<div class="clearfix"> </div>
	</div>

	<div class="albums" >

	@foreach($singers as $sg)	
		<div class="col-md-3 content-grid">
			<a href="detailSinger/{{$sg['id_singer']}}"><img src="upload/image/{{$sg->image}}" title="allbum-name" width="200" height="200"></a>
			<div class="inner-info"><a href="detailSinger/{{$sg['id_singer']}}"><h5>{{$sg->nickname}}</h5></a></div>
		</div>
	@endforeach
		<div class="clearFix"> </div>
		<div align="center">{{$singers->links()}}</div>
	</div>
</div>
<div class="clearFix"> </div>
@endsection()
