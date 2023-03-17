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
											<img src="{!! asset('public/images/process-icon-7.jpg') !!}" class="img-responsive" alt=""/>
											<h3>Processing... </h3>
											<p>Please do not close browser while Processing.</p>
											
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
<script>
<?php
if(Session::has('zap_booking_id')){
$zap_booking_id = Session::get('zap_booking_id');
	?>
		window.location.href = '<?php echo URL::to('/Hotel/HotelBooking'); ?>';
		<?php
}
?>
</script>
@endsection