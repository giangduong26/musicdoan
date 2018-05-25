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
<body class="sticky-header left-side-collapsed"  onload="initMap()">

  @include('layout.header')

  @include('layout.search-play')

  <div class="clearfix"></div>
</div>
<div id="page-wrapper" style="height: auto; background-color: black;">
  <div class="inner-content">
    <div class="audio-player">

      <!-- chạy nhạc ở đây -->            
      <div align="center">            

        <video id="audio-player"  controls="controls" autoplay="autoplay " width="840" height="480">
          <source src="upload/file/{{$playvideo->path}}" type="video/mp4"></source>
        </video>
        <br>
        <div align="left"> 
          <h2 style="color: white; margin-left: 350px;"><b>{{$playvideo->song->name_song}}</b> - {{$playvideo->singer->name}} 
          </h2><hr>
          <h4 style="color: white; margin-left: 350px;"><b>Genres</b>: {{$playvideo->song->genres->name_genres}} - <span>View: {{$playvideo->song->view}}</span></h4>
          <div style="color: white; margin-left: 350px;">
            <div style="float: left;">
              <div id="intro" style="height: auto; width: 500px;">
                Lyric: <br>{{$playvideo->song->lyric}}<br>       
              </div>      
            </div>
          </div>
        </div>            
      </div>
    </div>  
  </div>
 <div class="clearfix"></div>
</div>
@if(Auth::check())
<div class="well">
  <h4>Comment...<span class="glyphicon glyphicon-pencil"></span></h4>
  <form action="comment/{{$playvideo->song->id_song}}" method="POST" >
    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <textarea class="form-control" rows="3" name="cmt"></textarea><br>
      <button type="submit" class="btn btn-primary"> Send</button>
    </div>
  </form>
</div> 
@endif

<div class="well">
  @foreach($comment as $lcmt)
  <div class="media">
    <a href="#" class="pull-left">
      <img src="http://placehold.it/64x64" class="media-object" alt="LoadImageFail">
    </a>
    <div class="media-body">
      <h4 class="media-heading">{{$lcmt->user->name}}
        <small>{{$lcmt->created_at->format('d/m/Y - H:i:A')}}</small>
      </h4>
      {{$lcmt->content}}
    </div>
  </div>
  @endforeach
</div>
@include('layout.footer')


<script src="trangchu/js/jquery.nicescroll.js"></script>
<script src="trangchu/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="trangchu/js/bootstrap.js"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $('#intro').readmore({
    moreLink: '<a href="#">Read more</a>',
    collapsedHeight: 25,
  });

  $('article').readmore({speed: 500});
</script>
@yield('script')
</body>
</html>
