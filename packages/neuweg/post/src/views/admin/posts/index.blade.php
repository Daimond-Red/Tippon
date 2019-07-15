@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('admin.dashboard') }}" class="kt-subheader__breadcrumbs-link">
            Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Posts </span>
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
                        Post List
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="dataModel btn btn-brand btn-icon-sm"
                            data-id="#mainPanel"
                            data-href="{{ route('modules.posts.create') }}" >
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
                                            <th> Post Title </th>
                                            <th> Created On </th>
                                            <th width="15%"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! count($collection) )
                                        
                                    @else
                                        @foreach( $collection as $model )
                                            <tr>
                                                <td> {{ $model->id }} </td>
                                                <td> {{ $model->title }} </td>
                                                <td> {{ getDateTimeValue($model->created_at) }} </td>
                                                {{-- @if( isAuth('Department', 'edit') || isAuth('Department', 'destroy') ) --}}
                                                <td>
                                                    {{-- @if( isAuth('Department', 'edit') ) --}}
                                                    <button
                                                        data-id="#mainPanel"
                                                        data-href="{{ route('modules.posts.edit', $model->id) }}"
                                                        class="btn-sm btn dataModel"
                                                        type="button"
                                                    > <i class="la la-edit"></i> </button>
                                                    <a
                                                        href="{{ route('modules.posts.delete', $model->id) }}"
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
            $('.post-menu').addClass('kt-menu__item--active');
        });
    </script>
@stop
