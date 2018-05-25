<div class="clearfix"></div>
<div class="review-slider">
	<div class="tittle-head">
		<h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
		<div class="clearfix"> </div>
	</div>
	<ul id="flexiselDemo1">
		@foreach($album as $al)
		<li>
			<a href="detailAlbum/{{$al['id_album']}}">
				<img src="upload/image_video/{{$al->image}}" width="257px" height="257px" alt=""/>
			</a>
			<div class="slide-title"><h4>{{$al->name}}</div>
			<div class="date-city">
				<h5>{{$al->year_release}}</h5>
				<div class="buy-tickets">
					<a href="detailAlbum/{{$al['id_album']}}">READ MORE</a>
				</div>
			</div>
		</li>
		@endforeach
		<!-- <li>
			<a href="single.html"><img src="trangchu/images/v2.jpg" alt=""/></a>
			<div class="slide-title"><h4>Adele21</h4></div>
			<div class="date-city">
				<h5>Jan-02-16</h5>
				<div class="buy-tickets">
					<a href="single.html">READ MORE</a>
				</div>
			</div>
		</li> -->
	</ul>
		<script type="text/javascript">
			$(window).load(function() {

				$("#flexiselDemo1").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: false,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 2
						}, 
						landscape: { 
							changePoint:640,
							visibleItems: 3
						},
						tablet: { 
							changePoint:800,
							visibleItems: 4
						}
					}
				});
			});
		</script>
		<script type="text/javascript" src="trangchu/js/jquery.flexisel.js"></script>	
	</div>
</div>