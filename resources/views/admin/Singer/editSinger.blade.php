@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Singer</h2>
		<div class="form-three widget-shadow">
			<h4>Edit Singer</h4><br>
				<div class=" panel-body-inputin">	
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}<br>
							@endforeach
						</div>
					@endif		
					@if(session('loi'))
						<div class="alert alert-success">
							{{session('loi')}}
						</div>
					@endif
					<form class="form-horizontal" method="POST" action="admin/Singer/editSinger/{{$singer->id_singer}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="form-group">
							<label class="col-md-2 control-label">Name Singer</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" name="name" value="{{$singer->name}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nick name</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" name="nickname" value="{{$singer->nickname}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Birthday</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" name="birthday" value="{{$singer->birthday}}">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">National</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" name="national" value="{{$singer->national}}">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Introduct</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<textarea id="demo" class="form-control1 ckeditor" name="introduct">{{$singer->introduct}}</textarea>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div><img width="300px" src="upload/image/{{$singer->image}}"></div><br>
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="file" class="form-control1" name="imagesinger">
								</div>
							</div>							
						</div>

						
						
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<button type="submit" class="btn btn-default"> Edit</button>
								</div>
							</div>							
						</div>
					</form>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection