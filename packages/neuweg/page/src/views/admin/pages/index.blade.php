@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link">
            Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Pages </span>
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
                        Page List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                            data-id="#mainPanel"
                            data-href="{{ route('modules.pages.create') }}" >
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
                                
                                <table class="data-table table table-bordered table-hover">
                                    <thead class="thead-default">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! count($collection) )
                                    
                                    @else
                                        @foreach( $collection as $model )
                                            <tr>
                                                <th scope="row">{{ $model->id }}</th>
                                                <td>{{ $model->title }}</td>
                                                <td>{{ $model->slug }}</td>
                                                <td>{{ date('d/m/Y', strtotime($model->created_at)) }}</td>
                                                <td>
                                                    {{-- @if( isAuth('Department', 'edit') ) --}}
                                                    <button
                                                        data-id="#mainPanel"
                                                        data-href="{{ route('modules.pages.edit', $model->id) }}"
                                                        class="btn-sm btn dataModel"
                                                        type="button"
                                                    > <i class="la la-edit"></i> </button>
                                                    <a
                                                        href="{{ route('modules.pages.delete', $model->id) }}"
                                                        class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill delete"
                                                        title="Delete"
                                                    >
                                                        <i class="la la-trash"></i>
                                                    </a>
                                                </td>
                                                {{-- @endif --}}
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
            // $('.master-menu').addClass('kt-menu__item--open');
            $('.page-menu').addClass('kt-menu__item--active');
        });
    </script>
@stop
