@extends('layouts.agent-login')
@section('title', 'Travel Agents')
@section('content')


<style>
    header,.hidepg1,footer,.top_lanucher {
        display: none;
    }
  body,#full-container{background: #0c234d;}


</style>

<!-- Content
		============================================= -->
<div class="prt_noc">
	
	<div class="lgbox">
	<div class="agent_form">
			{{ Form::open(array('url' => 'agent/login', 'name'=>'admin_login', 'autocomplete'=> 'off')) }}
				 <h1>Login in to your Portal</h1>
				
				<div class="inner_form_field">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fas fa-envelope"></i>
						</div>
						<input autocomplete="off" type="text" name="email" value="{{ (Cookie::get('email') !='' && !old('email')) ? Cookie::get('email') : old('email')  }}" class="form-control" placeholder="Enter Email Id"/>
						@if ($errors->has('email'))
						<span class="custom-error" role="alert">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					</div>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-key icon"></i>
						</div>
						<input value="{{ (Cookie::get('password') !='' && !old('password')) ? Cookie::get('password') : old('password')  }}" autocomplete="off" type="Password" name="password" class="form-control" placeholder="password"/>
					</div>	
					<div class="checkbox">
						<label><input name="remember" @if(Cookie::get('email') != '' && Cookie::get('password') != '') checked  @endif type="checkbox" value=""/> Remember me</label>
					</div>
					<div class="cntboxtx">
					<input type="submit" class="btn submit_btn" name="submit" value="Login" />
					<br>
					<a href="#" class="fgtxx">Forgot Password?</a>
					<div class="footer">
						<!-- <p>Don't have an Account! <a href="{{route('agent-signup.index')}}">Sign Up Here</a></p> -->
						
					</div></div>
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<div class="container">
<div class="ftrbx_ag">
	<h5>Having Trouble? <a href="http://24hr.lightmytrip.com/contact">Contact us</a></h5>
	<ul>
		<li><a href="http://24hr.lightmytrip.com/privacy-policy">Privacy Policy</a></li>
		<li><a href="http://24hr.lightmytrip.com/terms-and-conditions">Term of Service</a></li>
		<li><a href="http://24hr.lightmytrip.com/">Travel24hr Main site</a></li>
	</ul>
</div></div>



	
















<section id="content" style="display: none;">
	<div id="content-wrap">
		<!-- === Section Flat =========== -->
		<div class="section-flat single_sec_flat travelagent_page" style="background:#e8e8e8;">      
<div class="section-content">
<div class="custom_banner travelagent_bg">
<div class="container">
<div class="row">   

</div>
</div>
</div>
<div class="inner_travelagent">
<div class="container">
<div class="row"> 
	<div class="col-sm-12">	 
		<div class="cus_breadcrumb">
			<ul>
				<li class="active"><a href="#">Home</a></li>
				<li><span><i class="fa fa-angle-right"></i></span></li>
				<li><a href="#">Travel Agents</a></li>
			</ul>
		</div>  
	</div>
	<div class="clearfix"></div>   
</div>  
</div>	
<div class="travel_bgclr">
<div class="container">
	<div class="row"> 
		<div class="col-sm-4 col_4">
			<div class="travel_col">
				<div class="travel_icon">
					<img src="{!! asset('public/images/support-management.png') !!}" alt=""/>
				</div>
				<div class="travel_info">
					<h4>Travel Management Support</h4>
					<p>At B2B travel agency, we try to simplify the ways of travel business for our partners by offering them all the travel solutions under one umbrella.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col_4">
			<div class="travel_col">
				<div class="travel_icon">
					<img src="{!! asset('public/images/support.png') !!}" alt=""/>
				</div>
				<div class="travel_info">
					<h4>24X7 Best Support</h4>
					<p>Great products, exciting deals and a cutting-edge technological interface might be important, but none of these can earn customers’ loyalty.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col_4">
			<div class="travel_col">
				<div class="travel_icon">
					<img src="{!! asset('public/images/services-icon.png') !!}" alt=""/>
				</div>
				<div class="travel_info">
					<h4>Wide Travel Services</h4>
					<p>The internet has disrupted the world and travel business is not unaffected. The disruption in travel industry gave birth to online travel agencies.</p>
				</div>
			</div>
		</div> 
		<div class="clearfix"></div>
		<div class="col-sm-6">	
			<div class="how_img">
				<img class="img-responsive" src="{!! asset('public/images/agent-services.png') !!}" alt=""/>
			</div>
		</div>
		<div class="col-sm-6">	
			<div class="travel_txt">
				<h4>Maximize Your Earning With ZapBooking</h4>
				<p>The internet has transformed the businesses and the travel business is no exception. With the arrival of technology the mode of business has gone for a sea change. Deals are being sealed online over mobiles, tablets and computers, and OTAs are looking for a business-to-business travel agency from where they can get the best deals to meet the demand of their informed clients. B2B Travel Agency, with deals for seemingly every need of travelers, is a one stop shop for travel businesses. With the best inventory ever in India, competitive prices, and cutting edge technology; we make sure our partners can get the best deals from the comfort of their offices.</p>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
					<div class="travel_desk">
						<div class="container">
							<div class="row"> 
								<div class="col-sm-12 travel_txt">
									<h3>From the desk of CEO</h3>
									<p><b>Dear Respected Partner,</b></p>
									<p>First of all, I'd like to say a very big thank you for the continued support you offer to ZapBooking Flight. With your help the business continues to grow in all product sectors, and I am sure that you have experienced a fruitful and profitable season too.</p>
									<p>Our focus is always on providing superior pricing for both domestic and international holidays. In India, ZapBooking Flight is proud to have more hotel suppliers integrated than any other platform, meaning we are able to offer the widest range of outbound hotels in the sub-continent. To optimize our services and ensure we consistently provide the best rates to our partners, we have recently restructured our hotels and packages department. I am personally involved on a day-to-day basis in making sure that ZapBooking Flight becomes a leader in the holidays and packages vertical. I urge you to spend some time getting to know our online hotel product, which is powerful in both inventory and pricing. Should you have any questions related to this, please feel free to call on <a href="tel:(+91)-11-47262626">(+91)-11-47262626</a></p>
								</div>	
								<!--<div class="col-sm-3 travel_img">
									<img class="img-responsive" src="{!! asset('public/images/ceo.jpg') !!}" alt=""/>
								</div>-->
								<div class="clearfix"></div>
							</div>	
						</div>	
					</div>	
				</div>	
			</div>	
		</div>	
	</div>	
</section>	

@endsection
<div class="shapear">&nbsp;</div>