{!! Form::model($model, ['route' => [ 'modules.promotionImages.update',  $model->id ], 'method' => 'put', 'files' => true ] ) !!}
@include('promotionImage::admin.promotionImages.form')
{!!  Form::close() !!}