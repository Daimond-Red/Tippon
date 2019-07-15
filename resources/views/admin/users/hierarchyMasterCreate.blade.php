<div class="panel panel-white">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h3 class="panel-title text-capitalize">Create New</h3> </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <a href="#panel-1" class="pull-right" data-toggle="collapse"> <i class="fa fa-angle-down fa-lg gray"></i> </a>
            </div>
        </div>
    </div>
    <div id="panel-1" class="collapse in">
        <div class="panel-body">
            {{ Form::open( [ 'route' => 'admin.users.hierarchyMasterStore', 'method' => 'POST', 'files' => true ]) }}

                <div class="row">
                    <div class="col-md-6">
                        {!! HTML::vselect('user_id', [ ''  => 'Please select' ], null, ['label' => 'Employee Code', 'data-validation' => 'required', 'class' => 'form-control select2-ajaxselect-courier', 'data-url' => route('admin.users.search')]) !!}
                    </div>
                    <div class="col-md-6">
                        {!! HTML::vselect('manager_id', [ ''  => 'Please select' ], null, ['label' => 'Manager code',  'class' => 'form-control select2-ajaxselect-sales', 'data-url' => route('admin.users.search')]) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>

                <div class="pull-right">
                    <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                    <button class="btn btn-danger btn-rounded close-add-more" data-clearid="#mainPanel" type="button">Close</button>
                </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
