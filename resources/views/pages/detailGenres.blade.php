@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>

<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">
<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">

	<div class="tittle-head">
		<h1 class="tittle">Genres: {{$nameGenres->name_genres}}</h1>
		<div class="clearfix"> </div>
	</div>
	<div class="albums" >

	@foreach($detailgenres as $dg)	
		<div class="col-md-3 content-grid">
			<a href=""><img src="upload/image_video/{{$dg->path_image}}" title="allbum-name" width="200" height="200"></a>
			<div class="inner-info"><a href=""><h5>{{$dg->name_song}}</h5></a></div>
		</div>
	@endforeach

		<div class="clearfix"> </div>
	
		<div align="center">
            {{ $detailgenres->appends(Request::all())->links() }}
        </div>

	</div>


</div>

@endsection()
