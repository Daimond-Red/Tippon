@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Permission </span>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-6">
        <div class="kt-portlet form-area" id="mainPanel">
            
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Permission Master
                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    
                    <div class="kt-section__content">

                        <div class="row">
                            <div class="col-12">
                                {!! HTML::vselect('department', $department_select  , null) !!}
                                <div id="designationPanel">
                                    @include('permissions::admin.permissionConfigs.designation')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="kt-portlet form-area" id="mainPanel">
            
        </div>
        <div class="kt-portlet">
            <div class="row">
                <div class="col-12" id="menuPanel">
                    @include('permissions::admin.permissionConfigs.menu')
                </div>
            </div>    
        </div>
    </div>
</div>
    

@stop

@section('script')
<script>
    $(document).ready(function(){
        $('.permission-menu').addClass('kt-menu__item--open');
        $('.permission-create-menu').addClass('kt-menu__item--active');
        $('.permission-menu > .kt-menu__submenu ').css({'display' : 'block'});

        $('body').on('change', '#department', function(){

            pageLoader();

            $.get('{{route('modules.departments.viewDesignation')}}', {'department' : $('#department').val() }, function(res){
                $('#designationPanel').html(res);
                removePageLoader();
                $('body #designation').trigger('change');
            });

        });

        $('body').on('change', '#designation', function(){

            pageLoader();
            var content = $(this).data('content');

            $.get('{{route('modules.departments.viewMenu')}}', {'designation' : $('#designation').val() }, function(res){
                $(content).html(res);
                removePageLoader();
            });

        });

        $('body').on('submit', '#assignPermission', function (e) {
            e.preventDefault();
            pageLoader()
            $.post($(this).attr('action'), $(this).serialize(), function (res) {
                showSuccessMsg('successfully updated');
                removePageLoader();
            });

        });

    });
</script>
@stop
