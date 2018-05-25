<div class="left-side sticky-left-side">
	<!--logo and iconic logo start-->
	<div class="logo">
		<h1><a href="{{'indexx'}}">DuGia<span>MuSic</span></a></h1>
	</div>
	<div class="logo-icon text-center">
		<a href="{{'indexx'}}">M</a>
	</div>
 <!-- /w3l-agile -->
	<!--logo and iconic logo end-->
	<div class="left-side-inner">

		<!--sidebar nav start-->
			<ul class="nav nav-pills nav-stacked custom-nav">
				<li class="active"><a href="{{'indexx'}}"><i class="lnr lnr-home"></i><span>Home</span></a></li>
				<li class="menu-list"><a href="#"><i class="camera"></i> <span>Genres</span></a>
					<ul class="sub-menu-list">
						@foreach($genres as $gr)
						<li><a href="detailgenres/{{$gr->id_genres}}">{{$gr->name_genres}}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="menu-list"><a href="#"><i class="fa fa-th"></i> <span>Menu</span></a>
					<ul class="sub-menu-list">
						@foreach($menu as $mn)
						<li><a href="detailmenu/{{$mn->id_menu}}">{{$mn->name_mn}}</a></li>
						@endforeach
					</ul>
				</li>
				
				<li><a href="{{'singer'}}"><i class="lnr lnr-users"></i> <span>Artists</span></a></li> 
				<li><a href="{{'album'}}"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>						
				<li class="menu-list"><a href="browse.html"><i class="lnr lnr-indent-increase"></i> <span>Browser</span></a>  
					<ul class="sub-menu-list">
						<li><a href="{{'singer'}}">Artists</a> </li>
						<li><a href="404.html">Services</a> </li>
					</ul>
				</li>
				@if(Auth::check())
				<li class="menu-list">
					<a href="#"><i class="lnr lnr-heart"></i> <span>My Favourities</span></a> 
					<ul class="sub-menu-list">
						<li><a href="playList/{{Auth::user()->id_user}}">Play list</a></li>
					</ul>
				@endif
					<!-- <ul class="sub-menu-list">
						<li><a href="song">All Songs</a></li>
					</ul> -->
				</li>
				<li class="menu-list"><a href="contact.html"><i class="fa fa-thumb-tack"></i><span>Contact</span></a>
					<ul class="sub-menu-list">
						<li><a href="contact.html">Location</a> </li>
					</ul>
				</li>     
			</ul>
		<!--sidebar nav end-->
	</div>
</div>