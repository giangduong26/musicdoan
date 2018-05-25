@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Genres</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Genres</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead> 
				<tr> 
					<th>Id</th> 
					<th>Name Genres</th>
					<th><i class="fa fa-trash-o fa-fw"></i> Edit</th>
					<th><i class="fa fa-pencil fa-fw"></i> Delete</th>
				</tr> 
			</thead> 
			<tbody> 
				@foreach($genres as $gr)
					<tr> 
						<th scope="row">{{$gr->id_genres}}</th> 
						<td>{{$gr->name_genres}}</td> 
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Genres/delGenres/{{$gr->id_genres}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Genres/editGenres/{{$gr->id_genres}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection