<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

	<!-- begin:: Aside Menu -->
	<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
		<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
			<ul class="kt-menu__nav ">
				<li class="kt-menu__item  home-menu" aria-haspopup="true">
					<a href="{{ route('admin.dashboard')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-protection"></i>
						<span class="kt-menu__link-text">Dashboard</span>
					</a>
				</li>
				<li class="kt-menu__item kt-menu__item--submenu users-menu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
						<i class="kt-menu__link-icon flaticon-users-1"></i>
						<span class="kt-menu__link-text">Users</span>
						<i class="kt-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;">
						<span class="kt-menu__arrow"></span>
						<ul class="kt-menu__subnav">
							<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
								<span class="kt-menu__link"><span class="kt-menu__link-text">Users</span>
								</span>
							</li>
							<li class="kt-menu__item create-user-menu">
								<a href="{{ route('admin.users.create') }}" class="kt-menu__link ">
									<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
									<span class="kt-menu__link-text">Create User</span>
								</a>
							</li>
							<li class="kt-menu__item users-list-menu">
								<a href="{{ route('admin.users.index') }}" class="kt-menu__link ">
									<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
									<span class="kt-menu__link-text">Users</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<li class="kt-menu__item  post-menu" aria-haspopup="true">
					<a href="{{ route('modules.posts.index')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-layers"></i>
						<span class="kt-menu__link-text">Posts</span>
					</a>
				</li>
				<li class="kt-menu__item  notification-menu" aria-haspopup="true">
					<a href="{{ route('modules.appNotifications.index')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-bell"></i>
						<span class="kt-menu__link-text">Notifications</span>
					</a>
				</li>

				<li class="kt-menu__item  country-menu" aria-haspopup="true">
					<a href="{{ route('modules.countries.index')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-file"></i>
						<span class="kt-menu__link-text">Countries</span>
					</a>
				</li>
				<li class="kt-menu__item  promotion-menu" aria-haspopup="true">
					<a href="{{ route('modules.promotionImages.index')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-image-file"></i>
						<span class="kt-menu__link-text">Promotion Images</span>
					</a>
				</li>
				<li class="kt-menu__item  page-menu" aria-haspopup="true">
					<a href="{{ route('modules.pages.index')}}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-open-text-book"></i>
						<span class="kt-menu__link-text">Pages</span>
					</a>
				</li>
				{{-- <li class="kt-menu__item  dropdown-master-menu" aria-haspopup="true">
					<a href="{{ route('admin.masters.index') }}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon-squares-3"></i>
						<span class="kt-menu__link-text">Dropdown Master</span>
					</a>
				</li>
				<li class="kt-menu__item  store-menu" aria-haspopup="true">
					<a href="{{ route('admin.stores.index') }}" class="kt-menu__link ">
						<i class="kt-menu__link-icon flaticon2-box"></i>
						<span class="kt-menu__link-text">Stores</span>
					</a>
				</li>
				

				<li class="kt-menu__item kt-menu__item--submenu permission-menu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
					<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
						<i class="kt-menu__link-icon flaticon2-gear"></i>
						<span class="kt-menu__link-text">Permission Master</span>
						<i class="kt-menu__ver-arrow la la-angle-right"></i>
					</a>
					<div class="kt-menu__submenu " kt-hidden-height="80" style="display: none; overflow: hidden;">
						<span class="kt-menu__arrow"></span>
						<ul class="kt-menu__subnav">
							<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
								<span class="kt-menu__link"><span class="kt-menu__link-text">Permission Master</span>
								</span>
							</li>
							<li class="kt-menu__item department-menu">
								<a href="{{ route('modules.departments.index') }}" class="kt-menu__link ">
									<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
									<span class="kt-menu__link-text">Departments</span>
								</a>
							</li>
							<li class="kt-menu__item permission-group-menu">
								<a href="{{ route('modules.permissionGroups.index') }}" class="kt-menu__link ">
									<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
									<span class="kt-menu__link-text">Permissions</span>
								</a>
							</li>
							<li class="kt-menu__item permission-create-menu">
								<a href="{{ route('modules.departments.permission') }}" class="kt-menu__link ">
									<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
									<span class="kt-menu__link-text">Configurations</span>
								</a>
							</li>
						</ul>
					</div>
				</li> --}}
				
			</ul>
		</div>
	</div>

	<!-- end:: Aside Menu -->
</div>
