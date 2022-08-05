<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="Iman Setiawan" content="Unzypsoftware" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('canvas/css/components/datepicker.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/components/timepicker.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('canvas/css/components/daterangepicker.css')}}" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


	<link rel="stylesheet" type="text/css" href="{{asset('mt/assets/toastr/toastr.min.css')}}">

	<link rel="stylesheet" href="{{asset('canvas/css/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ mix('/mt/assets/css/custom-v1.css') }}" type="text/css" />
    <link rel="icon" href="{{asset('sch-asset/images/footer-logo.png')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    @yield('css')
    
	<!-- Document Title
	============================================= -->
	<title>KJM</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		@include('layouts/header')
		@yield('css')
		<div id="hilang">
			@yield('content')	
		</div>
		
		@include('layouts/footer')
		

	<!-- JavaScripts
	============================================= -->
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/jquery.js')}}"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/plugins.min.js')}}"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/components/moment.js')}}"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/components/timepicker.js')}}"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/components/datepicker.js')}}"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('canvas/js/components/daterangepicker.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script rel="javascript" type="text/javascript" src="{{asset('mt/assets/toastr/toastr.min.js')}}"></script>
	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('canvas/js/functions.js')}}"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
		  // Begin :: dekstop
		  $("#show").click(function(){
		    $("#menu").show("1000");
		  });
		  
		  $("#menu").click(function(){
		    $("#menu").hide();
		  });
		  
		  $("#hilang").click(function(){
		    $("#menu").hide("1000");
		  });

		  // End :: Dekstop

		  // Begin :: Mobile
		  $("#showMobile").click(function(){
		    $("#menuMobile").show("1000");
		  });
		  
		  $("#menuMobile").click(function(){
		    $("#menuMobile").hide();
		  });

		  $("#hilang").click(function(){
		    $("#menuMobile").hide("1000");
		  });
		
		});

		// function myFunction() {
		//   var x = document.getElementById("menu");
		//   if (x.style.display === "none") {
		//     x.style.display = "block";
		//   } else {
		//     x.style.display = "none";
		//   }
		// }

		function ShowModal(id) {
        $.ajax({
            url: "{{ url('products/show/') }}/" + id,
            type: 'GET',
            success: function(data) {
                console.log(data);
                $('#product_id').val(data.id);
                $('#product_name').val(data.product_name);
                $('#ModalProducts').modal('show');
            },
            error: function(error) {
                console.log(error);
            }
        });


        console.log(id);
    }

    function sendProducts() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#ModalProducts").modal('hide');
            var id = $('#product_id').val();

            var products = new FormData();
            products.append('_token', '{{ csrf_token() }}');
            products.append('product_name', $('#product_name').val());
            products.append('qty', $('#qty').val());
            products.append('name', $('#name').val());
            products.append('phone_number', $('#phone_number').val());
            products.append('email', $('#email').val());
            products.append('remarks', $('#remarks').val());
            products.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('/send-products') }}",
                type: 'POST',
                data: products,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    toastr.success("The Request Products has been Send successfully !");

                },
                error: function(error) {
                    console.log(error);
                    toastr.warning("Request Products failed to Send !");
                }
            });

        }


        function ShowCharter() {
            $('#ModalCharter').modal('show');
    	}


    	function sendBoats() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#boats").modal('hide');

            var boats = new FormData();
            boats.append('_token', '{{ csrf_token() }}');
            boats.append('start_date', $('#start_date').val());
            boats.append('end_date', $('#end_date').val());
            boats.append('number_of_people', $('#number_of_people').val());
            boats.append('name_boats', $('#name_boats').val());
            boats.append('phone_number_boats', $('#phone_number_boats').val());
            boats.append('email_boats', $('#email_boats').val());
            boats.append('remarks_boats', $('#remarks_boats').val());
            boats.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('/charter/send-boats') }}",
                type: 'POST',
                data: boats,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $("#form-charter-boats")[0].reset();
                    toastr.success("The Charter Boats has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Charter Boats failed to Send !");
                }
            });

        }


        function sendJetski() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#jetski").modal('hide');

            var jetski = new FormData();
            jetski.append('_token', '{{ csrf_token() }}');
            jetski.append('date', $('#date').val());
            jetski.append('time', $('#time').val());
            jetski.append('name_jetski', $('#name_jetski').val());
            jetski.append('phone_number_jetski', $('#phone_number_jetski').val());
            jetski.append('email_jetski', $('#email_jetski').val());
            jetski.append('remarks_jetski', $('#remarks_jetski').val());
            jetski.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('/charter/send-jetski') }}",
                type: 'POST',
                data: jetski,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $("#form-charter-jetski")[0].reset();
                    toastr.success("The Charter Boats has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Charter Boats failed to Send !");
                }
            });

        }

        function sendWatertoys() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#watertoys").modal('hide');

            var watertoys = new FormData();
            watertoys.append('_token', '{{ csrf_token() }}');
            watertoys.append('date_watertoys', $('#date_watertoys').val());
            watertoys.append('time_watertoys', $('#time_watertoys').val());
            watertoys.append('name_watertoys', $('#name_watertoys').val());
            watertoys.append('phone_number_watertoys', $('#phone_number_watertoys').val());
            watertoys.append('email_watertoys', $('#email_watertoys').val());
            watertoys.append('remarks_watertoys', $('#remarks_watertoys').val());
            watertoys.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('/charter/send-watertoys') }}",
                type: 'POST',
                data: watertoys,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $("#form-charter-watertoys")[0].reset();
                    toastr.success("The Charter Watertoys has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Charter watertoys failed to Send !");
                }
            });

        }

        function jetSki(el){
		  if(el.value != ""){
		    if(parseInt(el.value) < parseInt(el.min)){
		      el.value = el.min;
		    }
		  }
		}

        function waterToys(el){
		  if(el.value != ""){
		    if(parseInt(el.value) < parseInt(el.min)){
		      el.value = el.min;
		    }
		  }
		}

		function Showmaintenance() {
            $('#maintenance').modal('show');
    	}
    	function Showtowing() {
            $('#towing').modal('show');
    	}

    	$(document).ready(function() {
	    	$('#services_type').select2({
	            placeholder: 'please select Service Type',
	            width: '100%',
	            height: '100%',
	        });
            $('#services_type_towing').select2({
                placeholder: 'please select Service Type',
                width: '100%',
                height: '100%',
            });
    	});

    	function sendMaintenance() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#maintenance").modal('hide');

            var maintenance = new FormData();
            maintenance.append('_token', '{{ csrf_token() }}');
            maintenance.append('services_type', $('#services_type').val());
            maintenance.append('brand', $('#brand').val());
            maintenance.append('size', $('#size').val());
            maintenance.append('year', $('#year').val());
            maintenance.append('name', $('#name').val());
            maintenance.append('phone_number', $('#phone_number').val());
            maintenance.append('email', $('#email').val());
            maintenance.append('remarks', $('#remarks').val());
            maintenance.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('send-maintenance') }}",
                type: 'POST',
                data: maintenance,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $("#form-maintenance")[0].reset();
                    toastr.success("The Request maintenance has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Request Maintenance failed to Send !");
                }
            });

        }

        function sendTowing() {
            // var myTable = $("#TableProducts").DataTable();
            var HideModal = $("#towing").modal('hide');

            var towing = new FormData();
            towing.append('_token', '{{ csrf_token() }}');
            towing.append('services_type_towing', $('#services_type_towing').val());
            towing.append('brand_towing', $('#brand_towing_towing').val());
            towing.append('size_towing', $('#size_towing').val());
            towing.append('year_towing', $('#year_towing').val());
            towing.append('pickup_towing', $('#pickup_towing').val());
            towing.append('name_towing', $('#name_towing').val());
            towing.append('phone_number_towing', $('#phone_number_towing').val());
            towing.append('email_towing', $('#email_towing').val());
            towing.append('remarks_towing', $('#remarks_towing').val());
            towing.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('send-towing') }}",
                type: 'POST',
                data: towing,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $("#form-towing")[0].reset();
                    toastr.success("The Request Towing has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Request Towing failed to Send !");
                }
            });

        }

        function sendContactD() {
            var contact = new FormData();
            contact.append('_token', '{{ csrf_token() }}');
            contact.append('firstname', $('.firstname').val());
            contact.append('lastname', $('.lastname').val());
            contact.append('email', $('.email').val());
            contact.append('messages', $('.messages').val());
            contact.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('send-contact') }}",
                type: 'POST',
                data: contact,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $(".contact-us")[0].reset();
                    toastr.success("The Messages has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Messages failed to Send !");
                }
            });

        }

        function sendContactM() {
            var contact = new FormData();
            contact.append('_token', '{{ csrf_token() }}');
            contact.append('firstnameM', $('.firstnameM').val());
            contact.append('lastnameM', $('.lastnameM').val());
            contact.append('emailM', $('.emailM').val());
            contact.append('messagesM', $('.messagesM').val());
            contact.append('_method', 'POST');
            // console.log(files);

            $.ajax({
                url: "{{ url('send-contact-m') }}",
                type: 'POST',
                data: contact,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    //console.log(data);
                    $(".contact-us")[0].reset();
                    toastr.success("The Messages has been Send successfully !");

                },
                error: function(error) {
                    //console.log(error);
                    toastr.warning("Messages failed to Send !");
                }
            });

        }


        @if(Session::has('message'))
	        var type = "{{ Session::get('alert-type', 'info') }}";
	        switch(type){
	            case 'info':
	                toastr.info("{{ Session::get('message') }}");
	                break;

	            case 'warning':
	                toastr.warning("{{ Session::get('message') }}");
	                break;

	            case 'success':
	                toastr.success("{{ Session::get('message') }}");
	                break;

	            case 'error':
	                toastr.error("{{ Session::get('message') }}");
	                break;
	        }
	    @endif

	</script>
    @yield('js')
</body>
</html>