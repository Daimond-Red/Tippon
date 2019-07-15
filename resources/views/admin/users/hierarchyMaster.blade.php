@extends('layouts.master')

@section('pageBar')
    <ul class="breadcrumb">
        <li class="breadcrumb-item text-capitalize">
            <h3>Hierarchy Master</h3>
        </li>
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Hierarchy</a></li>
    </ul>
@stop

@section('content')

    <div class="prtm-block searchBox" id="mainSearch">
        <div class="prtm-block-title mrgn-b-lg">
            <h3 class="text-capitalize">Filters</h3>
        </div>
        <form action="{{route('admin.users.hierarchyMaster')}}" method="POST" id="searchUsers" class="submitSearchModel" data-content="#panel-1">

            <div class="row">
                <div class="col-md-4">
                    {!! HTML::vselect('user_id', [ ''  => 'Please select' ], null, [
                        'label' => 'Employee Code', 
                        'class' => 'form-control select2-ajaxselect-sales', 
                        'data-url' => route('admin.users.search')]) 
                    !!}
                </div>
            </div>

            <button class="btn btn-primary">Search Users</button>
            <button class="btn btn-danger clearSearchModel" data-refresh="#panel-1" data-content="#mainSearch" data-url="{{route('admin.users.hierarchyMaster')}}" type="button">Clear</button>
        </form>
    </div>

    <div id="mainPanel">
        
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <h3 class="panel-title text-capitalize">Hierarchy Master</h3> </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="pull-right">
                                <ul class="list-inline mrgn-all-none">
                                    <li>
                                        <a
                                            class="btn btn-primary btn-rounded"
                                            href="{{ getMediaUrl('samples/HierarchyMaster.csv') }}"
                                            download
                                        >Download CSV
                                        </a>
                                    </li>
                                    <li>
                                        <button
                                            class="btn btn-primary btn-rounded data-import"
                                            data-url="{{ route('admin.users.hierarchyMaster', ['import' => 'csv']) }}"
                                        >Import
                                        </button>
                                    </li>
                                    <li>
                                        <button
                                            class="btn btn-primary btn-rounded dataModel"
                                            type="button"
                                            data-id="#mainPanel"
                                            data-href="{{ route('admin.users.hierarchyMasterCreate') }}"
                                        >Add New
                                        </button>
                                    </li>
                                    <li class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success btn-rounded searchModel" data-content="#mainSearch"> <i class="fa fa-search fa-lg"></i> Filters </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="panel-1" class="collapse in">
                    <div class="panel-body">
                        <div class="table-responsive ajax-collection">
                            <table class="table table-striped table-hover th-fw-light" style="width:100%;">
                                <thead>
                                <tr class="bg-primary">
                                    <th> Emp code </th>
                                    <th> Manager code </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(! count($collection) )
                                    <tr>
                                        <td colspan="15" style="text-align: center">No matching records found</td>
                                    </tr>
                                @else
                                    @foreach( $collection as $model )
                                        <?php if(!$model->user_id) continue; ?>
                                        <tr>
                                            <td>{{ optional($model->user)->name }} - ({{ optional($model->user)->emp_id }})</td>
                                            @if(optional($model->parent)->emp_id)
                                                <td>{{ optional($model->parent)->name }} - ({{ optional($model->parent)->emp_id }})</td>
                                            @else
                                                <td>VACANT</td>
                                            @endif
                                            <td>
                                                <a
                                                    data-toggle="tooltip"
                                                    title="Delete"
                                                    href="{{route('admin.users.hierarchyMasterDelete', $model->id)}}"
                                                    class="deleteItem btn btn-outline-danger btn-xs">
                                                    <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ $collection->appends(array_merge(request()->all(), ['isAjax'=>1]))->links() }}
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
            $('.hierarchy-menu').addClass('active')
        });
    </script>
@stop
