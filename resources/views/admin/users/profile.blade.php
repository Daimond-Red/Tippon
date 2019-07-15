@extends('layouts.master')

@section('pageBar')
    <ul class="breadcrumb">
        <li class="breadcrumb-item text-capitalize">
            <h3>User Profile</h3>
        </li>
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
        <li class="breadcrumb-item"><a href="#">User Profile</a></li>
    </ul>
@stop

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="prtm-full-block text-center">
                <div class="pad-all-md">
                    <div class="mrgn-b-lg">
                        <img class="img-responsive img-circle display-ib" src="{{ getImageUrl($model->image, 'user') }}" width="140" height="140" alt="user profile image">
                    </div>
                    <h5> {{$model->name}} </h5>
                    <p>{{ $model->getDesignationDisplayName() }}</p>
                </div>

                <div class="text-left pad-all-md">
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Name</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->name }}</div>
                        </div>
                    </div>
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Employee ID</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->emp_id }}</div>
                        </div>
                    </div>
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Email</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->email }}</div>
                        </div>
                    </div>
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Mobile</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->mobile_no }}</div>
                        </div>
                    </div>
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Department</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->getRoleDepartmentDisplayNames() }}</div>
                        </div>
                    </div>
                    <div class="mrgn-b-xs">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">Designation</div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 pad-all-none base-dark">{{ $model->getDesignationDisplayName() }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
            <div class="prtm-block">
                <div class="mrgn-b-lg">
                    <div class="row">
                        <div class="col-xs-4 col-sm-5 col-md-5 col-lg-5">
                            <h3 class="mrgn-all-none">Profile Details</h3> </div>
                        <div class="profile-tabs line-slide-tab col-xs-8 col-sm-7 col-md-7 col-lg-7 text-right">
                            <ul class="nav nav-tabs no-border">
                                <li class="active"><a data-toggle="tab" href="#profile-tab" aria-expanded="false">Profile</a></li>
                                {{--<li><a data-toggle="tab" href="#dcr-tab" aria-expanded="true">Daily Call Records</a></li>--}}
                                {{--<li><a data-toggle="tab" href="#e-tab" aria-expanded="true">E-Modules</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="profile-tab" class="tab-pane fade in active">
                        {{ Form::model($model, ['route' => [ 'admin.users.update', $model->id ], 'method' => 'put', 'files' => true, 'class' => '' ] ) }}
                            <div class="row">
                                <div class="col-md-6">
                                    {!! HTML::vtext('emp_id', null, ['label' => 'Employee ID']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! HTML::vselect('status', [ '' => 'Please select', 'Disable', 'Enable' ], null, ['label' => 'Account Status']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! HTML::vtext('name') !!}
                                </div>
                                <div class="col-md-6">
                                    {!! HTML::vfile('image') !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! HTML::vtext('email', null, ['label' => 'Email']) !!}
                                </div>
                                <div class="col-md-6">
                                    @if(! isset($model) )
                                        {!! HTML::vtext('password', null, ['label' => 'Password']) !!}
                                    @else
                                        {!! HTML::vtext('password', '') !!}
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! HTML::vtext('mobile_no', null, ['label' => 'Mobile']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! HTML::vselect('is_allowed_for_app', ['' => 'Please select', 'No', 'Yes'], null, ['label' => 'Is App Login Allowed?']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! HTML::vselect('state', [ optional($model->stateRel)->id => optional($model->stateRel)->title ], null, ['label' => 'State', 'class' => 'form-control select2-ajaxselect', 'data-url' => route('admin.states.search', ['country_id' => \App\State::$india_id]) ]) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! HTML::vselect('head_quarter', [
                                    optional($model->headQuarterRel)->id => optional($model->headQuarterRel)->title
                                    ], null,
                                    [
                                        'label' => 'Head Quarter',
                                        'class' => 'form-control activity-select2-ajaxselect',
                                        'data-url' => route('admin.headQuarters.search', ['state_id', $model->state_id])
                                    ]) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Assign Location</label>
                                        <br><label id="zone-not-found">No records found</label>
                                        @foreach( \App\Zone::all() as $zone )
                                            <div class="">
                                                <label class="zones-input head{{$zone->headQuarter_id}}"  @if(! (isset($zoneIds) && in_array($zone->id, $zoneIds)) ) style="display: none"  @endif >
                                                    @if( isset($zoneIds) )
                                                        <input type="checkbox" name="zones[]" value="{{$zone->id}}" <?php if(in_array($zone->id, $zoneIds)) echo 'checked'; ?>>
                                                    @else
                                                        <input type="checkbox" name="zones[]" value="{{$zone->id}}">
                                                    @endif
                                                    <span class="mrgn-l-xs display-ib">{{ $zone->title }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Update Profile</button>
                        {{ Form::close() }}
                    </div>

                    {{--<div id="e-tab" class="tab-pane fade in">--}}

                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $(window).load(function() {
            $('.user-menu').addClass('active');

            $('body').on('select2:select', '#state', function(){
                var val = $(this).val();

                var dataUrl = '{{route('admin.headQuarters.search')}}?state_id='+val;

                $('#head_quarter').select2({
                    width: "off",
                    ajax: {
                        url: dataUrl,
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term, // search term
                                page: params.page
                            };
                        },
                        processResults: function(data, page) {
                            return {
                                results: data.items
                            };
                        },
                        cache: true
                    }
                });
                $('#head_quarter').html('');

                $('.zones-input').hide();
                $('#zone-not-found').show();

            });

            $('body').on('select2:select', '#head_quarter', function (e) {
                var data = e.params.data;
                $('.zones-input').hide();

                if(! $('.head'+data.id).length ) {
                    $('#zone-not-found').show();
                } else {
                    $('#zone-not-found').hide();
                }

                $('.head'+data.id).show();
            });

            $('#state').trigger('select2:select');

            $('#head_quarter').html('<option selected value="{{optional($model->headQuarterRel)->id}}"> {{optional($model->headQuarterRel)->title}} </option>');

            if( $('.head{{$zone->headQuarter_id}}').length ) {
                $('#zone-not-found').hide();
                $('.head{{$zone->headQuarter_id}}').show();
            }

        });

    </script>
@stop
