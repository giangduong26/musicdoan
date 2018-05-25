@extends('admin.layout.index')

@section('content')

<div id="page-wrapper" style="height: 600px">
	<div class="main-page">
		<div class="col-md-3 content-grid">
			<a class="play-icon popup-with-zoom-anim" >
				<img width="200px" src="upload/image/{{$user->image}}">
			</a>
		</div> 
		<div class="col-md-8 ">
		<h2 class="title" style="float: left; font-weight: bold;">Profile</h2><br><br>
		<div>
			<h2 class="title">{{$user->name}}</h2>
			<div class="title"><span> - Address: {{$user->address}} </span></div>
			<div class="title"><span> - Phone: {{$user->phone}}</span></div>
			<div class="title"><span> - Email: {{$user->email}}</span></div>
			<div class="title"><span> - Level: @if($user->lvl == '1')Admin @else User @endif</span></div>
		</div>				
	</div>				
	</div>
</div>
@endsection