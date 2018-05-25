@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">User</h2>
		<div class="form-three widget-shadow">
			<h4>Edit User</h4><br>
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
					<form class="form-horizontal" method="POST" action="admin/User/editUser/{{$user->id_user}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label class="col-md-2 control-label">Name </label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" value="{{$user->name}}" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Level</label>
							<label class="radio-inline">
								<input type="radio" name="lvl" value="0" 
								@if($user->lvl == '0')
								{{'checked'}}
								@endif
								>User
							</label>
							<label class="radio-inline">
								<input type="radio" name="lvl" value="1" 
								@if($user->lvl == '1')
								{{'checked'}}
								@endif
								>Admin
							</label>
						</div>							
						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="email" class="form-control1" value="{{$user->email}}" name="email" readonly="">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Đổi mật khẩu</label>
								<label class="radio-inline">							
									<input type="checkbox" name="changePassword" id="changePassword" >
								</label>														
						</div>
						<div class="form-group" id="hiddenField" style="display: none;">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="password" class="form-control1 password" value="{{$user->password}}" name="password" disabled="">
								</div>
							</div>							
						</div>
						<div class="form-group" id="hiddenField" style="display: none;">
							<label class="col-md-2 control-label">Password Again</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="password" class="form-control1 password" value="{{$user->password}}" name="passwordAgain" disabled="">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Phone</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" value="{{$user->phone}}" name="phone">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Address</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" value="{{$user->address}}" name="address">
								</div>
							</div>
						</div>			
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div><img width="300px" src="upload/image/{{$user->image}}"></div><br>
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="file" class="form-control1" name="imageuser" >
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

@section('script')
	<script >
		$(document).ready(function () {
			$("#changePassword").change(function () {
				if($(this).is(":checked"))
				{
					$("div[id=hiddenField]").fadeIn();
					$(".password").removeAttr('disabled');
				}
				else
				{
					$("div[id=hiddenField]").fadeOut();
					$(".password").attr("disabled","");
				}
			});
		});
	</script>
@endsection