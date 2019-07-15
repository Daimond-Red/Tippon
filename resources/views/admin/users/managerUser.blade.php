@extends('layouts.master')

@section('pageBar')
    <div class="kt-subheader__breadcrumbs">
        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Dashboard </a>
        <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
            Managers Users </span>
        {{-- <span class="kt-subheader__breadcrumbs-separator"></span>
        <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">New User</span> --}}
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
                        Managers Users
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    
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
                                            <th> EMP ID </th>
                                            <th> Email </th>
                                            <th> Created Date </th>
                                            <th width="15%"> Action </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! count($collection) )
                                        <tr>
                                            <td colspan="15" style="text-align: center">No matching records found</td>
                                        </tr>
                                    @else
                                        @foreach( $collection as $model )
                                            <tr>
                                                <td> {{ $model->id }} </td>
                                                <td> {{ $model->name }} </td>
                                                <td> {{ $model->emp_id }} </td>
                                                <td> {{ $model->email }} </td>
                                                <td> {{ getDateTimeValue($model->created_at) }} </td>
                                                @if( isAuth('Department', 'edit') || isAuth('Department', 'destroy') )
                                                <td>
                                                    @if( isAuth('Department', 'edit') )
                                                    <button
                                                        data-id="#mainPanel"
                                                        data-href="{{ route('admin.users.edit', $model->id) }}"
                                                        class="btn-sm btn dataModel"
                                                        type="button"
                                                    > <i class="la la-edit"></i> </button>
                                                    @endif
                                                    @if( isAuth('Department', 'destroy') )
                                                    <a href="{{route('admin.users.delete', $model->id)}}" class="btn-sm btn delete" > <i class="la la-trash"></i> </a>
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

            $('.users-menu').addClass('kt-menu__item--open');
            $('.manger-user-menu').addClass('kt-menu__item--active');
        });
    </script>
@stop
