@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('modules.permissionGroups.index') }}" class="kt-subheader__breadcrumbs-link">Permissions </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Options</span>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet form-area" id="mainPanel">
            
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Permissions
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                            data-id="#mainPanel"
                            data-href="{{ route('modules.permissionGroups.permissionGroupOptionCreate', $model->id) }}" >
                            <i class="flaticon2-plus"></i> Add New
                        </button>
                        
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    
                    <div class="kt-section__content">

                        <div class="row">
                            <div class="col-12 ajax-collection">
                                
                                <table class="data-table table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th> ID </th>
                                            <th> Name </th>
                                            <th> Tag </th>
                                            <th> Created Date </th>
                                            @if( checkAuth(get_class($permission), 'edit') || checkAuth(get_class($permission), 'destroy') )
                                            <th width="15%"> Action </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! count($collection) )
{{--                                        <tr>--}}
{{--                                            <td colspan="15" style="text-align: center">No matching records found</td>--}}
{{--                                        </tr>--}}
                                    @else
                                        @foreach( $collection as $model )
                                            <tr>
                                                <td> {{ $model->id }} </td>
                                                <td> {{ $model->display_name }} </td>
                                                <td> {{ $model->name }} </td>
                                                <td> {{ getDateTimeValue($model->created_at) }} </td>
                                                @if( checkAuth(get_class($permission), 'edit') || checkAuth(get_class($permission), 'destroy') )
                                                <td>
                                                    @if( checkAuth(get_class($permission), 'edit') )
                                                        <button
                                                                data-id="#mainPanel"
                                                                data-href="{{ route('modules.permissionGroups.permissionGroupOptionEdit', $model->id) }}"
                                                                class="btn-sm btn dataModel"
                                                                type="button"
                                                        > <i class="la la-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if( checkAuth(get_class($permission), 'destroy') )
                                                    <a href="{{route('modules.permissionGroups.permissionGroupOptionDelete', $model->id)}}" class="btn-sm btn delete" > <i class="la la-trash"></i> </a>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
            $('.permission-group-menu').addClass('kt-menu__item--active');
            $('.permission-menu > .kt-menu__submenu ').css({'display' : 'block'});
        });
    </script>
@stop
