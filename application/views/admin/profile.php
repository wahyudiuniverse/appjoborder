<!-- <pre>
    <?php //print_r($data_kandidat); 
    ?>
</pre> -->
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg">
        <img src="<?= base_url() ?>assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
    <div class="row g-4">
        <div class="col-auto">
            <div class="avatar-lg">
                <img src="<?php echo $data_kandidat['file_pasfoto']; ?>" alt="user-img" class="img-thumbnail rounded-circle" />
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1"><?php echo $data_kandidat['nama']; ?></h3>
                <p class="text-white text-opacity-75">NIK: <?php echo $data_kandidat['nik']; ?></br>No HP: <?php echo $data_kandidat['nomor_tlp']; ?></p>
                <div class="hstack text-white-50 gap-1">
                    <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><?php echo $data_kandidat['asal_kota']; ?></div>
                    <div>
                        <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i><?php echo $data_kandidat['alamat_domisili']; ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-12 col-lg-auto order-last order-lg-0">
            <div class="row text text-white-50 text-center">
                <div class="col-lg-12 col-12">
                    <div class="p-2">
                        <p class="fs-14 mb-0">ID Kandidat</p>
                        <h1 class="text-white mb-1"><?php echo $data_kandidat['id']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

    </div>
    <!--end row-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="d-flex profile-wrapper">
                <!-- Nav tabs -->
                <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#data-diri-tab" role="tab">
                            <i class="ri-user-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Data Diri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" data-bs-toggle="tab" href="#project" role="tab">
                            <i class="ri-briefcase-5-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Project</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                            <i class="ri-parent-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Kontak Darurat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                            <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Dokumen</span>
                        </a>
                    </li>
                </ul>
                <div class="flex-shrink-0">
                    <button hidden onclick="edit_profile()" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</button>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-4 text-muted">
                <div class="tab-pane fade show active" id="data-diri-tab" role="tabpanel">

                    <!-- <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-5">Complete Your Profile</h5>
                                    <div class="progress animated-progress custom-progress progress-label">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                            <div class="label">30%</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                    <!-- card data diri -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Info Data Diri</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 30%">Nama Lengkap <span class="icon-verify-nama"></span></th>
                                                <td id="nama_lengkap_tabel"><?php echo $data_kandidat['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">NIK</th>
                                                <td id="nik_name_tabel"><?php echo $data_kandidat['nik']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Jenis Kelamin</th>
                                                <td id="gender_name_tabel"><?php echo $data_kandidat['jenis_kelamin']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tempat Lahir</th>
                                                <td id="tempat_lahir_tabel"><?php echo $data_kandidat['tempat_lahir']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tanggal Lahir</th>
                                                <td id="tanggal_lahir_tabel"><?php echo $data_kandidat['tanggal_lahir']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Asal Kota Kandidat</th>
                                                <td id="asal_kota_tabel"><?php echo $data_kandidat['asal_kota']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nomor HP/Whatsapp</th>
                                                <td>
                                                    <span id="nomor_kontak_tabel"><?php echo $data_kandidat['nomor_tlp']; ?></span>
                                                    <?php if ($data_kandidat['nomor_tlp'] == "") {
                                                    } else { ?>
                                                        <button id="button_send_whatsapp" class="btn btn-sm btn-outline-success ladda-button mx-1" data-style="expand-right">Send Whatsapp</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status Menikah</th>
                                                <td id="status_menikah_tabel"><?php echo $data_kandidat['status_nikah']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat Lengkap</th>
                                                <td id="alamat_tabel"><?php echo $data_kandidat['alamat_domisili']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->

                    <!-- card Pengalaman Kerja -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Pengalaman Kerja</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 30%">Pengalaman Kerja <span class="icon-verify-nama"></span></th>
                                                <td id="pengalaman_tabel"><?php echo $data_kandidat['pengalaman_kerja']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Contact Person Perusahaan Sebelumnya </th>
                                                <td id="kontak_person_sebelumnya_tabel"><?php echo $data_kandidat['kontak_person_sebelumnya']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="tab-pane fade" id="project" role="tabpanel">
                    <!-- card Project -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Info Project dan Posisi/Jabatan</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 30%">Project<span class="icon-verify-nama"></span></th>
                                                <td id="project_tabel"><?php echo $data_kandidat['project_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Posisi/Jabatan</th>
                                                <td id="jabatan_tabel"><?php echo $data_kandidat['jabatan_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Area</th>
                                                <td id="area_tabel"><?php echo $data_kandidat['nama_area']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Sumber Info</th>
                                                <td id="sumber_info_tabel"><?php echo $data_kandidat['nama_sumber_info']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Rekruter</th>
                                                <td id="rekruter_tabel"><?php echo $data_kandidat['nama_rekruter']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Region</th>
                                                <td id="region_tabel"><?php echo $data_kandidat['region']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!--end tab-pane-->
                <div class="tab-pane fade" id="projects" role="tabpanel">
                    <!-- card Kontak Darurat -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Info Kontak Darurat</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 30%">Nama Kontak Darurat<span class="icon-verify-nama"></span></th>
                                                <td id="nama_kondar_tabel"><?php echo $data_kandidat['nama_kontak_darurat']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Hubungan Kontak Darurat</th>
                                                <td id="hubungan_kondar_tabel"><?php echo $data_kandidat['nama_hubungan_kondar']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nomor HP/Whatsapp Kontak Darurat</th>
                                                <td>
                                                    <span id="nomor_kontak_darurat_tabel"><?php echo $data_kandidat['nomor_tlp_kontak_darurat']; ?></span>
                                                    <?php if ($data_kandidat['nomor_tlp_kontak_darurat'] == "") {
                                                    } else { ?>
                                                        <button id="button_send_whatsapp_kondar" class="btn btn-sm btn-outline-success ladda-button mx-1" data-style="expand-right">Send Whatsapp</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!--end tab-pane-->
                <div class="tab-pane fade" id="documents" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="card-title flex-grow-1 mb-0">Dokumen Kandidat</h5>
                                <!-- <div class="flex-shrink-0">
                                    <input class="form-control d-none" type="file" id="formFile">
                                    <label for="formFile" class="btn btn-danger"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload File</label>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">Jenis File</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- file pasfoto -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_pasfoto'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File Pasfoto
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("pasfoto")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file ktp -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_ktp'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File KTP
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("ktp")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file cv -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_cv'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File CV
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("cv")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file kk -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_kk'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File KK
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("kk")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file npwp -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_npwp'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File NPWP
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("npwp")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file skck -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_skck'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File SKCK
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("skck")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file ijazah -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_ijazah'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File Ijazah
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("ijazah")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file sim -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_sim'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File SIM A/C
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("sim")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file paklaring -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_paklaring_1'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File Paklaring
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("paklaring")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                                <!-- file dokumen pendukung -->
                                                <tr>
                                                    <?php
                                                    $file_dokumen = $data_kandidat['file_lainnya'];
                                                    if ($file_dokumen == "") {
                                                        $ext_file_dokumen = "Belum Upload";
                                                    } else {
                                                        $file_dokumen_explode = explode(".", $file_dokumen);
                                                        $ext_file_dokumen = $file_dokumen_explode[1];
                                                    }
                                                    ?>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm">
                                                                <div class="avatar-title bg-success-subtle text-primary rounded fs-20 material-shadow">
                                                                    <?php if ($ext_file_dokumen == "Belum Upload") { ?>
                                                                        <i class="ri-file-damage-line"></i>
                                                                    <?php } else if ($ext_file_dokumen == "jpg" || $ext_file_dokumen == "jpeg" || $ext_file_dokumen == "png") { ?>
                                                                        <i class="ri-image-2-fill"></i>
                                                                    <?php } else { ?>
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="fs-15 mb-0">File Dokumen Pendukung
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $ext_file_dokumen; ?> File</td>
                                                    <td>
                                                        <?php if ($ext_file_dokumen == "Belum Upload") {
                                                        } else {
                                                        ?>
                                                            <button onclick='open_dokumen("pendukung")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Buka Dokumen</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="text-center mt-3">
                                        <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end tab-pane-->
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

<!-- Tombol Send Whatsapp -->
<script type="text/javascript">
    document.getElementById("button_send_whatsapp").onclick = function(e) {
        // alert("masuk button send whatsapp");
        var nomor_kontak = '<?php echo $this->Kandidat_model->clean_post($data_kandidat['nomor_tlp']); ?>';

        window.open("https://wa.me/62" + nomor_kontak, "_blank");
    };
</script>

<!-- Tombol Send Whatsapp Kontak Darurat -->
<script type="text/javascript">
    document.getElementById("button_send_whatsapp_kondar").onclick = function(e) {
        // alert("masuk button send whatsapp");
        var nomor_kontak = '<?php echo $this->Kandidat_model->clean_post($data_kandidat['nomor_tlp_kontak_darurat']); ?>';

        window.open("https://wa.me/62" + nomor_kontak, "_blank");
    };
</script>

<!-- Tombol Edit Profile -->
<script type="text/javascript">
    function edit_profile() {
        alert("under construction");
    }
</script>

<!-- Tombol Open Dokumen -->
<script type="text/javascript">
    function open_dokumen(jenis_dokumen) {
        if (jenis_dokumen == "ktp") {
            var link_dokumen = '<?php echo $data_kandidat['file_ktp']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "cv") {
            var link_dokumen = '<?php echo $data_kandidat['file_cv']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "kk") {
            var link_dokumen = '<?php echo $data_kandidat['file_kk']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "pasfoto") {
            var link_dokumen = '<?php echo $data_kandidat['file_pasfoto']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "npwp") {
            var link_dokumen = '<?php echo $data_kandidat['file_npwp']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "skck") {
            var link_dokumen = '<?php echo $data_kandidat['file_skck']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "ijazah") {
            var link_dokumen = '<?php echo $data_kandidat['file_ijazah']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "sim") {
            var link_dokumen = '<?php echo $data_kandidat['file_sim']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "paklaring") {
            var link_dokumen = '<?php echo $data_kandidat['file_paklaring_1']; ?>';
            window.open(link_dokumen, "_blank");
        } else if (jenis_dokumen == "pendukung") {
            var link_dokumen = '<?php echo $data_kandidat['file_lainnya']; ?>';
            window.open(link_dokumen, "_blank");
        }
    }
</script>

<script>
    // var id_kandidat = '<?php echo $id_kandidat; ?>';
    // alert(id_kandidat);
</script>