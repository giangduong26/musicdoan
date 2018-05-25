@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Song</h2>
		<div class="form-three widget-shadow">
			<h4>Add Song</h4><br>
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
					<form class="form-horizontal" method="POST" action="admin/Song/addSong" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label class="col-md-2 control-label">Type</label>
							<label class="radio-inline">
								<input type="radio" name="type" value="0" checked="">Mp3
							</label>
							<label class="radio-inline">
								<input type="radio" name="type" value="1" >Mp4
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Name Song</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Name Song" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Slug name</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Slug_name" name="slug_name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Menu</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<select class="form-control1" name="menu">
										<option>Please choose Menu</option>
										@foreach($menu as $mn)
										<option value="{{$mn->id_menu}}">{{$mn->name_mn}}</option>
										@endforeach
									</select>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Genres</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<select class="form-control1" name="genres">
										<option>Please choose Genres</option>
										@foreach($genres as $gr)
										<option value="{{$gr->id_genres}}">{{$gr->name_genres}}</option>
										@endforeach
									</select>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Album</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<select class="form-control1" name="album">
										<option>Please choose Album</option>
										@foreach($album as $al)
										<option value="{{$al->id_album}}">{{$al->name}}</option>
										@endforeach
									</select>
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">View</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="View" name="view">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">View Count Week</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Viewcountweek" name="viewcountweek">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Creator</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-key"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="Creator" name="creator">
								</div>
							</div>							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">National</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" placeholder="National" name="national">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Lyric</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<!-- <span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span> -->
									<!-- <input type="text" id="text" class="form-control1" placeholder="Lyric" name="lyric"> -->
									<textarea id="demo" class="form-control1 ckeditor" name="lyric" rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Status</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" id="text" class="form-control1" placeholder="Status" name="status">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="file" class="form-control1" name="image" >
								</div>
							</div>
						</div>
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