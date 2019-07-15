{{ Form::open( [ 'class' => '', 'route' => ['modules.promotionImages.store'], 'method' => 'POST', 'files' => true ]) }}
    @include('promotionImage::admin.promotionImages.form')
{{ Form::close() }}