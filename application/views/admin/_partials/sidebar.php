<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
	<!-- LOGO -->
	<div class="navbar-brand-box">
		<!-- Dark Logo-->
		<a href="<?= base_url() ?>" class="logo logo-dark">
			<span class="logo-sm">
				<img src="<?= base_url() ?>assets/images/logo/logo_onecorp.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="<?= base_url() ?>assets/images/logo-dark.png" alt="" height="25">
			</span>
		</a>
		<!-- Light Logo-->
		<a href="<?= base_url() ?>" class="logo logo-light">
			<span class="logo-sm">
				<img src="<?= base_url() ?>assets/images/logo/logo_onecorp.png" alt="" height="22">
			</span>
			<span class="logo-lg">
				<img src="<?= base_url() ?>assets/images/logo-light.png" alt="" height="25">
			</span>
		</a>
		<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
			<i class="ri-record-circle-line"></i>
		</button>
	</div>

	<div class="dropdown sidebar-user m-1 rounded">
		<button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="d-flex align-items-center gap-2">
				<img class="rounded header-profile-user" src="<?= base_url() ?>assets/images/users/avatar-1.jpg" alt="Header Avatar">
				<span class="text-start">
					<span class="d-block fw-medium sidebar-user-name-text"><?php echo $this->session->userdata('fullname'); ?></span>
					<span class="d-block fs-14 sidebar-user-name-sub-text"><span class="align-middle">NIP: <?php echo $this->session->userdata('employee_id'); ?></span></span>
				</span>
			</span>
		</button>
		<div class="dropdown-menu dropdown-menu-end">
			<!-- item-->
			<h6 class="dropdown-header">Welcome <?php echo $this->session->userdata('fullname'); ?>!</h6>
			<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
			<a class="dropdown-item" href="#"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
			<!-- <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a> -->
			<a class="dropdown-item" href="<?= base_url() ?>auth/logout"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
		</div>
	</div>
	<div id="scrollbar">
		<div class="container-fluid">


			<div id="two-column-menu">
			</div>
			<ul class="navbar-nav" id="navbar-nav">
				<li class="menu-title"><span data-key="t-menu">Menu</span></li>
				<li class="nav-item">
					<a class="nav-link menu-link" href="<?= base_url() ?>dashboard">
						<i class="ri-dashboard-2-line"></i> <span data-key="t-crm">Dashboard</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
						<i class="ri-archive-line"></i> <span data-key="t-dashboards">Master Table</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarDashboards">
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>admin/master_table/interviewer" class="nav-link" data-key="t-analytics"> Interviewer </a>
							</li>
						</ul>
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>admin/master_table/provinsi" class="nav-link" data-key="t-analytics"> Provinsi </a>
							</li>
						</ul>
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>admin/master_table/area" class="nav-link" data-key="t-analytics"> Area </a>
							</li>
						</ul>
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>admin/master_table/region" class="nav-link" data-key="t-analytics"> Region </a>
							</li>
						</ul>
					</div>
				</li> <!-- end Master Table Menu -->

				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarJobOrder" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarJobOrder">
						<i class="ri-briefcase-4-line"></i> <span data-key="t-job-order">Job Order</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarJobOrder">
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>job_order" class="nav-link" data-key="t-job-order"> Job Order</a>
							</li>
						</ul>
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>job_order_report" class="nav-link" data-key="t-job-order"> Job Order Report</a>
							</li>
						</ul>
					</div>
				</li> <!-- end Job Order Menu -->

				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarKandidat" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKandidat">
						<i class="ri-team-fill"></i> <span data-key="t-kandidat">Kandidat</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarKandidat">
						<ul class="nav nav-sm flex-column">
							<li class="nav-item">
								<a href="<?= base_url() ?>kandidat" class="nav-link" data-key="t-data-kandidat"> Data Kandidat </a>
							</li>
						</ul>
					</div>
				</li> <!-- end Kandidat Menu -->

			</ul>
		</div>
		<!-- Sidebar -->
	</div>

	<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
