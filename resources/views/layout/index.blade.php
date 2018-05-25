<!DOCTYPE HTML>
<html>
<head>
<title>DuGia Music</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="trangchu/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="trangchu/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="trangchu/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->

<!-- lined-icons -->
<link rel="stylesheet" href="trangchu/css/icon-font.css" type='text/css' />
<!-- //lined-icons -->
 <!-- Meters graphs -->
<script src="trangchu/js/jquery-2.1.4.js"></script>

<!-- DataTables CSS Phân trang- -->
<link href="trangchu/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="trangchu/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<!-- end phân trang -->

<!-- Readmore -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="trangchu/Readmore.js/readmore.min.js"></script>
<script src="trangchu/Readmore.js/readmore.js"></script>
<!-- End readmore -->


</head> 
    	 <!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
    <!-- <section> -->
      <!-- left side start-->
		@include('layout.header')

		@include('layout.search-play')

		@yield('content')

		@include('layout.rightMusic')

		@include('layout.featureAlbum')

		@include('layout.footer')

    @yield('script')
        <!--footer section end-->
 	 <!-- /w3l-agile -->
      <!-- main content end-->
   <!-- </section> -->
  
	<script src="trangchu/js/jquery.nicescroll.js"></script>
	<script src="trangchu/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="trangchu/js/bootstrap.js"></script>
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->

  <!-- add js new -->

  <!-- end add js -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    
	
</body>
</html>