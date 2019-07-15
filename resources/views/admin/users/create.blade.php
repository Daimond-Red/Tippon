@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Create User </span>
        {{-- <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">New User</span> --}}
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="kt-portlet form-area" id="mainPanel">
            
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Ceate User
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">

                        {{ Form::open( [ 'route' => 'admin.users.store', 'method' => 'POST', 'files' => true , 'class' => 'user-form-submit']) }}
                        @include('admin.users.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="panel panel-white">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h3 class="panel-title text-capitalize">Create User</h3> </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
            </div>
        </div>
    </div>
    <div id="panel-1" class="collapse in">
        <div class="panel-body">
            {{ Form::open( [ 'route' => 'admin.users.store', 'method' => 'POST', 'files' => true , 'class' => 'user-form-submit']) }}
            @include('admin.users.form')
            {{ Form::close() }}
        </div>
    </div>
</div> --}}

@stop

@section('script')
    <script>
        $(document).ready(function(){

            $('.users-menu').addClass('kt-menu__item--open');
            $('.create-user-menu').addClass('kt-menu__item--active');
            $('.users-menu > .kt-menu__submenu ').css({'display' : 'block'});

            
            // $('body').on('select2:select', '#state', function(){

            //     var val = $(this).val();

            //     {{-- var dataUrl = '{{route('admin.headQuarters.search')}}?state_id='+val; --}}

            //     $('#head_quarter').html('').select2({
            //         width: "off",
            //         ajax: {
            //             url: dataUrl,
            //             dataType: 'json',
            //             delay: 250,
            //             data: function(params) {
            //                 return {
            //                     q: params.term, // search term
            //                     page: params.page
            //                 };
            //             },
            //             processResults: function(data, page) {
            //                 return {
            //                     results: data.items
            //                 };
            //             },
            //             cache: true
            //         }
            //     });
            //     $('#head_quarter').html('');

            //     $('.zones-input').hide();
            //     $('#zone-not-found').show();

            // });

            // $('body').on('select2:select', '#head_quarter', function (e) {
            //     var data = e.params.data;
            //     $('.zones-input').hide();

            //     if(! $('.head'+data.id).length ) {
            //         $('#zone-not-found').show();
            //     } else {
            //         $('#zone-not-found').hide();
            //     }

            //     $('.head'+data.id).show();
            // });

            // $('#head_quarter').trigger('select2:select');

        });
    </script>
@stop
