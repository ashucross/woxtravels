@extends('layouts.frontend')
@section('title', 'Contact Us')
@section('content')

<!-- Content
		============================================= -->
		<div class="topbanner contact-top">
	<div class="headingtop">
		<span>Reach Us</span>
		<h1>Get In Touch With Us</h1>
	</div>
</div>

<div class="graybg">
	<div class="container">
		<div class="icondetails d-flex">
			<div class="detail-icon" data-aos="fade-right" data-aos-duration="1500">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 512 512" style="enable-background: new 0 0 512 512;" xml:space="preserve">

					<path class="graysvg" d="M316,260c-5.5,0-10,4.5-10,10s4.5,10,10,10s10-4.5,10-10S321.5,260,316,260z" />
					<path class="graysvg" d="M102.2,369.8l-100,126c-2.4,3-2.8,7.1-1.2,10.6c1.7,3.5,5.2,5.7,9,5.7h492c3.8,0,7.3-2.2,9-5.7
c1.7-3.5,1.2-7.6-1.2-10.6l-100-126c-1.9-2.4-4.8-3.8-7.8-3.8h-87.6l74.8-117.3c17.5-26.3,26.8-57,26.8-88.7C416,71.8,344.2,0,256,0
S96,71.8,96,160c0,31.7,9.3,62.4,26.8,88.7L197.6,366H110C106.9,366,104.1,367.4,102.2,369.8z M64.8,449h60.5l-34.1,43H30.7
L64.8,449z M210.4,386l27.4,43h-71.1l34.1-43H210.4z M301.7,386h9.5l34.1,43h-71.1L301.7,386z M361.2,449l34.1,43H116.7l34.1-43
H361.2z M420.8,492l-34.1-43h60.5l34.1,43H420.8z M431.3,429h-60.5l-34.1-43h60.5L431.3,429z M139.5,237.7
c-15.4-23-23.5-49.9-23.5-77.7c0-77.2,62.8-140,140-140s140,62.8,140,140c0,27.8-8.1,54.7-23.5,77.7c0,0.1-0.1,0.1-0.1,0.2
c-6.6,10.3-111.3,174.6-116.4,182.5c-12.7-20-103.4-162.2-116.4-182.5C139.6,237.8,139.5,237.7,139.5,237.7z M175.3,386l-34.1,43
H80.7l34.1-43H175.3z" />
					<path class="graysvg" d="M256,260c54.9,0,100-44.5,100-100c0-55.1-44.9-100-100-100s-100,44.9-100,100C156,215.6,201.1,260,256,260z
 M256,80c44.1,0,80,35.9,80,80c0,44.5-36.2,80-80,80c-43.8,0-80-35.5-80-80C176,115.9,211.9,80,256,80z" />
					<path class="graysvg" d="M298.1,294.1c-4.7-2.9-10.9-1.3-13.7,3.4l-37,61.3c-2.9,4.7-1.3,10.9,3.4,13.7c4.8,2.9,10.9,1.3,13.7-3.4
l37-61.3C304.4,303.1,302.9,297,298.1,294.1z" />
				</svg>
				<h6>Address</h6>
				<span>
				 @foreach($sites as $key => $value)
						@php $con = explode(",",$value->content) @endphp
							
				        @if($value->title == 'Address')
							{{$value->content}}
						@endif
				@endforeach
				</span>
			</div>

			<div class="detail-icon" data-aos="fade-up" data-aos-duration="1500">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 512 512" style="enable-background: new 0 0 512 512;" xml:space="preserve">

					<g>
						<path class="graysvg" d="M472,287v-77C472,93.2,371.3,0,256,0C141.1,0,40,92.9,40,210v77c-22.8,4.6-40,24.8-40,49
	c0,24.4,17.6,44.8,40.8,49.2C45.2,408.4,65.6,426,90,426h20c5.5,0,10-4.5,10-10V256c0-5.5-4.5-10-10-10H90c-11.2,0-21.6,3.7-30,10
	v-36.9c21.5-3.9,38.8-20.2,43.8-42.2C118.7,110.3,184.2,60,256,60c71.8,0,137.3,50.3,152.3,117c4.9,22,22.2,38.2,43.7,42.1V256
	c-8.4-6.3-18.8-10-30-10h-20c-5.5,0-10,4.5-10,10v160c0,5.5,4.5,10,10,10h20c11.2,0,21.5-3.7,29.8-9.9
	c-2.1,25.7-23.6,45.9-49.8,45.9H294.7c-4.5-17.2-20.1-30-38.7-30c-22.1,0-40,17.9-40,40s17.9,40,40,40c18.6,0,34.3-12.8,38.7-30
	H402c38.6,0,70-31.4,70-70v-27c22.8-4.6,40-24.8,40-49S494.8,291.7,472,287z M90,266h10v140H90c-16.5,0-30-13.5-30-30
	c0-5.5-4.5-10-10-10c-16.5,0-30-13.5-30-30s13.5-30,30-30c5.5,0,10-4.5,10-10C60,279.5,73.5,266,90,266z M427.9,172.6
	C410.8,97,336.9,40,256,40c-80.9,0-154.8,57-171.8,132.5c-2.8,12.6-12.1,22.3-23.8,25.9C66.8,100.6,153.8,20,256,20
	c102.2,0,189.2,80.6,195.6,178.4C439.9,194.8,430.7,185.2,427.9,172.6z M462,366c-5.5,0-10,4.5-10,10c0,16.5-13.5,30-30,30h-10V266
	h10c16.5,0,30,13.5,30,30c0,5.5,4.5,10,10,10c16.5,0,30,13.5,30,30S478.5,366,462,366z" />
					</g>
				</svg>


				<h6>Call Us</h6>
			
			
			 @foreach($sites as $key => $value)
						@php $con = explode(",",$value->content) @endphp
							
				        @if($value->title == 'Contact')
                        <a href="tel:{{ $con[0]}}"><span><i class="fa fa-phone rtss"></i></span>{{ $con[0]}}</a>
                                            <a href="tel:{{ $con[1] ?? Null}}"><span><i class="fa fa-phone rtss"></i></span>{{ $con[1] ?? Null}}</a>
						@endif
                        @endforeach
			
			</div>

			<div class="detail-icon" data-aos="fade-left" data-aos-duration="1500">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					viewBox="0 0 512 512" style="enable-background: new 0 0 512 512;" xml:space="preserve">
					<g>
						<path class="graysvg" d="M458,473.4c2.2,0,4.3-0.9,5.8-2.7c2.7-3.2,2.3-8-1-10.7L341.7,359.1c-3.2-2.7-8-2.3-10.7,1s-2.3,8,1,10.7
	l121.2,100.9C454.6,472.9,456.3,473.4,458,473.4z" />
						<path class="graysvg" d="M170.3,359.1L49,460c-3.2,2.7-3.7,7.5-1,10.7c1.5,1.8,3.7,2.7,5.8,2.7c1.7,0,3.4-0.6,4.9-1.8L180,370.7
	c3.2-2.7,3.7-7.5,1-10.7C178.3,356.8,173.5,356.4,170.3,359.1z" />
						<path class="graysvg" d="M509.2,181.5l-53.5-44.6V88.2c0-34.6-28.1-62.8-62.8-62.8h-71.2l-3.4-2.9c-36.1-30.1-88.5-30.1-124.6,0
	l-3.4,2.9h-15.4c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6h218c26.2,0,47.5,21.3,47.5,47.5v52.3v0v90.2L308.5,340.5
	c-30.5,25.4-74.7,25.4-105.1,0L71.5,230.7v-90.2c0,0,0,0,0,0V88.2c0-26.2,21.3-47.5,47.6-47.5h25.4c4.2,0,7.6-3.4,7.6-7.6
	s-3.4-7.6-7.6-7.6H119c-34.6,0-62.8,28.1-62.8,62.8v48.8L2.7,181.5C1,183,0,185.1,0,187.3c0,0,0,0,0,0.1v269.3
	C0,487.2,24.8,512,55.3,512h340.6c4.2,0,7.6-3.4,7.6-7.6s-3.4-7.6-7.6-7.6H55.3c-22.1,0-40.1-18-40.1-40.1V203.6L59,240.1
	c0,0,0,0,0,0l134.6,112.1c18.1,15,40.2,22.6,62.3,22.5c22.1,0,44.3-7.5,62.3-22.5l134.6-112.1c0,0,0,0,0.1-0.1l43.8-36.5v253.1
	c0,22.1-18,40.1-40.1,40.1h-30.4c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6h30.4c30.5,0,55.3-24.8,55.3-55.3V187.4c0,0,0,0,0-0.1
	C511.9,185.1,510.9,183,509.2,181.5z M216.4,25.4c24.6-13.6,54.6-13.6,79.2,0H216.4z M56.3,218l-36.8-30.6l36.8-30.6V218z
	 M455.7,218v-61.3l36.8,30.6L455.7,218z" />
						<path class="graysvg" d="M367.5,210.6h-223c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6h223c4.2,0,7.6-3.4,7.6-7.6S371.7,210.6,367.5,210.6
	z" />
						<path class="graysvg" d="M367.5,254.8h-223c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6h223c4.2,0,7.6-3.4,7.6-7.6S371.7,254.8,367.5,254.8
	z" />
						<path class="graysvg" d="M367.5,122.3h-223c-4.2,0-7.6,3.4-7.6,7.6c0,4.2,3.4,7.6,7.6,7.6h223c4.2,0,7.6-3.4,7.6-7.6
	C375.1,125.7,371.7,122.3,367.5,122.3z" />
						<path class="graysvg" d="M367.5,181.7c4.2,0,7.6-3.4,7.6-7.6s-3.4-7.6-7.6-7.6h-55.8c-4.2,0-7.6,3.4-7.6,7.6s3.4,7.6,7.6,7.6H367.5z" />
						<path class="graysvg" d="M144.5,181.7h141.9c4.2,0,7.6-3.4,7.6-7.6s-3.4-7.6-7.6-7.6H144.5c-4.2,0-7.6,3.4-7.6,7.6
	S140.3,181.7,144.5,181.7z" />
					</g>
				</svg>
				<h6>Mail Us</h6>
					
			 @foreach($sites as $key => $value)
			 @if($value->title == 'Email')
				<a href="mailto:{{$value->content}}">
				{{$value->content}}</a>
				@endif
			@endforeach
				<a href="#">&nbsp;</a>
			</div>
		</div>
		<div class="f_heading">
			
			<div class="stay">
				<p>Stay tuned and access the deals and discounts with:</p>
				 @foreach($sites as $key => $value)
			 @if($value->title == 'Facebook')
				<a href="{{$value->content}}">
					<i class="fab fa-facebook"></i>
				</a>
				@endif 
				@if($value->title == 'Twitter')
				<a href="{{$value->content}}">
					<i class="fab fa-twitter"></i>
				</a>
				@endif
				 @if($value->title == 'Linkedin')
				<a href="{{$value->content}}">
					<i class="fab fa-linkedin"></i>
				</a>
				@endif
				 @if($value->title == 'Instagram')
				<a href="{{$value->content}}">
					<i class="fab fa-instagram"></i>
				</a>
				@endif
				 {{-- @if($value->title == 'Facebook')
				<a href="#">
					<i class="fab fa-facebook"></i>
				</a>

				@endif --}}
				@endforeach
			</div>
		</div>


	</div>
</div>
<div class="mapc">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.28805549874!2d6.674132514265838!3d6.225699428282033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1043f23aec30a8e9%3A0xe3f4244f600737a1!2sOpen%20Heaven%20Plaza%2C%20Opposite%20Legislative%20Quarters%2C%20103%20Okpanam%20Rd%2C%20GRA%20Phase%20I%20320108%2C%20Asaba%2C%20Nigeria!5e0!3m2!1sen!2sin!4v1642775112195!5m2!1sen!2sin" width="100%" height="" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>

<div class="container">
<div class="col-sm-12">	  
							@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	
        <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show">

        <strong>{{ $message }}</strong>
</div>
@endif
							
							</div>
							<br>
	<div class="dflexbox">
		<div class="boxleft" data-aos="fade-left" data-aos-duration="1500">
			<div class="contactus-form">
				<div class="cnt-msg">
					<span>DROP US A LINE</span>
					<h2><span>SEND YOUR</span> MESSAGE</h2>
					<p>If you have question or would like more information on our works, Please complete the form and we’ll aim get back to you </p>
				</div>

				<div class="formcontact">

				<div class="contact_form mtscd">
										<h4>Get in tocuh with us</h4>
										{{ Form::open(array('url' => 'contact/send', 'name'=>"add-contact", 'autocomplete'=>'off', "enctype"=>"multipart/form-data", 'class' => "form_sec")) }}
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<input value="{{ old('name')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Name" name="name" />
													</div>
													<div class="form-group">
														<input value="{{ old('email')  }}" data-valid="required" type="email" class="form-control txt_field" placeholder="Email Address" name="email" />
													</div>
													<div class="form-group">
														<input value="{{ old('phone')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Phone Number" name="phone" />
													</div>
													<div class="form-group">
														<input value="{{ old('subject')  }}" data-valid="required" type="text" class="form-control txt_field" placeholder="Subject" name="subject" />
													</div>
													<div class="form-group">
														<textarea data-valid="required" class="form-control" value="" placeholder="Your Message" name="message">{{ old('message')  }}</textarea>
													</div>
													@if(config('services.recaptcha.key'))
														<div class="g-recaptcha"
															data-sitekey="{{config('services.recaptcha.key')}}">
														</div>
													@endif
													@if ($errors->has('g-recaptcha-response'))
															<span class="custom-error" role="alert">
																<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
															</span>
														@endif
													<div class="form-group text-center">
									<input onClick='customValidate("add-contact")' type="button" name="submitcontact" class="form_submit_btn" value="Submit" />
													</div>
												</div>
											</div>
										{{ Form::close() }}
									</div> 


				
				</div>
			</div>
		</div>

		<div class="boxright">
			<div class="rightimg" data-aos="fade-right" data-aos-duration="1500">
				<img src="{{url('images/popimg.svg')}}" />
			</div>
		</div>
	</div>
</div>



@endsection