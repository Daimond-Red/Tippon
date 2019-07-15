@if( isset($designation_select)  && $designation_select )

    @if( isset($role_name) )
        {!! HTML::vselect('designation', $designation_select  , $role_name, ['data-content' => '.permissionsList']) !!}
    @else
        {!! HTML::vselect('designation', $designation_select  , null, ['data-content' => '.permissionsList']) !!}
    @endif

@else
    {!! HTML::vselect('designation', ['Please select...'], null, ['data-content' => '.permissionsList']) !!}
@endif