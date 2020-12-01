<!-- jQuery -->
<script src="{{ asset('adminlte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/loading-overlay.min.js') }}"></script>      
<!-- Sparkline -->
<!--<script src="{{ asset('adminlte3/plugins/sparklines/sparkline.js') }}"></script>-->

<!-- daterangepicker -->
<script src="{{ asset('adminlte3/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sweetalert2.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte3/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/select2/js/select2.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('adminlte3/dist/js/pages/dashboard.js') }}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte3/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/page.js') }}"></script>
<script type="text/javascript">
	var keyCaptcha = '{{env("APP_SYSTEM","")}}_reCaptchaV2Available';
	var reCaptchaV2Available = localStorage.getItem(keyCaptcha);
	if (reCaptchaV2Available ==null || reCaptchaV2Available =="null") {
		localStorage.setItem(keyCaptcha, JSON.stringify({available : true}));
	}
</script>
@stack("js")