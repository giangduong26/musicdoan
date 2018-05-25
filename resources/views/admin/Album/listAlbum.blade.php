@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Album</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Album</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead> 
				<tr> 
					<th>Id</th> 
					<th>Name Album</th> 
					<th>Year Release</th> 
					<th>Image</th> 
					<th>Singer</th> 
					<th>Hot</th>
					<th>Created At</th> 
					<th>Updated At</th> 
					<th><i class="fa fa-trash-o fa-fw"></i> Delete</th>
					<th><i class="fa fa-pencil fa-fw"></i> Edit</th>
				</tr> 
			</thead> 
			<tbody> 
				@foreach($album as $al)
					<tr> 
						<th scope="row">{{$al->id_album}}</th> 
						<td>{{$al->name}}</td> 
						<td>{{$al->year_release}}</td>
						<td>
							<img width="200px" src="upload/image_video/{{$al->image}}">
						</td>
						<td>{{$al->singer->nickname}}</td>
						<td>{{$al->hot}}</td>
						<td>{{$al->created_at}}</td>
						<td>{{$al->updated_at}}</td> 
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Album/delAlbum/{{$al->id_album}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Album/editAlbum/{{$al->id_album}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection
@section('script')
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection