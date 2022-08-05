<div class="dekstopMenu">
	<header id="header" class="transparent-header" style="position:fixed!important; top:0;">
		<div class="row">
			<div style="position: absolute;left: auto; width: 100px; height:auto;" class="ml-5 mt-2">
				<a href="{{url('/')}}"><img src="{{asset('logos/third-logo.png')}}" alt="KJM"></a>
			</div>
			<div style="position: absolute;left:1190px; width: 100px; height:auto;" class="ml-5 mt-5">
				<a href="JavaScript:void(0);" id="show"><span style="color:whitesmoke;font-weight: bold;">Menu</span></a>
			</div>
			<!-- {{-- <div style="position: absolute;left:1260px; width: 100px; height:auto;" class="ml-5 mt-5">
				<a href="JavaScript:void(0);"><span style="color:whitesmoke;font-weight: bold;"><i class="icon-user"></i></span></a>	
			</div>	 --}} -->
		</div>
	</header>

	<div id="menu">
		<div style="margin-top: -65px;">
			<img src="{{asset('logos/menu-logo.png')}}" style="width:100px;">
		</div>
		<div style="color:whitesmoke;" class="mt-4">
			<a href="{{url('/')}}" class="menu-a">Home Pages</a><br>
			<a href="{{url('what-we-do')}}" class="menu-a">What we do</a><br>
			<!-- {{-- <a href="{{url('who-we-are')}}" class="menu-a">Who we are</a><br>
			<a href="{{url('applications')}}" class="menu-a">Application</a><br> --}} -->
			<a href="{{url('boat-sales')}}" class="menu-a">Boat Sales</a><br>
			<!--<a href="{{url('products')}}" style="display:none" class="menu-a">Products</a><br>-->
			<a href="{{url('services')}}" class="menu-a">Services</a><br>
			<a href="{{url('charter')}}" class="menu-a">Charter</a><br>
			<!-- {{-- <a href="{{url('news-and-events')}}" class="menu-a">News & Events</a><br> --}} -->
			<a href="{{url('get-in-touch-with-us')}}" class="menu-a">Contact Us</a><br>
			<!-- {{-- <a href="JavaScript:void(0)" class="menu-a" data-toggle="modal" data-target="#login">Agent Login</a> --}} -->
		</div>
	</div>
</div>


<div class="mobileMenu">
	<header id="header" style="z-index:50;position: fixed; top:500; border-bottom:none!important; background: rgba(255, 255, 255, 0);width: 100%;">
		<div class="container">
			<div class="header-row">

				<div id="logo">
					<a href="{{url('/')}}" class="retina-logo" data-dark-logo="{{asset('logos/third-logo.png')}}">
						<img src="{{asset('logos/third-logo.png')}}" alt="KJM" style="width: auto; height: auto;">
					</a>
				</div>

				<div id="showMobile">
					<div style="border: 1px solid whitesmoke;width: 100%; height: 100%; border-radius: 3px;background-color: black; margin-top: -30px;">
						<center>
							<i class="icon-line-menu" style="color: whitesmoke; font-size: 35px; padding:0px 10px 0px 10px;"></i>
						</center>
					</div>
				</div>
			</div>
			<div id="menuMobile" style="display:none;">
				<div style="margin-top: -65px;">
					<img src="{{asset('logos/menu-logo.png')}}" style="width:100px;">
				</div>
				<div style="color:whitesmoke;" class="mt-4">
					<a href="{{url('/')}}" class="menu-a">Home Pages</a><br>
					<a href="{{url('what-we-do')}}" class="menu-a">What we do</a><br>
					<!-- {{-- <a href="{{url('who-we-are')}}" class="menu-a">Who we are</a><br>
					<a href="{{url('applications')}}" class="menu-a">Application</a><br> --}} -->
					<a href="{{url('boat-sales')}}" class="menu-a">Boat Sales</a><br>
					<!-- <a href="{{url('products')}}" class="menu-a">Products</a><br> -->
					<a href="{{url('services')}}" class="menu-a">Services</a><br>
					<a href="{{url('charter')}}" class="menu-a">Charter</a><br>
					<!-- {{-- <a href="{{url('news-and-events')}}" class="menu-a">News & Events</a><br> --}}
					<a href="{{url('get-in-touch-with-us')}}" class="menu-a">Contact Us</a><br>
					{{-- <a href="JavaScript:void(0)" class="menu-a" data-toggle="modal" data-target="#login">Agent Login</a> --}}
				</div> -->
				</div>
			</div>

			<div class="header-wrap-clone"></div>
	</header>
</div>