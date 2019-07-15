
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.posts.store'], 'method' => 'POST', 'files' => true ]) !!}
                @include('post::admin.posts.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
