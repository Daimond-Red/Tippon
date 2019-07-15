
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.permissionGroups.store'], 'method' => 'POST', 'files' => true ]) !!}
                @include('permissions::admin.permissionGroups.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
