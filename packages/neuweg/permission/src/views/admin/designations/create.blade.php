<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.designations.store', $model->id], 'method' => 'POST', 'files' => true ]) !!}
                @include('permissions::admin.designations.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
