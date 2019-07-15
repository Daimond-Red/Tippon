<div class="row">
    <div class="col-md-6">
        {!! HTML::vtext('title', null, ['data-validation' => 'required']) !!}
    </div>
    <div class="col-md-6">
        @if( isset($model) && $model->image )
            {!!  HTML::vimage('image', ['value' => $model->image]) !!}
        @else
            {!! HTML::vimage('image') !!}
        @endif
    </div>
</div>



            

    