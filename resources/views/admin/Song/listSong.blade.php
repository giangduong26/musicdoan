@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Song</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Song</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead > 
				<tr> 
					<th>Id</th> 
					<th>Name</th>
					<th style="width: 200px">Infomation</th>
					<th>Lyric</th>
					<th>Startus</th> 
					<th>Created At</th>
					<th>Updated At</th>
					<th><i class="fa fa-pencil fa-fw"></i> Delete</th>
					<th><i class="fa fa-trash-o fa-fw"></i> Edit</th>					
				</tr> 
			</thead> 
			<tbody> 
				@foreach($song as $s)
					<tr> 
						<th scope="row">{{$s->id_song}}</th> 
						<td align="center">
							<div style="font-weight: bold;" >{{$s->name_song}}</div><br>
							<img width="200px" src="upload/image_video/{{$s->path_image}}">
						</td> 					
						<td>
							<p><span style="font-weight: bold;">- Singer: </span>{{$s->album->singer->name}}</p>
							<p><span style="font-weight: bold;">- Slug name: </span>{{$s->slug_name}}</p>
							<p><span style="font-weight: bold;">- View: </span>{{$s->view}}</p>
							<p><span style="font-weight: bold;">- ViewCountWeek: </span>{{$s->viewcountweek}}</p>
							<p><span style="font-weight: bold;">- Creator: </span>{{$s->creator}}</p>
							<p><span style="font-weight: bold;">- National: </span>{{$s->national}}</p>
							<p><span style="font-weight: bold;">- Menu: </span>{{$s->menu->name_mn}}</p>
							<p><span style="font-weight: bold;">- Genres: </span>{{$s->genres->name_genres}}</p>
							<p><span style="font-weight: bold;">- Album: </span>{{$s->album->name}}</p>
							<p><span style="font-weight: bold;">- Type: </span>					
								@if($s->type== '1')
									{{'Mp4'}}
								@else
									{{'Mp3'}}
								@endif								
							</p>
						</td>
						<td >
							<div class="intro">
								{{$s->lyric}}				
							</div>
						</td>
						<td>{{$s->status}}</td>
						<td>{{$s->created_at}}</td>
						<td>{{$s->updated_at}}</td>
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Song/delSong/{{$s->id_song}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Song/editSong/{{$s->id_song}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection
