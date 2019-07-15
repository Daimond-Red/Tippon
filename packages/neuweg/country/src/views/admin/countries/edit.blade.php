
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {{ Form::model($model, ['route' => [ 'modules.countries.update', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
            @include('country::admin.countries.form')
            {{ Form::close() }}
        </div>
    </div>
</div>

