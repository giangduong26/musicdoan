@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Singer Show</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Show</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead> 
				<tr> 
					<th>Id</th> 
					<th>Song</th> 
					<th>Singer</th>  
					<th>Path</th> 
					<th>Created At</th> 
					<th>Updated At</th> 
					<th><i class="fa fa-trash-o fa-fw"></i> Delete</th>
					<th><i class="fa fa-pencil fa-fw"></i> Edit</th>
				</tr> 
			</thead> 
			<tbody> 
				@foreach($show as $sw)
					<tr> 
						<th scope="row">{{$sw->id_show}}</th> 
						<td>{{$sw->song->name_song}}</td> 
						@php $type = substr($sw->path, strlen($sw->path) - 3, 3); @endphp
						<td>{{$sw->singer->nickname}}</td>
						<td>
							@if($type == 'mp3') 
                            <audio controls>
                            	<source src="upload/file/{{$sw->path}}" autoplay="autoplay" preload ="auto" type="audio/mpeg">
                            </audio>
	                        @elseif($type == 'mp4')
	                        <video width="300" controls>
	                        	<source src="upload/file/{{$sw->path}}" type="video/mp4">
	                        </video>
	                        @endif
	                        @if($sw['song->path_image']!=null)
	                            <td><img width="200" src="upload/file/{{$sw->song->path_image}}" ></td>
	                            @else
	                            <!-- <td>Null</td> -->
	                        @endif
                        </td>
						<td>{{$sw->created_at}}</td>
						<td>{{$sw->updated_at}}</td> 
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Singer_show/delShow/{{$sw->id_show}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Singer_show/editShow/{{$sw->id_show}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection