@extends('admin.layout.index')

@section('content')
<div class="forms">
	<div class="row">
		<h2 class="title1">Song</h2>
		<div class="form-three widget-shadow">
			<h4>Edit Song</h4><br>
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
					@if(session('thongbao'))
						<div class="alert alert-success">
							{{session('thongbao')}}
						</div>
					@endif
					<form class="form-horizontal" method="POST" action="admin/Song/editSong/{{$song->id_song}}" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label class="col-md-2 control-label">Type</label>
							<label class="radio-inline">
								<input type="radio" name="type" value="0" 
								@if($song->type == '0')
								{{'checked'}}
								@endif
								>Mp3
							</label>
							<label class="radio-inline">
								<input type="radio" name="type" value="1" 
								@if($song->type == '1')
								{{'checked'}}
								@endif
								>Mp4
							</label>
						</div>	
						<div class="form-group">
							<label class="col-md-2 control-label">Name Song</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<!-- <i class="fa fa-envelope-o"></i> -->
									</span>
									<input type="text" class="form-control1" value="{{$song->name_song}}" name="name">
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
									<input type="text" class="form-control1" value="{{$song->slug_name}}" name="slug_name">
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
										<!-- <option>Please choose Menu</option> -->
										@foreach($menu as $mn)
											<option 
											@if($song->menu->id_menu == $mn->id_menu) 
											{{"selected"}}
											@endif
											value="{{$mn->id_menu}}">{{$mn->name_mn}}
											</option>
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
										<!-- <option>Please choose Genres</option> -->
										@foreach($genres as $gr)										
											<option 
											@if($song->genres->id_genres == $gr->id_genres) 
											{{"selected"}}
											@endif
											value="{{$gr->id_genres}}">{{$gr->name_genres}}
											</option>
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
										<!-- <option>Please choose Album</option> -->
										@foreach($album as $al)
											<option 
											@if($song->album->id_album == $al->id_album) 
											{{"selected"}}
											@endif
											value="{{$al->id_album}}">{{$al->name}}
											</option>
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
									<input type="text" class="form-control1" value="{{$song->view}}" name="view">
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
									<input type="text" class="form-control1" value="{{$song->viewcountweek}}" name="viewcountweek">
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
									<input type="text" class="form-control1" value="{{$song->creator}}" name="creator">
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
									<input type="text" class="form-control1" value="{{$song->national}}" name="national">
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
									<textarea id="demo" class="form-control1 ckeditor" name="lyric">{{$song->lyric}}</textarea>
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
									<input type="text" id="text" class="form-control1" value="{{$song->status}}" name="status">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image</label>
							<div class="col-md-8">
								<div><img width="300px" src="upload/image_video/{{$song->path_image}}"></div><br>
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
									<button type="submit" class="btn btn-default"> Edit</button>
								</div>
							</div>							
						</div>
					</form>
				</div>
			</form>
		</div>
	</div>


	<div class="row">
		<h2 class="title1">List Comment</h2>
		<div class="form-three widget-shadow" data-example-id="hoverable-table"> 
			<h4>List Comment</h4> <br>
			<table class="table table-hover"> 
				<thead> 
					<tr> 
						<th>ID</th> 
						<th>User</th> 
						<th>Song</th> 
						<th>Content</th> 
						<th>Count comment</th>
						<th>Create At</th>
						<th><i class="fa fa-pencil fa-fw"></i> Delete</th>
					</tr> 
				</thead> 
				<tbody> 
					@foreach($song->comment as $cm)
					<tr>
						<th scope="row">{{$cm->id_comment}}</th> 
						<td>{{$cm->user->name}}</td> 
						<td>{{$cm->song->name_song}}</td> 
						<td>{{$cm->content}}</td> 
						<td>{{$cm->count_comment}}</td>
						<td>{{$cm->created_at}}</td>
						<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/User_comment/delComment/{{$cm->id_comment}}/{{$song->id_song}}">Delete</a></td>
					</tr> 
					@endforeach() 
				</tbody> 
			</table>
		</div>
	</div>
</div>
@endsection