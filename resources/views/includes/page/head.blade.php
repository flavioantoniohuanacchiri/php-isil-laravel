<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{env("APP_NAME", "")}} | {{(isset($site)? (isset($site['namePage'])? $site['namePage'] : '') : '')}} - {{(isset($site)? (isset($site['namePageParent'])? $site['namePageParent'] : '') : '')}}</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/ionicons.min.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/daterangepicker/daterangepicker.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/loading.min.css') }}">
<style type="text/css">
	.content-header{
		padding: 5px .5rem;
	}
	.content-header h1{
		font-size: 1.4rem
	}
    main.py-4 {
        padding-top: 0px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
    	line-height: 18px;
    }
    .label-success{
    	background-color: #00a65a !important;
    }
    .label-danger{
    	background-color: #dd4b39 !important;
    }
    .label{
	    display: inline;
	    padding: .2em .6em .3em;
	    font-size: 75%;
	    font-weight: 700;
	    line-height: 1;
	    color: #fff;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: baseline;
	    border-radius: .25em;
	}
</style>
@stack("css")