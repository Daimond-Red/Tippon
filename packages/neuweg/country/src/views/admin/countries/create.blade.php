
<div class="kt-portlet__body">
    <div class="kt-section">
        <div class="kt-section__content">

            {!! Form::open([ 'class' => '', 'route' => ['modules.countries.store'], 'method' => 'POST', 'files' => true ]) !!}
                @include('country::admin.countries.form')
            {!! Form::close() !!}
        </div>
    </div>
</div>
