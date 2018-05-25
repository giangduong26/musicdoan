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

<!-- DataTables CSS Phân trang- -->
<link href="admin_asset/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="admin_asset/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<!-- end phân trang -->

<!-- Metis Menu -->
<script src="admin_asset/js/metisMenu.min.js"></script>
<script src="admin_asset/js/custom.js"></script>
<link href="admin_asset/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

<!-- Readmore -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="trangchu/Readmore.js/readmore.min.js"></script>
<script src="trangchu/Readmore.js/readmore.js"></script>
<!-- End readmore -->

</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">

		@include('admin.layout.header')

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				@yield('content')

				@yield('script')
				<script type="text/javascript">
					$('.intro').readmore({
				      moreLink: '<a href="#">Read more...</a>',
				      collapsedHeight: 20,
				      // blockCSS: 'display: block; width: 100%;',
				      // startOpen: true,
				    });
				    $('#intro').readmore({speed: 500});
				</script>
			</div>
		</div>
		
		<!-- end main -->

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Admin Chanel DuGiaMusic | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
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

		<script>
		    $(".alert").delay(3000).slideUp();
		</script>


	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="admin_asset/js/jquery.nicescroll.js"></script>
	<script src="admin_asset/js/scripts.js"></script>
	<!--//scrolling js-->	
	<!-- Bootstrap Core JavaScript -->
   <script src="admin_asset/js/bootstrap.js"> </script>   
   <!-- use Ckeditor -->
   <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
   
   <!-- DataTables JavaScript -->
    <script src="admin_asset/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>