<script src="{{asset('public/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/assets/js/slick.min.js')}}"></script>
<script src="{{asset('public/assets/js/wow.min.js')}}"></script>
<script src="{{asset('public/assets/js/prefixfree.min.js')}}"></script>
<script src="{{asset('public/assets/js/moment.min.js')}}"></script>
<script src="{{asset('public/assets/js/daterangepicker.min.js')}}"></script>
<script src="{{asset('public/assets/js/intlTelInput-jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/user.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>
    $(document).ready(function() {
        toastr.options = {
            closeButton: true,
            debug: true,
            newestOnTop: false,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            showDuration: "500",
            hideDuration: "1000000",
            timeOut: "7000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
    });
</script>