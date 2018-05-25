@extends('layout.index')

@section('content')
<div class="clearfix"></div>
</div>

<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">

<link href="trangchu/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">


<!--//music-left -->
	<div class="tittle-head">
		<h1 class="tittle" style="text-align: center;">Profile  <span class=""></span></h1>
		<div class="clearfix"></div>
	</div>
	<br><br><br>
	<div class="jp-type-playlist">	
		<div id="small-dialog" class="mfp-hide">
			<img src="" width="600">
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="forms">
	<div class="row">
		<div class="form-three widget-shadow">
			<div class=" panel-body-inputin">	
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
					</div>
				@endif		
				@if(session('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
				@endif
				<form class="form-horizontal" method="POST" action="proFile/{{$user->id_user}}" enctype="multipart/form-data">
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
						<label class="col-md-2 control-label">Email</label>
						<div class="col-md-8">
							<div class="input-group input-icon right">
								<span class="input-group-addon">
									<!-- <i class="fa fa-envelope-o"></i> -->
								</span>
								<input type="email" class="form-control1" value="{{$user->email}}" name="email">
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
						<label class="col-md-2 control-label"></label>
						<div class="col-md-8">
							<div class="input-group input-icon right">
								<button type="submit" class="btn btn-success"> Update</button>
							</div>
						</div>							
					</div>
				</form>
			</div>
		</div>
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