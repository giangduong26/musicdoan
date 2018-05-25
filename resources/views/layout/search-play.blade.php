
<div class="main-content">
	<!-- header-starts -->
	<div class="header-section">
		<!--toggle button start-->
		<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
		<!--toggle button end-->
		<!--notification menu start -->
		<div class="menu-right">
			<div class="profile_details">		
				<div class="col-md-4 serch-part">
					<div id="sb-search" class="sb-search">
						<form action="search" method="get">
							<input class="sb-search-input" placeholder="Search..." type="search" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"> </span>    
						</form>
					</div>                 
				</div>                 
				<!-- search-scripts -->
				<script src="trangchu/js/classie.js"></script>                 
				<script	src="trangchu/js/uisearch.js"></script>                 
				<script>
					new UISearch( document.getElementById( 'sb-search' ) );
				</script>                
				<!-- //search-scripts -->                 
				<!---->
				<div class="col-md-4 player">                     
					<div class="audio-player">
						<!-- chạy nhạc ở đây -->						
						<audio id="audio-player"  controls="controls" autoplay="autoplay">
							@if(isset($showw))
								<source src="upload/file/{{$showw->path}}" type="audio/ogg"></source>
							@endif

							@if(isset($show))
								<source src="upload/file/{{$show[0]->path}}" type="audio/ogg"></source>
							@endif
							
							@if(isset($rlist))
								<source src="upload/file/{{$rlist[0]->path}}" type="audio/ogg"></source>
							@endif

							@if(isset($listensongsearch))
								<source src="upload/file/{{$listensongsearch[0]->path}}" type="audio/ogg"></source>
							@endif

							@if(isset($showsongalbum))
								<source src="upload/file/{{$showsongalbum[0]->path}}" type="audio/ogg"></source>
							@endif
							
							@if(isset($postplayList))
								<source src="upload/file/{{$postplayList[0]->path}}" type="audio/ogg"></source>
							@else
								<source src="upload/file/" type="audio/ogg"></source>
							@endif	
						</audio>			
					</div>                       
					<!---->                        
					<script type="text/javascript"> 
						$(function(){ $('#audio-player').mediaelementplayer({
						alwaysShowControls: true,
						features:['playpause','progress','volume'],
						audioVolume: 'horizontal',
						iPadUseNativeControls: true,
						iPhoneUseNativeControls: true,
						AndroidUseNativeControls: true 
						});
					});                        
					</script>  					                       
			<!--audio-->
			<link rel="stylesheet" type="text/css" media="all" href="trangchu/css/audio.css">
			<script type="text/javascript" src="trangchu/js/mediaelement-and-player.min.js"></script>                       
			<!---->

			<!--//-->
			<!-- chức năng next của trang web -->
			<ul class="next-top">
				<li><a class="ar" href="#"> <img src="trangchu/images/arrow.png" alt=""/></a></li>
				<li><a class="ar2" href="#"><img src="trangchu/images/arrow2.png" alt=""/></i></a></li>				
			</ul>
		</div>

		<div class="col-md-4 login-pop">
			<div id="loginpop"> 
			@if(Auth::check())
				<a href="#" id="loginButton">
					<span>{{Auth::user()->name}} <i class="arrow glyphicon glyphicon-chevron-right"></i></span>
				</a>
				<a class="top-sign" href="logout" data-toggle="" data-target="" title="Log out" onclick="return confirm('Are you sure you want to log out!?')"><i class="fa fa-sign-in"></i></a>
				<div id="loginBox">
					<div action="" id="loginForm">
						<fieldset id="body">
							<fieldset>
								<label style="text-align: center; font-size: 30px; font-weight: bold;"><a href="proFile/{{Auth::user()->id_user}}">Profile</a></label>
							</fieldset>
							<fieldset>
								<label for="email">Name: {{Auth::user()->name}}</label>
							</fieldset>
							<fieldset>
								<label>Mail: {{Auth::user()->email}}</label>
							</fieldset>
						</fieldset>
						<span><a href="playList/{{Auth::user()->id_user}}">List song favourite</a></span>
					</div>
				</div>					
			@else
				<a href="#" id="loginButton">
					<span>Login <i class="arrow glyphicon glyphicon-chevron-right"></i></span>
				</a>
				<a type="hidden" class="top-sign" href="#" data-toggle="modal" data-target="#myModal5">
					<!-- <i class="fa fa-sign-in"></i>						 -->
				</a>	
				<div id="loginBox">					
						@if(count($errors)>0)
						<div class="alert alert-danger">
						@foreach($errors->all() as $err)
							{{$err}}<br>
						@endforeach
						</div> 
						@endif
						@if(session('loi'))
							<div class="alert alert-danger">
								{{session('loi')}}
							</div>
						@endif 												
					<form action="login" method="post" id="loginForm">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<fieldset id="body">
							<fieldset>
								<label for="email">Email Address</label>
								<input type="text" name="email" id="email">
							</fieldset>
							<fieldset>
								<label for="password">Password</label>
								<input type="password" name="password" id="password">
							</fieldset>
							<input type="submit" id="login" value="Sign in" >
							<label for="checkbox"><input type="checkbox" id="checkbox"><i>Remember me</i></label>
						</fieldset>	
						<span><a href="createacc" >Create account</a></span>					
					</form>

				</div>				
			@endif	
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-------->
</div>
@section('script')
<script>
    $(".alert").delay(3000).slideUp();
</script>
@endsection