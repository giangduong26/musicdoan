@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Menu</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Menu</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead> 
				<tr> 
					<th>Id</th> 
					<th>Name Menu</th>
					<th><i class="fa fa-trash-o fa-fw"></i> Edit</th>
					<th><i class="fa fa-pencil fa-fw"></i> Delete</th>
				</tr> 
			</thead> 
			<tbody> 
				@foreach($menu as $mn)
					<tr> 
						<th scope="row">{{$mn->id_menu}}</th> 
						<td>{{$mn->name_mn}}</td> 
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Menu/delMenu/{{$mn->id_menu}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Menu/editMenu/{{$mn->id_menu}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection