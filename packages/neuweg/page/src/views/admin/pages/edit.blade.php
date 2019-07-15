
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {{ Form::model($model, ['route' => [ 'modules.pages.update', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
            @include('page::admin.pages.form')
            {{ Form::close() }}
        </div>
    </div>
</div>

