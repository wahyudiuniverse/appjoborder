<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> -->
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-xl-12">
        <div class="card crm-widget">
            <div class="card-body p-0">
                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                    <div class="col">
                        <div class="py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Kandidat Hari Ini <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-group-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="counter-value" data-target="<?php echo $jumlah_kandidat_hari_ini; ?>">0</span> orang</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Kandidat Bulan Ini <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-team-line display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="counter-value" data-target="<?php echo $jumlah_kandidat_bulan_ini; ?>">0</span> orang</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-md-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Kandidat <i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-team-fill display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="counter-value" data-target="<?php echo $jumlah_all_kandidat;?>">0</span> orang</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Vacant <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-add-fill display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="counter-value" data-target="0">0</span> orang</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col">
                        <div class="mt-3 mt-lg-0 py-4 px-3">
                            <h5 class="text-muted text-uppercase fs-13">Total Fulfill <i class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i></h5>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <i class="ri-user-follow-fill display-6 text-muted cfs-22"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h2 class="mb-0 cfs-22"><span class="counter-value" data-target="0">0</span> orang</h2>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-xs-12">
        <div class="card card-height-100">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Overview Jumlah Kandidat</h4>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Current Year<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Last Week</a>
                            <a class="dropdown-item" href="#">Last Month</a>
                            <a class="dropdown-item" href="#">Current Year</a>
                        </div>
                    </div>
                </div>
            </div><!-- end card header -->
            <div class="card-body px-0">
                <!-- <ul class="list-inline main-chart text-center mb-0">
                    <li class="list-inline-item chart-border-left me-0 border-0">
                        <h4 class="text-primary">$584k <span class="text-muted d-inline-block fs-13 align-middle ms-2">Revenue</span></h4>
                    </li>
                    <li class="list-inline-item chart-border-left me-0">
                        <h4>$497k<span class="text-muted d-inline-block fs-13 align-middle ms-2">Expenses</span>
                        </h4>
                    </li>
                    <li class="list-inline-item chart-border-left me-0">
                        <h4><span data-plugin="counterup">3.6</span>%<span class="text-muted d-inline-block fs-13 align-middle ms-2">Profit Ratio</span></h4>
                    </li>
                </ul> -->

                <div id="revenue-expenses-charts" data-colors='["--vz-success", "--vz-danger"]' data-colors-minimal='["--vz-primary", "--vz-info"]' data-colors-interactive='["--vz-info", "--vz-primary"]' data-colors-galaxy='["--vz-primary", "--vz-secondary"]' data-colors-classic='["--vz-primary", "--vz-secondary"]' class="apex-charts" dir="ltr"></div>
            </div>
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->