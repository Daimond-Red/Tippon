<!DOCTYPE html>


<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Tippon | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="{{ getMediaUrl('admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="{{ getMediaUrl('admin/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="{{ getMediaUrl('admin/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ getMediaUrl('admin/assets/vendors/custom/vendors/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ getMediaUrl('admin/assets/demo/demo12/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ getMediaUrl('admin/assets/media/logos/favicon.ico') }}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{ getImageUrl('admin/assets/media/logos/logo-2-sm.png') }}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="index.html">
								<img alt="Logo" src="{{ getImageUrl('admin/assets/media/logos/logo-12.png') }}">
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
							@include('layouts.sidebar')
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								<ul class="kt-menu__nav ">
									<li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="index.html" class="kt-menu__link "><span class="kt-menu__link-text">Application</span></a></li>
								</ul>
							</div>
						</div>

						<!-- end: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--begin: Search -->
							<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-top-unround dropdown-menu-anim dropdown-menu-lg">
									<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
										<form method="get" class="kt-quick-search__form">
											<div class="input-group">
												<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
												<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
												<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
											</div>
										</form>
										<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
										</div>
									</div>
								</div>
							</div>

							<!--end: Search -->

							<!--begin: Notifications -->
							

							<!--end: Notifications -->

							<!--begin: Quick Actions -->
							

							<!--end: Quick Actions -->

							<!--begin: Cart -->
							

							<!--end: Cart-->

							<!--begin: Quick panel -->
							<div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
								<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
									<i class="flaticon2-cube-1"></i>
								</span>
							</div>

							<!--end: Quick panel -->

							<!--begin: Language bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--langs">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<img class="" src="{{ getImageUrl('admin/assets/media/flags/012-uk.svg') }}" alt="" />
									</span>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
									<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
										<li class="kt-nav__item kt-nav__item--active">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><img src="../assets/media/flags/020-flag.svg" alt="" /></span>
												<span class="kt-nav__link-text">English</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><img src="../assets/media/flags/016-spain.svg" alt="" /></span>
												<span class="kt-nav__link-text">Spanish</span>
											</a>
										</li>
										<li class="kt-nav__item">
											<a href="#" class="kt-nav__link">
												<span class="kt-nav__link-icon"><img src="../assets/media/flags/017-germany.svg" alt="" /></span>
												<span class="kt-nav__link-text">German</span>
											</a>
										</li>
									</ul>
								</div>
							</div>

							<!--end: Language bar -->

							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<div class="kt-header__topbar-user">
										<span class="kt-hidden kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-hidden kt-header__topbar-username kt-hidden-mobile">Sean</span>
										<img alt="Pic" class="kt-radius-100" src="{{ getImageUrl('admin/assets/media/users/300_25.jpg') }}" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden-" alt="Pic" src="{{ getImageUrl('admin/assets/media/users/300_25.jpg') }}" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
										</div>
										<div class="kt-user-card__name">
											Sean Stone
										</div>
										<div class="kt-user-card__badge">
											<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
										</div>
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										
										<div class="kt-notification__custom">
											<a href="javascript:void(0);" target="_blank" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">
									Dashboard </h3>
								<span class="kt-subheader__separator kt-hidden"></span>
								<div class="kt-subheader__breadcrumbs">
									<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
									<span class="kt-subheader__breadcrumbs-separator"></span>
									<a href="" class="kt-subheader__breadcrumbs-link">
										Application </a>

									{{-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> --}}
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">

									<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
										<a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
													<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
													<path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
												</g>
											</svg>

											<!--<i class="flaticon2-plus"></i>-->
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<ul class="kt-nav">
												<li class="kt-nav__section kt-nav__section--first">
													<span class="kt-nav__section-text">Add new:</span>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-graph-1"></i>
														<span class="kt-nav__link-text">Order</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
														<span class="kt-nav__link-text">Event</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-layers-1"></i>
														<span class="kt-nav__link-text">Report</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-calendar-4"></i>
														<span class="kt-nav__link-text">Post</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-file-1"></i>
														<span class="kt-nav__link-text">File</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Subheader -->