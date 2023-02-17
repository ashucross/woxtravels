@extends('homeLayout')
@section('styles')
<!-- page specific style code here-->

<!-- page specific style code here-->
@endsection
@section('pageContent')
<section class="search_box  position-relative">
   <div class="tab_nav">
      <!-- Nav tabs -->
      @include('includes.nav')

      <!-- Tab panes -->
      <div class="tab-content">
         <div class="tab-pane  active" id="Insurance">
            <div class="container">
               <div class="cmsn text-center">
                  <img src="{{asset('public/assets/images/comingsoon.png')}}" alt="" class="img-res" />
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('scripts')

@endsection