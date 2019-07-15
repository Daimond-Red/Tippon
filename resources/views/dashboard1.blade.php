@extends('layouts.master')

@section('style')

@stop
@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Dashboard </span>
    </div>
@stop

@section('content')

@stop

@section('script')
	<script>
        $(document).ready(function(){
            $('.home-menu').addClass('kt-menu__item--active');
        });
    </script>
@stop