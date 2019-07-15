<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">
            {!! Form::open([ 'class' => '', 'route' => [ 'modules.permissionGroups.permissionGroupOptionsStore', $model->id ], 'method' => 'POST', 'files' => true ]) !!}
            {!! HTML::vtext('name', null, ['data-validation' => 'required', 'label' => 'Name' ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
