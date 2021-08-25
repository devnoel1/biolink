<!doctype html>
<html lang="en" class="">


<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<!--favicon-->
	<link rel="icon" href="{{ asset('uploads/favicon/'.settings()->favicon ) }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('dashboard/v/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('dashboard/v/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('dashboard/v/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('dashboard/v/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('dashboard/v/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset("dashboard/v/js/pace.min.js") }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('dashboard/v/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('dashboard/v/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('dashboard/v/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('dashboard/v/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('dashboard/v/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('dashboard/v/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('dashboard/v/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboard/v/plugins/notifications/css/lobibox.min.css') }}" />
	<title>{{ settings()->title }}</title>
    @yield('styles')
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					@if (settings()->logo)
                        <img src="{{ asset('uploads/logo/'.settings()->logo) }}" class="logo-icon" alt="logo icon">
                        @endif
				</div>
				<div>
					<h4 class="logo-text">{{ settings()->title }}</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li>
					<a href="{{ url('admin/dashboard', []) }}">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/users', []) }}">
						<div class="parent-icon"><i class='lni lni-users'></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/links', []) }}">
						<div class="parent-icon"><i class='bx bx-link'></i>
						</div>
						<div class="menu-title">Links</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/plans', []) }}">
						<div class="parent-icon"><i class='bx bxs-cube'></i>
						</div>
						<div class="menu-title">Plans</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/payments', []) }}">
						<div class="parent-icon"><i class='bx bx-dollar-circle'></i>
						</div>
						<div class="menu-title">Payments</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/statistics', []) }}">
						<div class="parent-icon"><i class='bx bx-line-chart'></i>
						</div>
						<div class="menu-title">Statistics</div>
					</a>
				</li>
                <li>
					<a href="{{ url('admin/website-settings', []) }}">
						<div class="parent-icon"><i class='bx bx-wrench'></i>
						</div>
						<div class="menu-title">Web Settings</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>


					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large " style="display: none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large" style="display: none">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="dashboard/v/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
																			</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('dashboard/v/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								{{-- <p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p> --}}
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ url('logout', []) }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@yield('content')

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
    <script src="{{ asset('dashboard/v/js/jquery.min.js') }}"></script>
	<script src="{{ asset('dashboard/v/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->

	<script src="{{ asset('dashboard/v/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!-- highcharts js -->
	 <script src="{{ asset('dashboard/v/plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/highcharts-more.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/variable-pie.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/solid-gauge.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/highcharts-3d.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/cylinder.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/funnel3d.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/exporting.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/export-data.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/highcharts/js/accessibility.js') }}"></script>
	<script src="{{ asset('dashboard/v/js/index4.js') }}"></script>
    <script src="{{ asset('dashboard/v/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('dashboard/v/plugins/notifications/js/notifications.min.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('dashboard/v/js/app.js') }}"></script>

        @if (Session::has('message'))
        <script>
            Lobibox.notify("{{ Session::get('type') }}", {
		pauseDelayOnHover: true,
		size: 'mini',
		rounded: true,
		delayIndicator: false,
		continueDelayOnInactiveTab: false,
		position: 'top right',
		msg: "{{ Session::get('message') }}"
	});
        </script>
        @endif

        @yield('scripts')



</body>

</html>
