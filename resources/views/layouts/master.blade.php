@include('layouts.header')
<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
		<div class="kt-subheader-search font-blue-ebonyclay">

			<div class="kt-subheader kt-grid__item" id="kt_subheader">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">
						Dashboard </h3>
					<span class="kt-subheader__separator kt-hidden"></span>

					@yield('pageBar')

				</div>
			</div>
			
		</div>
		<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

			@yield('content')

		</div>
	</div>
@include('layouts.footer')