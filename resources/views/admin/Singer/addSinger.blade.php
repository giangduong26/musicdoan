@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Singer</h2>
		<div class="form-three widget-shadow">
			<h4>Add Singer</h4><br>
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
					<form class="form-horizontal" method="POST" action="admin/Singer/addSinger" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label class="col-md-2 control-label">Name Singer</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Name Singer" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Nick Name</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Nick Name" name="nickname">
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
									<input type="text" class="form-control1" placeholder="Birthday" name="birthday">
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
									<input type="text" class="form-control1" placeholder="National" name="national">
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
									<textarea id="demo" class="form-control1 ckeditor" name="introduct"></textarea>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="file" class="form-control1" name="imagesinger">
								</div>
							</div>							
						</div>
						<!-- <div class="form-group has-success">
							<label class="col-md-2 control-label">Created At</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon"> -->
										<!-- <i class="fa fa-envelope-o"></i> -->
									<!-- </span>
									<input id="text" class="form-control1" type="text" name="create">
								</div>
							</div>
						</div>
						<div class="form-group has-error">
							<label class="col-md-2 control-label">Updated At</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon"> -->
										<!-- <i class="fa fa-key"></i> -->
								<!-- 	</span>
									<input type="text" class="form-control1" name="update">
								</div>
							</div>							
						</div> -->
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<button type="submit" class="btn btn-default"> ADD</button>
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