@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>

<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">
<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">

	<div class="tittle-head">
		<h1 class="tittle">Search song with: <span class="">{{$search}}</span></h1>
		<div class="clearfix"> </div>
	</div>
	<div class="albums" >
	@foreach($searchsong as $sg)	
	<form method="post" action="search" id="nghenhac{{$sg->id_song}}">
				{!! csrf_field() !!}
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="show" value="{{$sg->album->singer->id_singer}}">
		<input type="hidden" name="song" value="{{$sg->id_song}}">
		<input type="hidden" name="search" value="{{$search}}">
		<div class="col-md-3 content-grid">
			<a onclick="document.getElementById('nghenhac'+{{$sg->id_song}}).submit();">
				<img src="upload/image_video/{{$sg->path_image}}" title="Play now" width="200" height="200">
			</a>
				<div class="inner-info"><h5>{{$sg->name_song}}</h5></div>
		</div>
	</form>	
	@endforeach

		<div class="clearfix"> </div>
		<div align="center">
            {{ $searchsong->appends(Request::all())->links() }}
        </div>
	</div>
	<!-- ====================================================== -->
	<div class="tittle-head">
		<h1 class="tittle">Search album with: <span class="">{{$search}}</span></h1>
		<div class="clearfix"> </div>
	</div>
	<div class="albums" >
	@foreach($searchalbum as $sg)	
	<form method="post" action="search" id="album{{$sg->id_album}}">
				{!! csrf_field() !!}
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="search" value="{{$search}}">
		<div class="col-md-3 content-grid">
			<a onclick="" href="detailAlbum/{{$sg['id_album']}}">
				<img src="upload/image_video/{{$sg->image}}" title="Play now" width="200" height="200">
			</a>
				<div class="inner-info"><h5>{{$sg->name}}</h5></div>
		</div>
	</form>	
	@endforeach
		<div class="clearfix"></div>	
	</div>
</div>

@endsection()
