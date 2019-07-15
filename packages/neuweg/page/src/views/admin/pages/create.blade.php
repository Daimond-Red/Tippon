
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.pages.store'], 'method' => 'POST', 'files' => true ]) !!}
                @include('page::admin.pages.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
