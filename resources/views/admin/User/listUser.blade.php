@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">User</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List User</h4>
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
					<th>LvL</th>
					<th>Infomation</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th><i class="fa fa-pencil fa-fw"></i> Delete</th>
					<th><i class="fa fa-trash-o fa-fw"></i> Edit</th>					
				</tr> 
			</thead> 
			<tbody> 
				@foreach($user as $us)
					<tr> 
						<th scope="row">{{$us->id_user}}</th> 
						<td align="center">
							<div style="font-weight: bold;" >{{$us->name}}</div><br>
							<img width="200px" src="upload/image/{{$us->image}}">
						</td> 	
						<td>
							@if($us->lvl == '1')
								{{'Admin'}}
							@else
								{{'User'}}
							@endif
						</td>				
						<td>
							<p><span style="font-weight: bold;">- Email: </span>{{$us->email}}</p>
							<p><span style="font-weight: bold;">- Password: </span>{{$us->password}}</p>
							<p><span style="font-weight: bold;">- Phone: </span>{{$us->phone}}</p>
							<p><span style="font-weight: bold;">- Address: </span>{{$us->address}}</p>
						</td>
						<td>{{$us->created_at}}</td>
						<td>{{$us->updated_at}}</td>
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/User/delUser/{{$us->id_user}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/User/editUser/{{$us->id_user}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>
@endsection
