@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link">Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Departments </span>
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
                        Departments
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                            data-id="#mainPanel"
                            data-href="{{ route('modules.departments.create') }}" >
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
                                                <td> {{ $model->name }} </td>
                                                <td> {{ $model->tag }} </td>
                                                <td> {{ getDateTimeValue($model->created_at) }} </td>
                                                @if( checkAuth(get_class($permission), 'edit') || checkAuth(get_class($permission), 'destroy') )
                                                <td>
                                                    @if( checkAuth(get_class($permission), 'edit') )
                                                    <button
                                                        data-id="#mainPanel"
                                                        data-href="{{ route('modules.departments.edit', $model->id) }}"
                                                        class="btn-sm btn dataModel"
                                                        type="button"
                                                    > <i class="la la-edit"></i> </button>
                                                    @endif
                                                    @if( checkAuth(get_class($permission), 'destroy') )
                                                    <a href="{{route('modules.departments.delete', $model->id)}}" class="btn-sm btn delete" > <i class="la la-trash"></i> </a>
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
@if( checkAuth(get_class($permission), 'create_designation') )
<div class="row">
    <div class="col-xl-12">
        <div class="kt-portlet form-area" id="designationpanel">
            
        </div>
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Designation
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    {{-- <div class="dropdown dropdown-inline">
                        <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                            data-id="#designationpanel"
                            data-href="{{ route('modules.departments.create') }}" >
                            <i class="flaticon2-plus"></i> Add New
                        </button>
                        
                    </div> --}}
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    
                    <div class="kt-section__content">

                        <div class="row">
                            <div class="col-12 ajax-collection">
                                
                                @if(! count($collection) )
{{--                                    <tr>--}}
{{--                                        <td colspan="15" style="text-align: center">No matching records found</td>--}}
{{--                                    </tr>--}}
                                @else
                                    <div class="">
                                        <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-primary">
                                            @foreach( $collection as $index => $model )
                                                @if( $index == 0 )
                                                    <li class="nav-item"> <a data-toggle="tab" href="#tab-{{$model->id}}" class="nav-link active" aria-expanded="true">{{$model->name}} </a> </li>
                                                @else
                                                    <li class="nav-item"> <a data-toggle="tab" href="#tab-{{$model->id}}" aria-expanded="false" class="nav-link">{{ $model->name }}</a> </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach( $collection as $index => $model )
                                                <div id="tab-{{$model->id}}" class="tab-pane <?php if($index == 0) echo 'active'; ?> kt-portlet">

                                                    <?php $role_collection = $repository->getRolesModel()->where('department_id', $model->id)->get(); ?>
                                                    <div class="kt-portlet__head">
                                                        <div class="kt-portlet__head-label">
                                                            
                                                        </div>
                                                        <div class="kt-portlet__head-toolbar">
                                                            <div class="dropdown dropdown-inline">
                                                                <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                                                                data-id="#designationpanel"
                                                                data-href="{{ route('modules.designations.create', $model->id) }}" >
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
                                                                        <table class="data-table table " >
                                                                            <thead class="thead-light">
                                                                            <tr class="bg-primary">
                                                                                <th> ID </th>
                                                                                <th> Name </th>
                                                                                <th> Tag </th>
                                                                                <th> Created Date </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @if(! count($role_collection) )
{{--                                                                                <tr>--}}
{{--                                                                                    <td colspan="15" style="text-align: center">No matching records found</td>--}}
{{--                                                                                </tr>--}}
                                                                            @else
                                                                                @foreach( $role_collection as $r_model )
                                                                                    <tr>
                                                                                        <td> {{ $r_model->id }} </td>
                                                                                        <td> {{ $r_model->display_name }} </td>
                                                                                        <td> {{ $r_model->name }} </td>
                                                                                        <td> {{ getDateTimeValue($r_model->created_at) }} </td>
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
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
    
@stop

@section('script')
    <script>
        $(document).ready(function(){
            $('.permission-menu').addClass('kt-menu__item--open');
            $('.department-menu').addClass('kt-menu__item--active');
            $('.permission-menu > .kt-menu__submenu ').css({'display' : 'block'});
        });
    </script>
@stop
