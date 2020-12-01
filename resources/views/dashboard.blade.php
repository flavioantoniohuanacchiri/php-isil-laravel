@extends('layouts.app')
@push("css")
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/jqvmap/jqvmap.min.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('adminlte3/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@push("js")
<!-- JQVMap -->
<script src="{{ asset('adminlte3/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminlte3/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte3/plugins/chart.js/Chart.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte3/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte3/plugins/summernote/summernote-bs4.min.js') }}"></script>
@endpush
@section('content')
<!-- Main content -->
  @include("partials.home.dashboard")
@endsection