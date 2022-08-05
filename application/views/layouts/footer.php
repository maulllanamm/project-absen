<div class="footerDekstop">
	<div style="width: 100%; background-color:white; height: 10px;"></div>
	<footer id="footer" class="dark border-top-0" style="background-color: #0f7889;">
		<div class="container">
			<div class="footer-widgets-wrap" style="height:300px!important;">
				<div class="row clearfix">
					<div class="col-2">
						<div>
							<img src="{{asset('logos/footer-logo.png')}}">
						</div>
					</div>

					<div class="col-3">
						<div class="row">
							<div class="col-6">
								<ul style="list-style-type: none;">
									<li><a href="{{url('/')}}">Home Page</a></li>
									<li><a href="{{url('what-we-do')}}">What we do</a></li>
{{-- 									<li><a href="{{url('news')}}">Who we are</a></li>
									<li><a href="{{url('events')}}">Application</a></li> --}}
									<li><a href="{{ url('boat-sales') }}">Boat Sales</a></li>
									<li><a href="{{url('products')}}">Products</a></li>
								</ul>
							</div>
							<div class="col-6">
								<ul style="list-style-type: none;">
									<li><a href="{{url('services')}}">Services</a></li>
									<li><a href="{{url('charter')}}">Charter</a></li>
	{{-- 								<li><a href="{{url('news')}}">News & Events</a></li>
									<li><a href="{{url('events')}}">Agent login</a></li> --}}
									<li><a href="{{ url('get-in-touch-with-us') }}">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-3">
						<address>
							<span style="font-size: 16px; font-family: DIN-Light; color: whitesmoke;">
								KJM Marine LLC Bldg OP 01<br> 
								Al Quoz Industrial Fourth, Dubai, UAE<br>
								<a href="tel:+9714398333" target="_blank">+971 4 2983333</a><br>
								<a href="mailto:info@kjm.ae" target="_blank">info@kjm.ae</a><br>
								<a href="https://kjm.ae" target="_blank">www.kjm.ae</a>
								
							</span>
						</address>
					</div>

					<div class="col-4">
						<div class="mb-3">Sign up to receive news and special offers:</em></div>
{{-- 						<form action="{{ url('/subscription/email/submit') }}" method="post">@csrf --}}
							<form method="POST">@csrf
							<div class="row">
								<div class="col-md-12" style="margin-bottom:10px;">
									<input type="email" name="email_subscription" class="footer-input form-control btn btn-success" placeholder="Enter your Email" style="border-radius:10px; border: solid 1px white;">
								</div><br>
								<div class="col-md-12" style="margin-bottom:10px;">
									<button class="btn btn-outline-secondary btn-block" type="button" style="border-radius:10px; border:solid 1px whitesmoke; color:whitesmoke!important; text-align:left!important;">Submit</button>
								</div>
								<div class="col-12 mt-3">
									<a href="https://www.instagram.com/schaeferyachtsgcc/" target="blank" class="social-icon si-rounded si-small si-linkedin">
										<i class="icon-linkedin"></i>
										<i class="icon-linkedin"></i>
									</a>
									<a href="https://www.instagram.com/schaeferyachtsgcc/" target="blank" class="social-icon si-rounded si-small si-instagram">
										<i class="icon-instagram"></i>
										<i class="icon-instagram"></i>
									</a>
									<a href="https://www.facebook.com/Schaefer-Yachts-GCC-101437748913614/" target="blank" class="social-icon si-rounded si-small si-facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>		
								</div>
							</div>
						</form>
					</div>
					{{-- <div class="w-100 line"></div> --}}
				</div>
			</div>
		</div>
	</footer>
</div>

<div class="footerMobile">
	<div style="width: 100%; background-color:white; height: 10px;"></div>
	<footer id="footer" class="dark border-top-0" style="background-color: #0f7889; height: 100%;">
		<div class="container-fluid">
			<div class="footer-widgets-wrap" style="height:100%!important;">
				<div class="row clearfix">
					<div class="col-12">
						<center><img src="{{asset('logos/footer-logo.png')}}" style="width:50%; height: 50%;"></center>
					</div>
					<div class="col-12">
						<div class="row">
							<div class="col-4 ml-5">
								<ul style="list-style-type: none;">
									<li><a href="{{url('/')}}">Home Page</a></li>
									<li><a href="{{url('what-we-do')}}">What we do</a></li>
{{-- 									<li><a href="{{url('news')}}">Who we are</a></li>
									<li><a href="{{url('events')}}">Application</a></li> --}}
									<li><a href="{{ url('boat-sales') }}">Boat Sales</a></li>
									<li><a href="{{url('products')}}">Products</a></li>
								</ul>
							</div>
							<div class="col-4 ml-5">
								<ul style="list-style-type: none;">
									<li><a href="{{url('services')}}">Services</a></li>
									<li><a href="{{url('charter')}}">Charter</a></li>
{{-- 									<li><a href="{{url('news')}}">News & Events</a></li>
									<li><a href="{{url('events')}}">Agent login</a></li> --}}
									<li><a href="{{ url('get-in-touch-with-us') }}">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>
					

					<div class="col-12">
						<center>
							<address>
								<span style="font-size: 16px; font-family: DIN-Light; color: whitesmoke;">
									KJM Marine LLC Bldg OP 01<br> 
									Al Quoz Industrial Fourth, Dubai, UAE<br>
									<a href="tel:+9714398333" target="_blank">+971 4 2983333</a><br>
									<a href="mailto:info@kjm.ae" target="_blank">info@kjm.ae</a><br>
									<a href="https://kjm.ae" target="_blank">www.kjm.ae</a>
									
								</span>
							</address>
						</center>
					</div>

					<div class="col-12">
						<center>
							<div class="mb-3">Sign up to receive news and special offers:</em></div>
							{{-- <form action="{{ url('/subscription/email/submit') }}" method="post">@csrf --}}
								<form method="POST">@csrf
								<div class="row">
									<div class="col-md-12" style="margin-bottom:10px;">
										<input type="email" name="email_subscription" class="footer-input form-control btn btn-success" placeholder="Enter your Email" style="border-radius:10px; border: solid 1px white; text-align: left!important;">
									</div><br>
									<div class="col-md-12" style="margin-bottom:10px;">
										<button class="btn btn-outline-secondary btn-block" type="button" style="border-radius:10px; border:solid 1px whitesmoke; color:whitesmoke!important; text-align:left!important;">Submit</button>
									</div>
								</div>
							</form>
						</center>
					</div>

					<div class="col-12">
						<div style="margin-left: 30%;">
							<a href="https://www.instagram.com/schaeferyachtsgcc/" target="blank" class="social-icon si-rounded si-small si-linkedin mr-4">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
							<a href="https://www.instagram.com/schaeferyachtsgcc/" target="blank" class="social-icon si-rounded si-small si-instagram mr-4">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>
							<a href="https://www.facebook.com/Schaefer-Yachts-GCC-101437748913614/" target="blank" class="social-icon si-rounded si-small si-facebook mr-4">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>		
						</div>
					</div>

					{{-- <div class="w-100 line"></div> --}}
				</div>
			</div>
		</div>
	</footer>
</div>