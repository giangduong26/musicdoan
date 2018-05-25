@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Menu</h2>
		<div class="form-three widget-shadow">
			<h4>Edit Menu</h4><br>
				<div class=" panel-body-inputin">	
					@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
								{{$err}}<br>
							@endforeach
						</div>
					@endif		
					<form class="form-horizontal" method="POST" action="admin/Menu/editMenu/{{$menu->id_menu}}">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label class="col-md-2 control-label">Name Menu</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" name="name" value="{{$menu->name_mn}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label"></label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<button type="submit" class="btn btn-default"> Edit</button>
									<span>|</span>
									<button type="reset" class="btn btn-default"> Back</button>
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