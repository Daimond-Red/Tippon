{{ Form::model($model, ['route' => [ 'modules.appNotifications.update', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
    @include('notification::admin.notifications.form')
{{ Form::close() }}