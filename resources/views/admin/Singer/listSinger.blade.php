@extends('admin.layout.index')

@section('content')
<div class="tables">
	{{csrf_field()}}
	<h2 class="title1">Singer</h2>
	<div class="bs-example widget-shadow" data-example-id="bordered-table"> 
		<h4>List Singer</h4>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<table class="table table-bordered" id="dataTables-example"> 
			<thead> 
				<tr> 
					<th>Id</th> 
					<th>Name </th> 
					<th>Nick name</th> 
					<th>Birthday</th> 
					<th style="width: 80px">National</th> 
					<th style="width: 400px">Introduct</th> 
					<th style="width: 70px"><i class="fa fa-trash-o fa-fw"></i> Edit</th>		
					<th style="width: 80px"><i class="fa fa-pencil fa-fw"></i> Delete</th>			
				</tr> 
			</thead> 
			<tbody> 
				@foreach($singer as $sg)
					<tr> 
						<th scope="row">{{$sg->id_singer}}</th> 
						<td style="text-align: center; font-weight: bold;">{{$sg->name}}
							<br><br>
							<div>
								<img width="200px" src="upload/image/{{$sg->image}}">
							</div>
						</td> 
						<td>{{$sg->nickname}}</td>
						<td>{{$sg->birthday}}</td>
						<td>{{$sg->national}}</td>
						<td >
							<div class="intro">
								{{$sg->introduct}}				
							</div>
						</td>
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Singer/delSinger/{{$sg->id_singer}}">Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i><a href="admin/Singer/editSinger/{{$sg->id_singer}}">Edit</a></td>
					</tr> 
				@endforeach
			</tbody> 
		</table>
	</div>
</div>

@endsection