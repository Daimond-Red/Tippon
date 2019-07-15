<div class="row">
    <div class="col-12">
        <div class="blockquote-style-1">
            <blockquote><p class="base-dark">Personal Details</p></blockquote>
        </div>
        <div class="row">
            <div class="col-4">
                {!! HTML::vtext('name', null, ['data-validation' => 'required']) !!}
            </div>
            <div class="col-4">
                {!! HTML::vtext('email', null, ['label' => 'Email', 'data-validation' => 'required', 'email']) !!}
            </div>
            <div class="col-md-4">
                {!! HTML::vpassword('password') !!}
            </div>
        </div>

        <div class="row">
            
            <div class="col-4">
                {!! HTML::vtext('mobile_no', null, ['label' => 'Mobile', 'data-validation' => 'required', 'class' => 'form-control phone-10-digit' ]) !!}
            </div>
            
            
            {{-- <div class="col-md-6">

                {!! HTML::vselect('type', ['2' => 'Admin', '3' => 'BM', '4' => 'Manager', '5' => 'Athlete' ], null, ['label' => 'User Type']) !!}
            </div> --}}
            {{-- <div class="col-4">
                @if( isset($model) )
                    {!! HTML::vselect('is_enable', [ '' => 'Please select', '0' => 'Disable', '1'=>'Enable' ], null, ['label' => 'Account Status', 'data-validation' => 'required']) !!}
                @else
                    {!! HTML::vselect('is_enable', [ '' => 'Please select', '0' => 'Disable', '1'=>'Enable' ], 1, ['label' => 'Account Status', 'data-validation' => 'required']) !!}
                @endif
            </div> --}}
        </div>
        <div class="row">
            
            
        </div>

    </div>
    {{--  --}}
</div>
@if( !isset($model) )
<div class="pull-right">
    <button type="submit" class="btn btn-primary btn-rounded">Save</button>
</div>
@endif
