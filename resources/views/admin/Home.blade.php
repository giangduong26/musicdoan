<!DOCTYPE HTML>
<html>
<head>
<title>Admin Channel</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="admin_asset/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="admin_asset/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="admin_asset/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='admin_asset/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="admin_asset/js/jquery-1.11.1.min.js"></script>
<script src="admin_asset/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="admin_asset///fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="admin_asset/js/metisMenu.min.js"></script>
<script src="admin_asset/js/custom.js"></script>
<link href="admin_asset/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">

		@include('admin.layout.header')

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Welcome to Admin Chanel -- DuGiaMusic</h2>				
			</div>
		</div>
		
		<!-- end main -->

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Admin page DuGiaMuSic | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   	</div>
        <!--//footer-->
	</div>


	
	<!-- side nav js -->
	<script src='admin_asset/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="admin_asset/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="admin_asset/js/jquery.nicescroll.js"></script>
	<script src="admin_asset/js/scripts.js"></script>
	<!--//scrolling js-->	
	<!-- Bootstrap Core JavaScript -->
   <script src="admin_asset/js/bootstrap.js"> </script>   
</body>
</html>