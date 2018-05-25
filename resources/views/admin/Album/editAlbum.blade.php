@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Album</h2>
		<div class="form-three widget-shadow">
			<h4>Edit Album</h4><br>
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
					<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="admin/Album/editAlbum/{{$album->id_album}}">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}"/>
						<div class="form-group">
							<label class="col-md-2 control-label">Name Album</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" name="name" value="{{$album->name}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Year Release</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" name="year" value="{{$album->year_release}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Singer</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<select class="form-control1" name="singer">
										@foreach($singer as $sg)
										<option 
										@if($album->singer->id_singer == $sg->id_singer)
											{{"selected"}}
										@endif
										value="{{$sg->id_singer}}">{{$sg->name}}
										</option>
										@endforeach
									</select>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Hot</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" name="hot" value="{{$album->hot}}">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div><img width="300px" src="upload/image_video/{{$album->image}}"></div><br>
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="file" class="form-control1" name="imagealbum">
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
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection