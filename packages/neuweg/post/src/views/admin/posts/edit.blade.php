
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {{ Form::model($model, ['route' => [ 'modules.posts.update', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
            @include('post::admin.posts.form')
            {{ Form::close() }}
        </div>
    </div>
</div>

