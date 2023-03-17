@extends('layouts.frontend')
@section('title', 'Booking failure')
@section('content')

<!-- Content
		============================================= -->
<section id="content">
	<div id="content-wrap">
		<!-- === Section Flat =========== -->
		<div class="section-flat single_sec_flat" style="background:#e8e8e8;">      
			<div class="section-content">
				<div class="container"> 
					<div class="row"> 
						<div class="col-sm-12">	 
							<div class="inner_construct">
								<div class="construct_whitebg">
									<div class="row"> 
										<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">	
											<img src="{!! asset('public/images/booking-failure.png') !!}" class="img-responsive" alt=""/>
											<h3>Booking Not Completed</h3>
											<p>Ticket not available this time. For Refund / A Fresh Booking Please contact our customer care.</p>
											<div class="customer_info">
												<span class="txt_left"><i class="fa fa-envelope"></i> <a href="mailto:info@Travel24hr.com">info@Travel24hr.com</a></span>
												<span class="txt_right"><i class="fa fa-phone"></i> <a href="tel:(+91)-09122195512">(+91)-09122195512</a></span>
												<div class="clearfix"></div>
											</div>
											
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div>	
				</div>	
			</div>	
		</div>	
	</div>	
</section>	

@endsection