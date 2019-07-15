<div class="row">
	<div class="col-6">
		{!! HTML::vtext('name', null, ['data-validation' => 'required']) !!}
	</div>
	<div class="col-6">
		{!! HTML::vtext('std_no', null, ['label' => 'Country Code' , 'data-validation' => 'required']) !!}
	</div>
</div>

<div class="row">
	<div class="col-6">
		{!! HTML::vfile('flag') !!}
	</div>
	
</div>
