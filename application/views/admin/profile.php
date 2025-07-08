<!-- <pre>
    <?php //print_r($this->session->userdata()); 
	?>
    <?php //print_r($this->session->userdata('fullname')); 
	?>
    <?php //$getloc = json_decode(file_get_contents("http://ipinfo.io/"));
	//print_r($getloc);
	// echo $getloc; //to get city
	?>
</pre> -->

<?php $isi_session = $this->session->userdata(); ?>

<!-- <pre>
    <?php //print_r($isi_session['fullname']); 
	?>
</pre> -->

<!-- MODAL MULAI SCREENING -->
<div class="modal fade" id="mulaiScreeningModal" tabindex="-1" role="dialog" aria-labelledby="mulaiScreeningModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="mulaiScreeningLabel">Mulai Proses Screening Kandidat</h5>
				<button onclick="close_mulai_screening()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-mulai-screening">
					<div class="container" id="container_modal_mulai_screening">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td colspan="2" class="bg-dark text-white"><strong>Mapping Project Vacant</strong></td>
									</tr>
									<tr>
										<td style='width:25%'><strong>Nama Kandidat</strong></td>
										<td style='width:75%'>
											<?php echo $data_kandidat['nama']; ?>
											<input hidden id="company_id_modal" name="company_id_modal" type="text">
											<input hidden id="company_name_modal" name="company_name_modal" type="text">
										</td>
									</tr>
									<tr>
										<td><strong>Project <font color="#FF0000">*</font></strong></td>
										<td>
											<select name="project_modal" id="project_modal" class="form-control dropdown-mulai-screening">
												<option value="">Pilih Project</option>
												<!-- <?php //foreach ($all_project as $project) : 
														?>
                                                    <option value="<?php //echo $project['project_id']; 
																	?>" style="text-wrap: wrap;">
                                                        <?php //echo "[" . $project['priority'] . "] " . $project['title']; 
														?>
                                                    </option>
                                                <?php //endforeach; 
												?> -->
											</select>
											<span id='pesan_project_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>Posisi/Jabatan <font color="#FF0000">*</font></strong></td>
										<td>
											<select name="jabatan_modal" id="jabatan_modal" class="form-control dropdown-mulai-screening">
												<option value="" style="text-wrap: wrap;">Pilih Jabatan (Pilih Project Dulu)</option>
											</select>
											<span id='pesan_jabatan_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>Penempatan (Request - Vacant - Fulfill) <font color="#FF0000">*</font></strong></td>
										<td>
											<select name="kota_input" id="kota_input" class="form-control dropdown-mulai-screening">
												<option value="" style="text-wrap: wrap;">Pilih Area (Pilih Jabatan Dulu)</option>
											</select>
											<span id='pesan_penempatan'></span>
										</td>
									</tr>
									<tr>
										<td><strong>Kategori Karyawan <font color="#FF0000">*</font></strong></td>
										<td>
											<select class="form-control dropdown-mulai-screening" name="location_id" id="location_id">
												<option value="0" style="text-wrap: wrap;">Pilih Kategori Karyawan</option>
												<option value="1" style="text-wrap: wrap;">In House</option>
												<option value="2" style="text-wrap: wrap;">Area</option>
												<option value="3" style="text-wrap: wrap;">Ratecard</option>
												<option value="4" style="text-wrap: wrap;">Project</option>
												<option value="5" style="text-wrap: wrap;">Freelance/magang</option>
											</select>
											<span id='pesan_kategori_modal'></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-mulai-screening"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_mulai_screening()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button onclick="mulai_screening()" id="button_mulai_screening" type='button' class='btn btn-primary'>Mulai Proses Screening</button>
			</div>
		</div>
	</div>
</div>

<!-- MODAL VERIFIKASI SCREENING -->
<div class="modal fade" id="verifikasiScreeningModal" tabindex="-1" role="dialog" aria-labelledby="verifikasiScreeningModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="verifikasiScreeningLabel">Verifikasi Dokumen Kandidat</h5>
				<button onclick="close_verifikasi_screening()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-verifikasi-screening">
					<div class="container" id="container_modal_verifikasi_screening">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<!-- <tr>
                                        <td colspan="2" class="bg-dark text-white"><strong>Verifikasi Dokumen Kandidat</strong></td>
                                    </tr> -->
									<tr>
										<td style='width:25%'><strong>Nama Kandidat <span class="status_verifikasi_nama_profile"><?php echo $status_verifikasi_nama; ?></span></strong></td>
										<td style='width:50%'>
											<input id="nama_modal_verifikasi" name="nama_modal_verifikasi" type="text" class="form-control" value="<?php echo $data_kandidat['nama']; ?>">
											<input hidden id="tipe_dokumen" name="tipe_dokumen" type="text">
											<!-- <input hidden id="company_name_modal" name="company_name_modal" type="text"> -->
										</td>
										<td style='width:25%'>
											<button onclick="cancel_verifikasi_screening('nama')" type='button' class='btn btn-sm btn-danger'>Tidak Sesuai</button>
											<button onclick="save_verifikasi_screening('nama')" type='button' class='btn btn-sm btn-success'>Sesuai</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div hidden id="verifikasi_ktp_modal" class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td style='width:25%'><strong>NIK/Nomor KTP <span class="status_verifikasi_ktp_profile"><?php echo $status_verifikasi_ktp; ?></span></strong></td>
										<td style='width:50%'>
											<input id="nik_modal_verifikasi" name="nik_modal_verifikasi" type="text" class="form-control" value="<?php echo $data_kandidat['nik']; ?>">
											<!-- <input hidden id="company_name_modal" name="company_name_modal" type="text"> -->
										</td>
										<td style='width:25%'>
											<button onclick="cancel_verifikasi_screening('nik')" type='button' class='btn btn-sm btn-danger'>Tidak Sesuai</button>
											<button onclick="save_verifikasi_screening('nik')" type='button' class='btn btn-sm btn-success'>Sesuai</button>
										</td>
									</tr>
									<tr>
										<td style='width:25%'><strong>Dokumen KTP</strong></td>
										<td style='width:75%' colspan="2">
											<?php
											$extension_file = substr($data_kandidat['file_ktp'], -3);
											if ($extension_file == "pdf") {
											?>
												<object height="500px" data="<?php echo $data_kandidat['file_ktp']; ?>" type="application/pdf" width="100%">
													<p>Browser anda tidak mendukung plugin PDF. Silahkan <a href="<?php echo $data_kandidat['file_ktp']; ?>">klik disini untuk mendownload file PDF.</a></p>
												</object>
											<?php } else { ?>
												<a href="<?php echo $data_kandidat['file_ktp']; ?>" target="_blank"> <img src="<?php echo $data_kandidat['file_ktp']; ?>" width="100%"> </a>
												<!-- <input readonly id="dokumen_ktp_verifikasi" name="dokumen_ktp_verifikasi" type="text" class="form-control"> -->
												<!-- <input hidden id="company_name_modal" name="company_name_modal" type="text"> -->
											<?php } ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div hidden id="verifikasi_kk_modal" class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td style='width:25%'><strong>Nomor KK</strong></td>
										<td style='width:50%'>
											<input id="kk_modal_verifikasi" name="kk_modal_verifikasi" type="text" class="form-control" value="<?php echo $data_kandidat['no_kk']; ?>">
											<!-- <input hidden id="company_name_modal" name="company_name_modal" type="text"> -->
										</td>
										<td style='width:25%'>
											<button onclick="cancel_verifikasi_screening('kk')" id="cancel_verifikasi_screening" type='button' class='btn btn-sm btn-danger'>Tidak Sesuai</button>
											<button onclick="save_verifikasi_screening('kk')" id="save_verifikasi_screening" type='button' class='btn btn-sm btn-success'>Sesuai</button>
										</td>
									</tr>
									<tr>
										<td style='width:25%'><strong>Dokumen KK</strong></td>
										<td style='width:75%' colspan="2">
											<a href="<?php echo $data_kandidat['file_kk']; ?>" target="_blank"> <img src="<?php echo $data_kandidat['file_kk']; ?>" width="100%"> </a>
											<!-- <input readonly id="dokumen_kk_verifikasi" name="dokumen_kk_verifikasi" type="text" class="form-control"> -->
											<!-- <input hidden id="company_name_modal" name="company_name_modal" type="text"> -->
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-verifikasi-screening"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_verifikasi_screening()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>
		</div>
	</div>
</div>

<div class="profile-foreground position-relative mx-n4 mt-n4 bg-primary">
	<div class="profile-wid-bg">
		<img src="<?= base_url() ?>assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
	</div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper bg-primary">
	<div class="row g-4">
		<div class="col-auto">
			<div class="avatar-lg mt-4">
				<img src="<?php echo $data_kandidat['file_pasfoto']; ?>" alt="user-img" class="img-thumbnail rounded-circle" />
			</div>
		</div>
		<!--end col-->
		<div class="col">
			<div class="p-2 mt-4">
				<h3 class="text-white mb-1"><span class="display_nama_profile"><?php echo $data_kandidat['nama']; ?></span> <span class="status_verifikasi_nama_profile"><?php echo $status_verifikasi_nama; ?></span></h3>
				<p class="text-white text-opacity-75">NIK: <span class="display_nik_profile"><?php echo $data_kandidat['nik']; ?></span> <span class="status_verifikasi_ktp_profile"><?php echo $status_verifikasi_ktp; ?></span></br>No HP: <?php echo $data_kandidat['nomor_tlp']; ?></p>
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
						<h1 class="text-white mb-1"><button onclick="verifikasi_dokumen('nama_ktp')" id="verifikasi_nik_profile" type='button' class='btn btn-success col-12'>Verifikasi KTP</button></h1>
						<!-- <h1 class="text-white mb-1"><button onclick="respon_screening('tolak')" id="tolak_screening" type='button' class='btn btn-danger col-12'>TOLAK</button></h1>
                        <h1 class="text-white mb-1"><button onclick="respon_screening('dipertimbangkan')" id="dipertimbangkan_screening" type='button' class='btn btn-warning col-12'>DIPERTIMBANGKAN</button></h1> -->
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
			<div class="d-flex profile-wrapper bg-primary">
				<!-- Nav tabs -->
				<ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
					<li class="nav-item">
						<a class="nav-link fs-14 active" data-bs-toggle="tab" href="#data-diri-tab" role="tab" title="Data Diri">
							<i class="ri-user-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Data Diri</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-14" data-bs-toggle="tab" href="#project" role="tab" title="Project">
							<i class="ri-briefcase-5-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Project</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab" title="Kontak Darurat">
							<i class="ri-parent-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Kontak Darurat</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab" title="Dokumen">
							<i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Dokumen</span>
						</a>
					</li>
					<li class="nav-item">
						<a onclick="cek_verifikasi()" class="nav-link fs-14" data-bs-toggle="tab" href="#screening" role="tab" title="Screening">
							<i class="ri-edit-box-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Screening</span>
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
												<th scope="row" style="width: 30%">Nama Lengkap</th>
												<td id="nama_lengkap_tabel"><span class="display_nama_profile"><?php echo $data_kandidat['nama']; ?></span> <span class="status_verifikasi_nama_profile"><?php echo $status_verifikasi_nama; ?></span></td>
											</tr>
											<tr>
												<th scope="row">NIK</th>
												<td id="nik_name_tabel"><span class="display_nik_profile"><?php echo $data_kandidat['nik']; ?></span> <span class="status_verifikasi_ktp_profile"><?php echo $status_verifikasi_ktp; ?></span></td>
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
											<tr>
												<th scope="row">Maps Alamat Lengkap</th>
												<td id="alamat_ktp_tabel">
													<!-- <iframe width='100%' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.app.goo.gl/9Wtb9mxh98hQPvt98'></iframe> -->
													<iframe width='100%' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?q="<?php echo $data_kandidat['alamat_domisili']; ?>"&output=embed'></iframe>
													<!-- <a href="https://maps.google.com/?q=<?php //echo $alamat_ktp; 
																								?>" target="_blank"><?php //echo $alamat_ktp; 
																													?></a> -->
												</td>
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
														$ext_file_dokumen = end($file_dokumen_explode);
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
				<div class="tab-pane fade" id="screening" role="tabpanel">
					<div id="isi_screening">
						<?php //if (!empty($data_active_screening)) {
						//foreach ($all_screening as $screening): 
						?>
						<div id="card_screening_aktif">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-3">Proses Screening Aktif</h5>
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-6">
													<table class="table table-striped">
														<tbody>
															<tr>
																<th scope="row" style="width: 30%">Company<span class="icon-verify-nama"></span></th>
																<td id="comapany_tabel_screening" style="width: 70%"><?php echo $data_active_screening['company_name']; ?></td>
															</tr>
															<tr>
																<th scope="row">Project<span class="icon-verify-nama"></span></th>
																<td id="project_tabel_screening"><?php echo $data_active_screening['project_name']; ?></td>
															</tr>
															<tr>
																<th scope="row">Posisi/Jabatan</th>
																<td id="jabatan_tabel_screening"><?php echo $data_active_screening['jabatan_name']; ?></td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-md-6">
													<table class="table table-striped">
														<tbody>
															<tr>
																<th scope="row" style="width: 30%">Area</th>
																<td style="width: 70%">
																	<span id="area_tabel_screening"><?php echo $data_active_screening['area']; ?></span>
																</td>
															</tr>
															<tr>
																<th scope="row">Start Screening on</th>
																<td>
																	<span id="start_on_tabel_screening"><?php echo $data_active_screening['start_on']; ?></span>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<strong>TAHAPAN SCREENING</strong>
											<div class="accordion" id="accordionPanelsStayOpenExample">
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingOne">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
															Screening Dokumen <span class="status_verifikasi_dokumen_screening"><?php echo $status_verifikasi_dokumen_screening; ?></span>
														</button>
													</h2>
													<div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<thead class="table-light">
																				<tr>
																					<th scope="col">Jenis Dokumen</th>
																					<th scope="col">Keterangan</th>
																					<th scope="col">Action</th>
																				</tr>
																			</thead>
																			<tbody>
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
																								<h6 class="fs-15 mb-0">Nama & File KTP
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td><span class="status_verifikasi_ktp_screening"><?php echo $status_verifikasi_ktp_screening; ?></td>
																					<td>
																						<?php if ($ext_file_dokumen == "Belum Upload") {
																						} else {
																						?>
																							<button onclick='verifikasi_dokumen("nama_ktp")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Verifikasi Dokumen</button>
																						<?php } ?>
																					</td>
																				</tr>

																				<!-- file kk -->
																				<tr hidden>
																					<?php
																					$file_dokumen = $data_kandidat['file_kk'];
																					if ($file_dokumen == "") {
																						$ext_file_dokumen = "Belum Upload";
																					} else {
																						$file_dokumen_explode = explode(".", $file_dokumen);
																						$ext_file_dokumen = $file_dokumen_explode[1];
																					}
																					if ($data_kandidat['verifikasi_kk'] == "1") {
																						$status_verifikasi_kk = "<font color='#00FF00'>Sudah Verifikasi</font>";
																					} else {
																						$status_verifikasi_kk = "<font color='#FF0000'>Belum Verifikasi</font>";
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
																					<td><?php echo $status_verifikasi_kk; ?></td>
																					<td>
																						<?php if ($ext_file_dokumen == "Belum Upload") {
																						} else {
																						?>
																							<button onclick='verifikasi_dokumen("kk")' class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Verifikasi Dokumen</button>
																						<?php } ?>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingTwo">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
															Interview Cakrawala
														</button>
													</h2>
													<div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<!-- <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">Jenis Dokumen</th>
                                                                                    <th scope="col">Keterangan</th>
                                                                                    <th scope="col">Action</th>
                                                                                </tr>
                                                                            </thead> -->
																			<tbody>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Catatan Interview Cakrawala
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<input id="catatan_interview_cakrawala" name="catatan_interview_cakrawala" type="text" class="form-control" value="">
																					</td>
																					<td style='width:25%'>
																						<button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Save</button>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingThree">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
															Test
														</button>
													</h2>
													<div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<!-- <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">Jenis Dokumen</th>
                                                                                    <th scope="col">Keterangan</th>
                                                                                    <th scope="col">Action</th>
                                                                                </tr>
                                                                            </thead> -->
																			<tbody>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Nilai Psikotest
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<input id="nilai_psikotest" name="nilai_psikotest" type="text" class="form-control" value="">
																					</td>
																					<td style='width:25%'>
																						<button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Save</button>
																					</td>
																				</tr>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Nilai Tes Admin
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<input id="nilai_test_admin" name="nilai_test_admin" type="text" class="form-control" value="">
																					</td>
																					<td style='width:25%'>
																						<button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Save</button>
																					</td>
																				</tr>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Nilai Tes Lainnya
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<input id="nilai_test_lainnya" name="nilai_test_lainnya" type="text" class="form-control" value="">
																					</td>
																					<td style='width:25%'>
																						<button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Save</button>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingFour">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
															Interview OPS/NAE
														</button>
													</h2>
													<div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<!-- <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">Jenis Dokumen</th>
                                                                                    <th scope="col">Keterangan</th>
                                                                                    <th scope="col">Action</th>
                                                                                </tr>
                                                                            </thead> -->
																			<tbody>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Catatan Interview OPS/NAE
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<input id="catatan_interview_ops" name="catatan_interview_ops" type="text" class="form-control" value="">
																					</td>
																					<td style='width:25%'>
																						<button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Save</button>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingFive">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
															Respon Client
														</button>
													</h2>
													<div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<!-- <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">Jenis Dokumen</th>
                                                                                    <th scope="col">Keterangan</th>
                                                                                    <th scope="col">Action</th>
                                                                                </tr>
                                                                            </thead> -->
																			<tbody>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Link respon client
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:75%'>
																						<a href="<?php echo base_url() . 'profile_screening/show_profile_screening/' . $id_kandidat; ?>" target="_blank"><button class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Open Link</button></a>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="accordion-item">
													<h2 class="accordion-header bg-light" id="panelsStayOpen-headingSix">
														<button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
															Finish Screening
														</button>
													</h2>
													<div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
														<div class="accordion-body">
															<div class="row">
																<div class="col-lg-12">
																	<div class="table-responsive">
																		<table class="table table-borderless align-middle mb-0">
																			<!-- <thead class="table-light">
                                                                                <tr>
                                                                                    <th scope="col">Jenis Dokumen</th>
                                                                                    <th scope="col">Keterangan</th>
                                                                                    <th scope="col">Action</th>
                                                                                </tr>
                                                                            </thead> -->
																			<tbody>
																				<tr>
																					<td style='width:25%'>
																						<div class="d-flex align-items-center">
																							<div class="ms-3 flex-grow-1">
																								<h6 class="fs-15 mb-0">Hasil Akhir Screening
																								</h6>
																							</div>
																						</div>
																					</td>
																					<td style='width:50%'>
																						<select class="form-control dropdown-body" name="hasil_screening" id="hasil_screening">
																							<option value="" style="text-wrap: wrap;">Pilih Hasil Akhir Screening</option>
																							<option value="1" style="text-wrap: wrap;">Diterima</option>
																							<option value="2" style="text-wrap: wrap;">Ditolak</option>
																							<option value="3" style="text-wrap: wrap;">Dipertimbangkan</option>
																							<option value="4" style="text-wrap: wrap;">Blacklist</option>
																						</select>
																					</td>
																					<td style='width:25%'>
																						<button onclick="finish_screening('<?php echo $id_kandidat; ?>')" class="btn btn-md btn-outline-success ladda-button mx-1" data-style="expand-right">Finish Screening</button>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php //endforeach;
						//} else { 
						?>
						<div id="card_mulai_screening">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-3">Belum ada Proses Screening Kandidat</h5>
									<div class="row">
										<div class="col-md-12">
											<button onclick="show_modal_screening()" type='button' class='btn btn-outline-primary'>Mulai Proses Screening Baru</button>
											<!-- Mulai Screening Baru -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php //} 
						?>
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

<!-- define dropdown dengan search -->
<script type='text/javascript'>
	var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
		csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

	var loading_image = "<?php echo base_url('assets/icon/loading_animation3.gif'); ?>";
	var loading_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
	loading_html_text = loading_html_text + '<img src="' + loading_image + '" alt="" width="100px">';
	loading_html_text = loading_html_text + '<h2>LOADING...</h2>';
	loading_html_text = loading_html_text + '</div>';

	var uploading_image = "<?php echo base_url('assets/icon/loading_animation3.gif'); ?>";
	var uploading_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
	uploading_html_text = uploading_html_text + '<img src="' + uploading_image + '" alt="" width="100px">';
	uploading_html_text = uploading_html_text + '<h2>PROCESSING...</h2>';
	uploading_html_text = uploading_html_text + '</div>';

	var success_image = "<?php echo base_url('assets/icon/ceklis_hijau.png'); ?>";
	var success_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
	success_html_text = success_html_text + '<img src="' + success_image + '" alt="" width="100px">';
	success_html_text = success_html_text + '<h2 style="color: #00FFA3;">BERHASIL UPDATE DATA</h2>';
	success_html_text = success_html_text + '</div>';

	var icon_verified = '<img src="<?php echo base_url('assets/icon/verified.png'); ?>" alt="" width="20px" class="mx-2">';
	var icon_not_verified = '<img src="<?php echo base_url('assets/icon/not-verified.png'); ?>" alt="" width="20px" class="mx-2">';

	var big_icon_verified = '<img src="<?php echo base_url('assets/icon/verified.png'); ?>" alt="" width="25px" class="mx-2">';
	var big_icon_not_verified = '<img src="<?php echo base_url('assets/icon/not-verified.png'); ?>" alt="" width="25px" class="mx-2">';

	$(document).ready(function() {
		$('.dropdown-mulai-screening').select2({
			width: '100%',
			dropdownParent: $("#container_modal_mulai_screening")
		});

		$('.dropdown-body').select2({
			width: '100%',
			// dropdownParent: $("#container_modal_mulai_screening")
		});

		var screening_aktif = "<?php echo $status_active_screening; ?>";

		if (screening_aktif == "1") {
			$('#card_screening_aktif').attr("hidden", false);
			$('#card_mulai_screening').attr("hidden", true);
		} else {
			$('#card_screening_aktif').attr("hidden", true);
			$('#card_mulai_screening').attr("hidden", false);
		}

		// if (navigator.geolocation) {
		//     navigator.geolocation.getCurrentPosition(function(position) {
		//         var latitude = position.coords.latitude;
		//         var longitude = position.coords.longitude;

		//         alert("lat: " + latitude);
		//         alert("long: " + longitude);
		//         alert("https://maps.google.com/?q=" + latitude + "," + longitude);
		//     }, function(error) {
		//         // Handle errors related to geolocation
		//         // console.log(error);
		//         alert(error.code);
		//     });
		// } else {
		//     // Geolocation is not supported by the browser
		//     console.log("Geolocation is not supported by this browser.");
		// }
		// alert(screening_aktif);
	});

	// Provinsi Change - Kota
	// $('#provinsi_input').change(function() {
	//     var provinsi = $(this).val();

	//     // AJAX request Kota
	//     $.ajax({
	//         url: '<?= base_url() ?>registrasi/getKotaByProv/',
	//         method: 'post',
	//         data: {
	//             [csrfName]: csrfHash,
	//             provinsi: provinsi,
	//         },
	//         dataType: 'json',
	//         success: function(response) {

	//             // Remove options
	//             $('#kota_input2').find('option').not(':first').remove();

	//             // Add options
	//             $.each(response, function(index, data) {
	//                 $('#kota_input2').append('<option value="' + data['id'] + '" style="text-wrap: wrap;">' + data['nama'] + '</option>');
	//             });
	//         }
	//     });
	// });

	// Project Vacant Change - Jabatan vacant
	$('#project_modal').change(function() {
		var project = $(this).val();

		// alert("Project: " + project);

		// AJAX request Jabatan
		$.ajax({
			url: '<?= base_url() ?>admin/screening/get_jabatan_vacant/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				project: project,
			},
			// dataType: 'json',
			success: function(response) {
				var res = jQuery.parseJSON(response);

				// Remove options
				$('#jabatan_modal').find('option').not(':first').remove();

				// Add options
				$.each(res["jabatan"], function(index, data) {
					$('#jabatan_modal').append('<option value="' + data['jabatan_id'] + '" style="text-wrap: wrap;">' + data['jabatan_name'] + '</option>');
				});

				$('#company_name_modal').val(res["company"]["company_name"]);
				$('#company_id_modal').val(res["company"]["company_id"]);

				// alert("Company name: " + res["company"]["company_name"]);
			}
		});
	});

	// Jabatan vacant Change - get area vacant
	$('#jabatan_modal').change(function() {
		var jabatan = $(this).val();
		var project = $("#project_modal").val();

		// alert("Project: " + project);
		// alert("Jabatan: " + jabatan);

		// AJAX request Jabatan
		$.ajax({
			url: '<?= base_url() ?>admin/screening/get_area_vacant/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				jabatan: jabatan,
				project: project,
			},
			// dataType: 'json',
			success: function(response) {
				var res = jQuery.parseJSON(response);

				// Remove options
				$('#kota_input').find('option').not(':first').remove();

				// Add options
				$.each(res["area_json"], function(index, data) {
					$('#kota_input').append('<option value="' + data['id'] + '" style="text-wrap: wrap;">' + data['area'] + ' (' + data['jumlah_request'] + ' - ' + data['jumlah_vacant'] + ' - ' + data['jumlah_fill'] + ')' + '</option>');
				});
			}
		});
	});
</script>

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

<!-- Tombol Show modal mulai screening -->
<script type="text/javascript">
	function show_modal_screening() {
		var nik_kandidat = "<?php echo $data_kandidat['nik']; ?>";
		var url_jo = "<?php base_url(); ?>";
		var message_modal = "";
		var id_kandidat = "";

		// alert(nik_kandidat);

		// AJAX cek vacant aktif
		$.ajax({
			url: '<?= base_url() ?>admin/screening/get_project_vacant/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				nik_kandidat: nik_kandidat,
			},
			// dataType: 'json',
			beforeSend: function() {
				// $('#judul-modal-edit').html("File KTP");
				// $('#button_download_dokumen_conditional').html("");
				$('.info-modal-mulai-screening').html(loading_html_text);
				$('.info-modal-mulai-screening').attr("hidden", false);
				$('.isi-modal-mulai-screening').attr("hidden", true);
				$('#button_mulai_screening').attr("hidden", true);
				$('#mulaiScreeningModal').appendTo("body").modal('show');
			},
			success: function(response) {
				var res = jQuery.parseJSON(response);

				if (res["status"] == "0") {
					id_kandidat = res["project"]["kandidat_id"];
					message_modal = "Tidak bisa mulai proses screening.</br>Ada proses screening yang sedang berlangsung untuk NIK " + nik_kandidat;
					message_modal = message_modal + ".</br>Selesaikan dulu proses screening untuk NIK tersebut.";
					message_modal = message_modal + "</br><a href='" + url_jo + id_kandidat + "' target='_blank'><button type='button' class='btn btn-md btn-outline-primary'>Klik disini</button></a> untuk melanjutkan proses screening yang masih berlangsung.";
					$('.info-modal-mulai-screening').html(message_modal);
				} else {
					// Remove options
					$('#project_modal').find('option').not(':first').remove();

					// Add options
					$.each(res["project"], function(index, data) {
						$('#project_modal').append('<option value="' + data['id'] + '" style="text-wrap: wrap;">' + data['project_name'] + '</option>');
					});

					$('#button_mulai_screening').attr("hidden", false);
					$('.info-modal-mulai-screening').attr("hidden", true);
					$('.isi-modal-mulai-screening').attr("hidden", false);
				}
				// $('#company_name_modal').val(res["company"]["company_name"]);
				// $('#company_id_modal').val(res["company"]["company_id"]);

				// alert("Company name: " + res["company"]["company_name"]);
			}
		});

		// alert("show modal screening");
		// $('#mulaiScreeningModal').modal('show');
	}
</script>

<!-- Tombol mulai screening -->
<script type="text/javascript">
	function mulai_screening() {
		var user_nip = "<?php echo $isi_session['employee_id']; ?>";
		var user_name = "<?php echo $isi_session['fullname']; ?>";
		var kandidat_id = "<?php echo $id_kandidat; ?>";
		var kandidat_nik = "<?php echo $data_kandidat['nik']; ?>";
		var company_id = $("#company_id_modal").val();
		var company_name = $("#company_name_modal").val();
		var project_id = $("#project_modal").val();
		var jabatan_id = $("#jabatan_modal").val();
		var kategori = $("#location_id").val();
		var kota_id = $("#kota_input").val();

		//-------cek apakah ada yang tidak diisi-------
		var pesan_project_modal = "";
		var pesan_jabatan_modal = "";
		var pesan_kategori_modal = "";
		var pesan_penempatan = "";
		if ((kota_id == "") || (kota_id == "0")) {
			pesan_penempatan = "<small style='color:#FF0000;'>Kota penempatan tidak boleh kosong</small>";
			$('#pesan_penempatan').focus();
		}
		if (kategori == "" || (kategori == "0")) {
			pesan_kategori_modal = "<small style='color:#FF0000;'>Kategori karyawan tidak boleh kosong</small>";
			$('#pesan_kategori_modal').focus();
		}
		if (jabatan_id == "" || (jabatan_id == "0")) {
			pesan_jabatan_modal = "<small style='color:#FF0000;'>Posisi/jabatan karyawan tidak boleh kosong</small>";
			$('#pesan_jabatan_modal').focus();
		}
		if (project_id == "" || (project_id == "0")) {
			pesan_project_modal = "<small style='color:#FF0000;'>Project tidak boleh kosong</small>";
			$('#pesan_project_modal').focus();
		}
		$('#pesan_project_modal').html(pesan_project_modal);
		$('#pesan_jabatan_modal').html(pesan_jabatan_modal);
		$('#pesan_kategori_modal').html(pesan_kategori_modal);
		$('#pesan_penempatan').html(pesan_penempatan);

		alert("mulai proses screening");
		alert(
			"Kandidat id: " + kandidat_id +
			"\nCompany id: " + company_id +
			"\nCompany name: " + company_name +
			"\nProject id: " + project_id +
			"\nJabatan_id: " + jabatan_id +
			"\nKategori: " + kategori +
			"\nKota id: " + kota_id
		);

		// AJAX request Jabatan
		$.ajax({
			url: '<?= base_url() ?>admin/screening/save_mulai_screening/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				user_nip: user_nip,
				user_name: user_name,
				kandidat_id: kandidat_id,
				kandidat_nik: kandidat_nik,
				company_id: company_id,
				company_name: company_name,
				job_order_id: project_id,
				jabatan_id: jabatan_id,
				kategori: kategori,
				vacant_id: kota_id,
			},
			// dataType: 'json',
			beforeSend: function() {
				// $('#judul-modal-edit').html("File KTP");
				// $('#button_download_dokumen_conditional').html("");
				$('.info-modal-mulai-screening').html(uploading_html_text);
				$('.info-modal-mulai-screening').attr("hidden", false);
				$('.isi-modal-mulai-screening').attr("hidden", true);
			},
			success: function(response) {
				var res = jQuery.parseJSON(response);

				$('.info-modal-mulai-screening').html(success_html_text);
				$('#button_mulai_screening').attr("hidden", true);
				$('.info-modal-mulai-screening').attr("hidden", false);
				$('.isi-modal-mulai-screening').attr("hidden", true);

				$('#comapany_tabel_screening').html(res['company_name']);
				$('#project_tabel_screening').html(res['project_name']);
				$('#jabatan_tabel_screening').html(res['jabatan_name']);
				$('#area_tabel_screening').html(res['area']);
				$('#start_on_tabel_screening').html(res['start_on']);

				$('#card_screening_aktif').attr("hidden", false);
				$('#card_mulai_screening').attr("hidden", true);

				// Remove options
				// $('#project_modal').find('option').not(':first').remove();

				// Add options
				// $.each(res["project"], function(index, data) {
				//     $('#project_modal').append('<option value="' + data['id'] + '" style="text-wrap: wrap;">' + data['project_name'] + '</option>');
				// });

				// $('.info-modal-mulai-screening').attr("hidden", true);
				// $('.isi-modal-mulai-screening').attr("hidden", false);

				// $('#company_name_modal').val(res["company"]["company_name"]);
				// $('#company_id_modal').val(res["company"]["company_id"]);

				// alert("Company name: " + res["company"]["company_name"]);
			}
		});
		// $('#mulaiScreeningModal').modal('hide');
	}
</script>

<!-- Tombol close modal -->
<script type="text/javascript">
	function close_mulai_screening() {
		// alert("show modal screening");
		$('#mulaiScreeningModal').modal('hide');
	}

	function close_verifikasi_screening() {
		// alert("show modal screening");
		$('#verifikasiScreeningModal').modal('hide');
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

<!-- Tombol Verifikasi Dokumen -->
<script type="text/javascript">
	function cek_verifikasi() {
		// alert("cek verifikasi");
		var kandidat_id = "<?php echo $id_kandidat; ?>";
		var jenis_dokumen = "nama_ktp";

		// AJAX cek data verifikasi terbaru
			$.ajax({
				url: '<?= base_url() ?>admin/profile/get_status_verifikasi/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					kandidat_id: kandidat_id,
					jenis_dokumen: jenis_dokumen,
				},
				// dataType: 'json',
				beforeSend: function() {
					// $('#judul-modal-edit').html("File KTP");
					// $('#button_download_dokumen_conditional').html("");
					// $('.info-modal-verifikasi-screening').html(loading_html_text);
					// $('.info-modal-verifikasi-screening').attr("hidden", false);
					// $('.isi-modal-verifikasi-screening').attr("hidden", true);
					// $('#verifikasiScreeningModal').appendTo("body").modal('show');
				},
				success: function(response) {
					var res = jQuery.parseJSON(response);

					if (res["status"] == "0") {
						// message_modal = "Tidak bisa mulai proses verifikasi.</br>Kandidat tidak terdaftar";
						// $('.info-modal-mulai-screening').html(message_modal);
					} else {
						if ((res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
							$('.status_verifikasi_nama_profile').html(icon_not_verified);
						} else if (res["verifikasi"]["verifikasi_nama"] == "1") {
							$('.status_verifikasi_nama_profile').html(icon_verified);
						}

						if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null)) {
							$('.status_verifikasi_ktp_profile').html(icon_not_verified);
						} else if (res["verifikasi"]["verifikasi_ktp"] == "1") {
							$('.status_verifikasi_ktp_profile').html(icon_verified);
						}

						if ((res["verifikasi"]["verifikasi_ktp"] == "1") && (res["verifikasi"]["verifikasi_nama"] == "1")) {
							$('.status_verifikasi_dokumen_screening').html(big_icon_verified);
							$('.status_verifikasi_ktp_screening').html("<font color='#00FF00'>Sudah Verifikasi</font>");
						} else if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null) || (res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
							$('.status_verifikasi_dokumen_screening').html(big_icon_not_verified);
							$('.status_verifikasi_ktp_screening').html("<font color='#FF0000'>Belum Verifikasi</font>");
						}

						// $('#nama_modal_verifikasi').val(res["kandidat"]["nama"]);
						// $('#nik_modal_verifikasi').val(res["kandidat"]["nik"]);

						// $('#verifikasi_ktp_modal').attr("hidden", false);
						// $('#verifikasi_kk_modal').attr("hidden", true);
						// $('.info-modal-verifikasi-screening').attr("hidden", true);
						// $('.isi-modal-verifikasi-screening').attr("hidden", false);
					}
					// $('#company_name_modal').val(res["company"]["company_name"]);
					// $('#company_id_modal').val(res["company"]["company_id"]);

					// alert("Company name: " + res["company"]["company_name"]);
				}
			});
	}
</script>

<!-- Tombol Verifikasi Dokumen -->
<script type="text/javascript">
	function verifikasi_dokumen(jenis_dokumen) {
		// alert(jenis_dokumen);
		$("#tipe_dokumen").val(jenis_dokumen);
		var kandidat_id = "<?php echo $id_kandidat; ?>";

		if (jenis_dokumen == "nama_ktp") {
			// AJAX cek data verifikasi terbaru
			$.ajax({
				url: '<?= base_url() ?>admin/profile/get_status_verifikasi/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					kandidat_id: kandidat_id,
					jenis_dokumen: jenis_dokumen,
				},
				// dataType: 'json',
				beforeSend: function() {
					// $('#judul-modal-edit').html("File KTP");
					// $('#button_download_dokumen_conditional').html("");
					$('.info-modal-verifikasi-screening').html(loading_html_text);
					$('.info-modal-verifikasi-screening').attr("hidden", false);
					$('.isi-modal-verifikasi-screening').attr("hidden", true);
					$('#verifikasiScreeningModal').appendTo("body").modal('show');
				},
				success: function(response) {
					var res = jQuery.parseJSON(response);

					if (res["status"] == "0") {
						message_modal = "Tidak bisa mulai proses verifikasi.</br>Kandidat tidak terdaftar";
						$('.info-modal-mulai-screening').html(message_modal);
					} else {
						if ((res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
							$('.status_verifikasi_nama_profile').html(icon_not_verified);
						} else if (res["verifikasi"]["verifikasi_nama"] == "1") {
							$('.status_verifikasi_nama_profile').html(icon_verified);
						}

						if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null)) {
							$('.status_verifikasi_ktp_profile').html(icon_not_verified);
						} else if (res["verifikasi"]["verifikasi_ktp"] == "1") {
							$('.status_verifikasi_ktp_profile').html(icon_verified);
						}

						if ((res["verifikasi"]["verifikasi_ktp"] == "1") && (res["verifikasi"]["verifikasi_nama"] == "1")) {
							$('.status_verifikasi_dokumen_screening').html(big_icon_verified);
							$('.status_verifikasi_ktp_screening').html("<font color='#00FF00'>Sudah Verifikasi</font>");
						} else if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null) || (res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
							$('.status_verifikasi_dokumen_screening').html(big_icon_not_verified);
							$('.status_verifikasi_ktp_screening').html("<font color='#FF0000'>Belum Verifikasi</font>");
						}

						$('#nama_modal_verifikasi').val(res["kandidat"]["nama"]);
						$('#nik_modal_verifikasi').val(res["kandidat"]["nik"]);

						$('#verifikasi_ktp_modal').attr("hidden", false);
						$('#verifikasi_kk_modal').attr("hidden", true);
						$('.info-modal-verifikasi-screening').attr("hidden", true);
						$('.isi-modal-verifikasi-screening').attr("hidden", false);
					}
					// $('#company_name_modal').val(res["company"]["company_name"]);
					// $('#company_id_modal').val(res["company"]["company_id"]);

					// alert("Company name: " + res["company"]["company_name"]);
				}
			});

		} else if (jenis_dokumen == "kk") {
			$('#verifikasi_ktp_modal').attr("hidden", true);
			$('#verifikasi_kk_modal').attr("hidden", false);
			$('#verifikasiScreeningModal').appendTo("body").modal('show');
		}

	}
</script>

<!-- Tombol Save Verifikasi Dokumen -->
<script type="text/javascript">
	function save_verifikasi_screening(jenis_dokumen) {
		// alert(jenis_dokumen);
		$("#tipe_dokumen").val(jenis_dokumen);
		var kandidat_id = "<?php echo $id_kandidat; ?>";
		var nama_verifikasi = $("#nama_modal_verifikasi").val();
		var nik_verifikasi = $("#nik_modal_verifikasi").val();
		var user_nip = "<?php echo $isi_session['employee_id']; ?>";
		var user_name = "<?php echo $isi_session['fullname']; ?>";

		// AJAX save data verifikasi terbaru
		$.ajax({
			url: '<?= base_url() ?>admin/profile/save_status_verifikasi/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				kandidat_id: kandidat_id,
				nama_verifikasi: nama_verifikasi,
				nik_verifikasi: nik_verifikasi,
				user_nip: user_nip,
				user_name: user_name,
				status_verifikasi: "1",
				jenis_dokumen: jenis_dokumen,
			},
			// dataType: 'json',
			beforeSend: function() {
				// $('#judul-modal-edit').html("File KTP");
				// $('#button_download_dokumen_conditional').html("");
				$('.info-modal-verifikasi-screening').html(loading_html_text);
				$('.info-modal-verifikasi-screening').attr("hidden", false);
				$('.isi-modal-verifikasi-screening').attr("hidden", true);
				// $('#verifikasiScreeningModal').appendTo("body").modal('show');
			},
			success: function(response) {
				// alert("sukses ajax");
				var res = jQuery.parseJSON(response);
				var tes = JSON.stringify(response);

				// alert(jenis_dokumen);
				// alert(tes);
				// alert(res["verifikasi"]["status"]);

				if (jenis_dokumen == "nama") {
					// alert("masuk jenis dokumen nama");
					if (res["status_respon"] == "0") {
						// alert("respon 0");
						message_modal = "Gagal verifikasi";
						$('.info-modal-verifikasi-screening').html(message_modal);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
						// $('.status_verifikasi_nama_profile').html(icon_not_verified);
					} else if (res["status_respon"] == "1") {
						// alert("respon 1");
						if (res["verifikasi"]["status"] == "1") {
							// alert("status 1");
							$('.status_verifikasi_nama_profile').html(icon_verified);
							$('.display_nama_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nama_lengkap_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						} else if (res["verifikasi"]["status"] == "0") {
							// alert("status 0");
							$('.status_verifikasi_nama_profile').html(icon_not_verified);
							$('.display_nama_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nama_lengkap_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						}

						$('.info-modal-verifikasi-screening').html(success_html_text);

						$('#nama_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);
						// $('#nik_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);

						cek_verifikasi();

						$('#verifikasi_ktp_modal').attr("hidden", false);
						$('#verifikasi_kk_modal').attr("hidden", true);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
					}
				} else if (jenis_dokumen == "nik") {
					if (res["status_respon"] == "0") {
						message_modal = "Gagal verifikasi";
						$('.info-modal-verifikasi-screening').html(message_modal);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
						// $('.status_verifikasi_nama_profile').html(icon_not_verified);
					} else if (res["status_respon"] == "1") {
						if (res["verifikasi"]["status"] == "1") {
							$('.status_verifikasi_ktp_profile').html(icon_verified);
							$('.display_nik_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nik_name_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						} else if (res["verifikasi"]["status"] == "0") {
							$('.status_verifikasi_ktp_profile').html(icon_not_verified);
							$('.display_nik_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nik_name_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						}

						$('.info-modal-verifikasi-screening').html(success_html_text);

						// $('#nama_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);
						$('#nik_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);

						cek_verifikasi();

						$('#verifikasi_ktp_modal').attr("hidden", false);
						$('#verifikasi_kk_modal').attr("hidden", true);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
					}
				}

				// if (res["status"] == "0") {
				//     message_modal = "Gagal verifikasi";
				//     $('.info-modal-verifikasi-screening').html(message_modal);
				//     $('.info-modal-verifikasi-screening').attr("hidden", false);
				//     $('.isi-modal-verifikasi-screening').attr("hidden", true);
				// } else {
				//     if ((res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
				//         $('.status_verifikasi_nama_profile').html(icon_not_verified);
				//     } else if (res["verifikasi"]["verifikasi_nama"] == "1") {
				//         $('.status_verifikasi_nama_profile').html(icon_verified);
				//     }

				//     if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null)) {
				//         $('.status_verifikasi_ktp_profile').html(icon_not_verified);
				//     } else if (res["verifikasi"]["verifikasi_ktp"] == "1") {
				//         $('.status_verifikasi_ktp_profile').html(icon_verified);
				//     }

				//     if ((res["verifikasi"]["verifikasi_ktp"] == "1") && (res["verifikasi"]["verifikasi_nama"] == "1")) {
				//         $('.status_verifikasi_dokumen_screening').html(big_icon_verified);
				//         $('.status_verifikasi_ktp_screening').html("<font color='#00FF00'>Sudah Verifikasi</font>");
				//     } else if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null) || (res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
				//         $('.status_verifikasi_dokumen_screening').html(big_icon_not_verified);
				//         $('.status_verifikasi_ktp_screening').html("<font color='#FF0000'>Belum Verifikasi</font>");
				//     }

				//     $('.info-modal-verifikasi-screening').html(success_html_text);

				//     $('#nama_modal_verifikasi').val(res["verifikasi"]["nama"]);
				//     $('#nik_modal_verifikasi').val(res["verifikasi"]["nik"]);

				//     $('#verifikasi_ktp_modal').attr("hidden", false);
				//     $('#verifikasi_kk_modal').attr("hidden", true);
				//     $('.info-modal-verifikasi-screening').attr("hidden", false);
				//     $('.isi-modal-verifikasi-screening').attr("hidden", true);
				// }
			}
		});
	}
</script>

<!-- Tombol Cancel Verifikasi Dokumen -->
<script type="text/javascript">
	function cancel_verifikasi_screening(jenis_dokumen) {
		// alert(jenis_dokumen);
		$("#tipe_dokumen").val(jenis_dokumen);
		var kandidat_id = "<?php echo $id_kandidat; ?>";
		var nama_verifikasi = $("#nama_modal_verifikasi").val();
		var nik_verifikasi = $("#nik_modal_verifikasi").val();
		var user_nip = "<?php echo $isi_session['employee_id']; ?>";
		var user_name = "<?php echo $isi_session['fullname']; ?>";

		// AJAX save data verifikasi terbaru
		$.ajax({
			url: '<?= base_url() ?>admin/profile/save_status_verifikasi/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				kandidat_id: kandidat_id,
				nama_verifikasi: nama_verifikasi,
				nik_verifikasi: nik_verifikasi,
				user_nip: user_nip,
				user_name: user_name,
				status_verifikasi: "0",
				jenis_dokumen: jenis_dokumen,
			},
			// dataType: 'json',
			beforeSend: function() {
				// $('#judul-modal-edit').html("File KTP");
				// $('#button_download_dokumen_conditional').html("");
				$('.info-modal-verifikasi-screening').html(loading_html_text);
				$('.info-modal-verifikasi-screening').attr("hidden", false);
				$('.isi-modal-verifikasi-screening').attr("hidden", true);
				// $('#verifikasiScreeningModal').appendTo("body").modal('show');
			},
			success: function(response) {
				// alert(response);
				var res = jQuery.parseJSON(response);

				if (jenis_dokumen == "nama") {
					if (res["status_respon"] == "0") {
						message_modal = "Gagal verifikasi";
						$('.info-modal-verifikasi-screening').html(message_modal);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
						// $('.status_verifikasi_nama_profile').html(icon_not_verified);
					} else if (res["status_respon"] == "1") {
						if (res["verifikasi"]["status"] == "1") {
							$('.status_verifikasi_nama_profile').html(icon_verified);
							$('.display_nama_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nama_lengkap_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						} else if (res["verifikasi"]["status"] == "0") {
							$('.status_verifikasi_nama_profile').html(icon_not_verified);
							$('.display_nama_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nama_lengkap_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						}

						$('.info-modal-verifikasi-screening').html(success_html_text);

						$('#nama_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);
						// $('#nik_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);

						cek_verifikasi();

						$('#verifikasi_ktp_modal').attr("hidden", false);
						$('#verifikasi_kk_modal').attr("hidden", true);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
					}
				} else if (jenis_dokumen == "nik") {
					if (res["status_respon"] == "0") {
						message_modal = "Gagal verifikasi";
						$('.info-modal-verifikasi-screening').html(message_modal);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
						// $('.status_verifikasi_nama_profile').html(icon_not_verified);
					} else if (res["status_respon"] == "1") {
						if (res["verifikasi"]["status"] == "1") {
							$('.status_verifikasi_ktp_profile').html(icon_verified);
							$('.display_nik_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nik_name_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						} else if (res["verifikasi"]["status"] == "0") {
							$('.status_verifikasi_ktp_profile').html(icon_not_verified);
							$('.display_nik_profile').html(res["verifikasi"]["nilai_sesudah"]);
							// $('#nik_name_tabel').html(res["verifikasi"]["nilai_sesudah"]);
						}

						$('.info-modal-verifikasi-screening').html(success_html_text);

						// $('#nama_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);
						$('#nik_modal_verifikasi').val(res["verifikasi"]["nilai_sesudah"]);

						cek_verifikasi();

						$('#verifikasi_ktp_modal').attr("hidden", false);
						$('#verifikasi_kk_modal').attr("hidden", true);
						$('.info-modal-verifikasi-screening').attr("hidden", false);
						$('.isi-modal-verifikasi-screening').attr("hidden", true);
					}
				}

				// if (res["status"] == "0") {
				// 	message_modal = "Gagal verifikasi";
				// 	$('.info-modal-verifikasi-screening').html(message_modal);
				// 	$('.info-modal-verifikasi-screening').attr("hidden", false);
				// 	$('.isi-modal-verifikasi-screening').attr("hidden", true);
				// } else {
				// 	if ((res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
				// 		$('.status_verifikasi_nama_profile').html(icon_not_verified);
				// 	} else if (res["verifikasi"]["verifikasi_nama"] == "1") {
				// 		$('.status_verifikasi_nama_profile').html(icon_verified);
				// 	}

				// 	if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null)) {
				// 		$('.status_verifikasi_ktp_profile').html(icon_not_verified);
				// 	} else if (res["verifikasi"]["verifikasi_ktp"] == "1") {
				// 		$('.status_verifikasi_ktp_profile').html(icon_verified);
				// 	}

				// 	if ((res["verifikasi"]["verifikasi_ktp"] == "1") && (res["verifikasi"]["verifikasi_nama"] == "1")) {
				// 		$('.status_verifikasi_dokumen_screening').html(big_icon_verified);
				// 		$('.status_verifikasi_ktp_screening').html("<font color='#00FF00'>Sudah Verifikasi</font>");
				// 	} else if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null) || (res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
				// 		$('.status_verifikasi_dokumen_screening').html(big_icon_not_verified);
				// 		$('.status_verifikasi_ktp_screening').html("<font color='#FF0000'>Belum Verifikasi</font>");
				// 	}

				// 	$('.info-modal-verifikasi-screening').html(success_html_text);

				// 	$('#nama_modal_verifikasi').val(res["verifikasi"]["nama"]);
				// 	$('#nik_modal_verifikasi').val(res["verifikasi"]["nik"]);

				// 	$('#verifikasi_ktp_modal').attr("hidden", false);
				// 	$('#verifikasi_kk_modal').attr("hidden", true);
				// 	$('.info-modal-verifikasi-screening').attr("hidden", false);
				// 	$('.isi-modal-verifikasi-screening').attr("hidden", true);
				// }
			}
		});
	}
</script>

<!-- Tombol Finish Screening -->
<script type="text/javascript">
	function finish_screening(kandidat_id) {
		alert("ID Kandidat: " + kandidat_id);
		var hasil_screening = $("#hasil_screening").val();
		alert("Hasil Screening: " + hasil_screening);
		// $("#tipe_dokumen").val(jenis_dokumen);
		// var kandidat_id = "<?php echo $id_kandidat; ?>";
		// var nama_verifikasi = $("#nama_modal_verifikasi").val();
		// var nik_verifikasi = $("#nik_modal_verifikasi").val();
		// var user_nip = "<?php echo $isi_session['employee_id']; ?>";
		// var user_name = "<?php echo $isi_session['fullname']; ?>";

		// // AJAX save data verifikasi terbaru
		// $.ajax({
		//     url: '<?= base_url() ?>admin/profile/save_status_verifikasi/',
		//     method: 'post',
		//     data: {
		//         [csrfName]: csrfHash,
		//         kandidat_id: kandidat_id,
		//         nama_verifikasi: nama_verifikasi,
		//         nik_verifikasi: nik_verifikasi,
		//         user_nip: user_nip,
		//         user_name: user_name,
		//         status_verifikasi: "0",
		//         jenis_dokumen: jenis_dokumen,
		//     },
		//     // dataType: 'json',
		//     beforeSend: function() {
		//         // $('#judul-modal-edit').html("File KTP");
		//         // $('#button_download_dokumen_conditional').html("");
		//         $('.info-modal-verifikasi-screening').html(loading_html_text);
		//         $('.info-modal-verifikasi-screening').attr("hidden", false);
		//         $('.isi-modal-verifikasi-screening').attr("hidden", true);
		//         // $('#verifikasiScreeningModal').appendTo("body").modal('show');
		//     },
		//     success: function(response) {
		//         // alert(response);
		//         var res = jQuery.parseJSON(response);

		//         if (res["status"] == "0") {
		//             message_modal = "Gagal verifikasi";
		//             $('.info-modal-verifikasi-screening').html(message_modal);
		//             $('.info-modal-verifikasi-screening').attr("hidden", false);
		//             $('.isi-modal-verifikasi-screening').attr("hidden", true);
		//         } else {
		//             if ((res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
		//                 $('.status_verifikasi_nama_profile').html(icon_not_verified);
		//             } else if (res["verifikasi"]["verifikasi_nama"] == "1") {
		//                 $('.status_verifikasi_nama_profile').html(icon_verified);
		//             }

		//             if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null)) {
		//                 $('.status_verifikasi_ktp_profile').html(icon_not_verified);
		//             } else if (res["verifikasi"]["verifikasi_ktp"] == "1") {
		//                 $('.status_verifikasi_ktp_profile').html(icon_verified);
		//             }

		//             if ((res["verifikasi"]["verifikasi_ktp"] == "1") && (res["verifikasi"]["verifikasi_nama"] == "1")) {
		//                 $('.status_verifikasi_dokumen_screening').html(big_icon_verified);
		//                 $('.status_verifikasi_ktp_screening').html("<font color='#00FF00'>Sudah Verifikasi</font>");
		//             } else if ((res["verifikasi"]["verifikasi_ktp"] == "0") || (res["verifikasi"]["verifikasi_ktp"] == "") || (res["verifikasi"]["verifikasi_ktp"] == null) || (res["verifikasi"]["verifikasi_nama"] == "0") || (res["verifikasi"]["verifikasi_nama"] == "") || (res["verifikasi"]["verifikasi_nama"] == null)) {
		//                 $('.status_verifikasi_dokumen_screening').html(big_icon_not_verified);
		//                 $('.status_verifikasi_ktp_screening').html("<font color='#FF0000'>Belum Verifikasi</font>");
		//             }

		//             $('.info-modal-verifikasi-screening').html(success_html_text);

		//             $('#nama_modal_verifikasi').val(res["verifikasi"]["nama"]);
		//             $('#nik_modal_verifikasi').val(res["verifikasi"]["nik"]);

		//             $('#verifikasi_ktp_modal').attr("hidden", false);
		//             $('#verifikasi_kk_modal').attr("hidden", true);
		//             $('.info-modal-verifikasi-screening').attr("hidden", false);
		//             $('.isi-modal-verifikasi-screening').attr("hidden", true);
		//         }
		//     }
		// });
	}
</script>

<script>
	// var id_kandidat = '<?php echo $id_kandidat; ?>';
	// alert(id_kandidat);
</script>
