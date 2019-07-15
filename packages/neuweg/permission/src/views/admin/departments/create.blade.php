
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.departments.store'], 'method' => 'POST', 'files' => true ]) !!}
                @include('permissions::admin.departments.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
