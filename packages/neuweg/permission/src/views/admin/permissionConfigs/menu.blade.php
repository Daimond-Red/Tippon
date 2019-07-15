<div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            Menus
        </h3>
    </div>
</div>
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">
            {!! Form::open( [ 'route' => 'modules.departments.permission_store', 'method' => 'POST', 'files' => true, 'id' => 'assignPermission' ]) !!}
                <div class="permissionsList form-group">
                    @include('permissions::admin.permissionConfigs.permissions')
                </div>
                <button class="btn btn-primary btn-rounded" type="submit">Save</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

