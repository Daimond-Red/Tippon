<div class="kt-portlet__head">
    <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">
            Edit Department
        </h3>
    </div>
</div>
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {{ Form::model($model, ['route' => [ 'modules.permissionGroups.permissionGroupOptionUpdate', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
            @include('permissions::admin.permissions.form')
            {{ Form::close() }}
        </div>
    </div>
</div>
