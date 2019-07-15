@extends('layouts.master')

@section('pageBar')
    <ul class="breadcrumb">
        <li class="breadcrumb-item text-capitalize">
            <h3>Update Password</h3>
        </li>
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Update Password</a></li>
    </ul>
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">

            <div class="prtm-block">

                {!! Form::open( [ 'route' => 'admin.users.updatePasswordStore', 'method' => 'POST', 'files' => true ]) !!}

                {!! HTML::vtext('old_password', null, ['label' => 'Current Password', 'data-validation' => 'required']) !!}
                {!! HTML::vtext('password', null, ['label' => 'Confirm Password', 'data-validation' => 'length', 'data-validation-length' => "min8" ]) !!}
                {!! HTML::vtext('password_confirmation', null, ['label' => 'New Password', 'data-validation' => "confirmation" ]) !!}

                <button class="btn btn-primary">Update</button>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop

@section('script')
    <script>
        $(document).ready(function(){

        });
    </script>
@stop