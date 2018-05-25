<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <!--left-fixed -navigation-->
  <aside class="sidebar-left">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <h1><a class="navbar-brand" href="{{'home'}}"><span class="fa fa-youtube-play"></span> DuGia<span class="dashboard_text">Admin Chanel</span></a></h1>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="sidebar-menu">
          <li class="header" style="color: white;">MAIN NAVIGATION</li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>Album</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Album/listAlbum"><i class="fa fa-angle-right"></i> List Album</a></li>
              <li><a href="admin/Album/addAlbum"><i class="fa fa-angle-right"></i> Add Album</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Genres</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Genres/listGenres"><i class="fa fa-angle-right"></i> List Genres</a></li>
              <li><a href="admin/Genres/addGenres"><i class="fa fa-angle-right"></i> Add Genres</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Menu</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Menu/listMenu"><i class="fa fa-angle-right"></i> List Menu</a></li>
              <li><a href="admin/Menu/addMenu"><i class="fa fa-angle-right"></i> Add Menu</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-male"></i> <span>Singer</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Singer/listSinger"><i class="fa fa-angle-right"></i> List Singer</a></li>
              <li><a href="admin/Singer/addSinger"><i class="fa fa-angle-right"></i> Add Singer</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-music"></i> <span>Song</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Song/listSong"><i class="fa fa-angle-right"></i> List Song</a></li>
              <li><a href="admin/Song/addSong"><i class="fa fa-angle-right"></i> Add Song</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-music"></i> <span>Singer Show</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/Singer_show/listShow"><i class="fa fa-angle-right"></i> List Show</a></li>
              <li><a href="admin/Singer_show/addShow"><i class="fa fa-angle-right"></i> Add Show</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>User</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="admin/User/listUser"><i class="fa fa-angle-right"></i> List User</a></li>
              <li><a href="admin/User/addUser"><i class="fa fa-angle-right"></i> Add User</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i> <span>Mailbox</span>
              <i class="fa fa-angle-left pull-right"></i><small class="label pull-right label-info1">08</small><span class="label label-primary1 pull-right">02</span></a>
              <ul class="treeview-menu">
                <li><a href="inbox.html"><i class="fa fa-angle-right"></i> Mail Inbox</a></li>
                <li><a href="compose.html"><i class="fa fa-angle-right"></i> Compose Mail </a></li>
              </ul>
            </li>                        
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>
    </aside>
  </div>
  <!--left-fixed -navigation-->

  <!-- header-starts -->
  <div class="sticky-header header-section ">
   <div class="header-left">

    <!--toggle button start-->
    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    <!--toggle button end-->

    <!--notification menu end -->
    <div class="clearfix"> </div>
  </div>
  <div class="header-right">				

    <!--search-box-->
				<!-- <div class="search-box">
					<form class="input">
						<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" />
						<label class="input__label" for="input-31">
							<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
								<path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
							</svg>
						</label>
					</form>
				</div> -->
				<!--//end-search-box-->
				{{csrf_field()}}
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
                  @if(Auth::check())
									<span class="prfil-img"><img src="upload/image/{{Auth::user()->image}}" alt="" width="50" height="50"> </span> 
									<div class="user-name">                    
										<p >{{Auth::user()->name}}</p>
										<span>Administrator</span>                    
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li><a href="indexx"><i class=""></i>--o0o--DuGiaMusic--o0o--</a> </li>
								<li><a href="admin/User/profileuser/{{Auth::user()->id_user}}"><i class="fa fa-suitcase"></i> Profile</a></li>
                @endif
								<li> <a href="admin/login"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->