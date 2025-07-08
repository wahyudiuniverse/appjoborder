<!-- <pre>
    <?php //print_r($all_jabatan); 
	?>
</pre> -->

<!-- START MODAL EDIT JOB ORDER -->
<div class="modal fade" id="editJOModal" tabindex="-1" role="dialog" aria-labelledby="editJOModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editJOModalLabel">Edit Detail JO</h5>
				<button onclick="close_edit_JO()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-edit-JO">
					<div class="container" id="container_modal_JO">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td style='width:25%'><strong>Region <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="region_input_modal" id="region_input_modal" class="form-control dropdown-JO-search">
												<option value="">Pilih Region</option>
												<?php if ($all_region == null) {
												} else { ?>
													<?php foreach ($all_region as $region) : ?>
														<option value="<?= $region['id']; ?>" style="text-wrap: wrap;">
															<?php echo $region['nama']; ?>
														</option>
													<?php endforeach; ?>
												<?php } ?>
											</select>
											<span id='pesan_region_input_modal'></span>
										</td>
									</tr>
									<tr>
										<td style='width:25%'><strong>Provinsi <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="provinsi_input_modal" id="provinsi_input_modal" class="form-control dropdown-JO-search">
												<option value="">Pilih Provinsi</option>
												<?php if ($all_provinsi == null) {
												} else { ?>
													<?php foreach ($all_provinsi as $provinsi) : ?>
														<option value="<?= $provinsi['id_bps']; ?>" style="text-wrap: wrap;">
															<?php echo $provinsi['nama']; ?>
														</option>
													<?php endforeach; ?>
												<?php } ?>
											</select>
											<span id='pesan_provinsi_input_modal'></span>
										</td>
									</tr>
									<tr>
										<td style='width:25%'><strong>Area <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="area_input_modal" id="area_input_modal" class="form-control dropdown-JO-search">
												<option value="">Pilih Area (Pilih Provinsi terlebih dahulu)</option>
											</select>
											<span id='pesan_area_input_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>Detail area </strong></td>
										<td>
											<textarea class="form-control" id="detail_area_modal" name="detail_area_modal" placeholder="Detail Area. Contoh: Toko ABC" rows="3"></textarea>
											<span id='pesan_detail_area_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>Jumlah Request <font color="#FF0000">*</font></strong></td>
										<td>
											<input id='jumlah_request_modal' name='jumlah_request_modal' type='number' class='form-control' placeholder='Jumlah Request' value=''>
											<span id='pesan_jumlah_request_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>PIC VACANT <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="pic_vacant_input_modal" id="pic_vacant_input_modal" class="form-control dropdown-JO-search">
												<option value="">Pilih PIC Vacant</option>
												<?php if ($all_interviewer == null) {
												} else { ?>
													<?php foreach ($all_interviewer as $interviewer) : ?>
														<option value="<?= $interviewer['id']; ?>" style="text-wrap: wrap;">
															<?php echo $interviewer['nama'] . " - " . $interviewer['jabatan'] . " - " . $interviewer['area']; ?>
														</option>
													<?php endforeach; ?>
												<?php } ?>
											</select>
											<span id='pesan_pic_vacant_input_modal'></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-edit-JO"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_edit_JO()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button onclick="save_JO()" id='button_save_JO' name='button_save_JO' type='button' class='btn btn-primary'>Save Posisi/Jabatan JO</button>
				<button onclick="delete_JO()" id='button_delete_JO' name='button_delete_JO' type='button' class='btn btn-danger'>Delete Data JO</button>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL EDIT JO -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
			<h4 class="mb-sm-0">Job Order Detail</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/job_order/">Master Job Order</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/job_order/detail_jabatan_jo/<?php echo $id_jabatan_jo; ?>">Job Order</a></li>
					<li class="breadcrumb-item active">Job Order Detail</li>
				</ol>
			</div>

		</div>
	</div>
</div>
<!-- end page title -->

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title mb-0">Job Order Detail</h5>
					<!-- <button onclick="add_job_order()" id="button_add_job_order" class="btn btn-success btn-block">Add Posisi/Jabatan JO</button>
					<button hidden id="button_download_data" class="btn btn-success btn-block">Download Data</button> -->
				</div>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<table class="table table-striped">
									<tbody>
										<tr>
											<th scope="row" style="width: 30%">Project<span class="icon-verify-nama"></span></th>
											<td id="project_name_tabel" style="width: 70%"><strong><?php echo $nama_project; ?></strong></td>
										</tr>
										<tr>
											<th scope="row" style="width: 30%">Jabatan<span class="icon-verify-nama"></span></th>
											<td id="jabatan_name_tabel" style="width: 70%"><strong><?php echo $jabatan_jo['jabatan_name']; ?></strong></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Area<span class="icon-verify-nama"></span></th>
											<td id="jumlah_area_tabel"><?php echo $jumlah_area; ?></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Request<span class="icon-verify-nama"></span></th>
											<td id="jumlah_request_tabel"><?php echo $rekap_vacant_area['request']; ?></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Actual</th>
											<td id="jumlah_actual_tabel"><?php echo $rekap_vacant_area['fulfill']; ?></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Vacant</th>
											<td id="jumlah_vacant_tabel"><?php echo $rekap_vacant_area['vacant']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table table-striped">
									<tbody>
										<tr>
											<th scope="row" style="width: 30%">
												<p>Kriteria</p>
												<button onclick="edit_kriteria('<?php echo $id_jabatan_jo; ?>')" class="btn btn-sm btn-outline-success">Edit Kriteria</button>
											</th>
											<td style="width: 70%">
												<textarea readonly class="form-control" id="kriteria_text_modal" name="kriteria_text_modal" placeholder="Kriteria" rows="3"><?php echo $jabatan_jo['kriteria']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<p>Jobdesc</p>
												<button onclick="edit_jobdesc('<?php echo $id_jabatan_jo; ?>')" class="btn btn-sm btn-outline-success">Edit Jobdesc</button>
											</th>
											<td>
												<textarea readonly class="form-control" id="jobdesc_text_modal" name="jobdesc_text_modal" placeholder="Jobdesc" rows="3"><?php echo $jabatan_jo['jobdesc']; ?></textarea>
											</td>
										</tr>
										<tr>
											<th scope="row">
												<p>Benefit</p>
												<button onclick="edit_benefit('<?php echo $id_jabatan_jo; ?>')" class="btn btn-sm btn-outline-success">Edit Benefit</button>
											</th>
											<td>
												<textarea readonly class="form-control" id="benefit_text_modal" name="benefit_text_modal" placeholder="Benefit" rows="3"><?php echo $jabatan_jo['benefit']; ?></textarea>
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
</div><!--end row-->

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h5 class="card-title mb-0">List Area</h5>
					<button onclick="add_job_order()" id="button_add_job_order" class="btn btn-success btn-block">Add Area JO</button>
					<button hidden id="button_download_data" class="btn btn-success btn-block">Download Data</button>
				</div>
			</div>

			<div class="card-body">
				<!--- SECTION FILTER --->
				<!-- <div class="row">
					<div class="col-lg-3">
						<div class="mb-3">
							<label
								class="form-label"
								for="jabatan_input">Posisi/Jabatan</label>
							<select name="jabatan_input" id="jabatan_input" class="form-control dropdown-dengan-search">
								<option value="">Pilih Jabatan/Posisi</option>
								<?php //if ($all_jabatan == null) {
								//} else { 
								?>
									<?php //foreach ($all_jabatan as $jabatan) : 
									?>
										<option value="<?php //echo $jabatan['designation_id']; 
														?>" style="text-wrap: wrap;">
											<?php //echo $jabatan['designation_name']; 
											?>
										</option>
									<?php //endforeach; 
									?>
								<?php //} 
								?>
							</select>
						</div>
					</div>

					<div class="col-lg-3">
						<div class="mb-3">
							<label
								class="form-label"
								for="region_input">
								Status
							</label>
							<select name="region_input" id="region_input" class="form-control dropdown-dengan-search">
								<option value="0">On going</option>
								<option value="1">Finish</option>
							</select>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="mb-3">
							<label
								class="form-label"
								for="filter_kandidat">&nbsp;</label>
							<button name="filter_kandidat" id="filter_kandidat" class="btn btn-primary btn-block col-12">FILTER</button>
						</div>
					</div>
				</div> -->
				<!--- END SECTION FILTER --->

				<div class="row">
					<div class="col-4">
						<p>
							<font color="#FF0000">Catatan: Klik add area JO jika di tabel belum ada area nya</font>
						</p>
					</div>
					<div class="col-8">
						<div class="hstack gx-1 flex-wrap">
							<div class="col-12 col-sm-12 col-md-4 px-1 d-flex align-items-stretch" height="100%">
								<input type="radio" class="btn-check" name="filter_status" id="option_0" height="100%" value="all" checked>
								<label for="option_0" class="btn btn-outline-primary col-12 material-shadow d-flex flex-sm-column align-items-center justify-content-center justify-content-sm-center" height="100%">
									STATUS: ALL
								</label>
							</div>
							<div class="col-12 col-sm-12 col-md-4 px-1 d-flex align-items-stretch" height="100%">
								<input type="radio" class="btn-check" name="filter_status" id="option_1" height="100%" value="on_going">
								<label for="option_1" class="btn btn-outline-primary col-12 material-shadow d-flex flex-sm-column align-items-center justify-content-center justify-content-sm-center" height="100%">
									STATUS: ON GOING
								</label>
							</div>

							<div class="col-12 col-sm-12 col-md-4 px-1 d-flex align-items-stretch" height="100%">
								<input type="radio" class="btn-check" name="filter_status" id="option_2" height="100%" value="finished">
								<label for="option_2" class="btn btn-outline-primary col-12 material-shadow d-flex flex-sm-column align-items-center justify-content-center justify-content-sm-center" height="100%">
									STATUS: FINISHED
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="jo-datatables" class="display table table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Aksi</th>
										<th>REGION</th>
										<th>AREA</th>
										<th>DETAIL AREA</th>
										<th>JUMLAH REQUEST</th>
										<th>JUMLAH ACTUAL</th>
										<th>JUMLAH VACANT</th>
										<th>PIC VACANT</th>
										<th>STATUS</th>
										<th>REQUEST BY</th>
										<th>REQUEST ON</th>
										<th>FINISHED ON</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!--end row-->

<!-- Tombol Open Profile -->
<script type="text/javascript">
	function open_detail(id_master_jo) {
		// alert("ID Kandidat: " + id_kandidat);
		window.open("<?= base_url() ?>admin/job_order/detail_jo/" + id_master_jo, "_blank");
	}
</script>

<script type='text/javascript'>
	var project = '<?php echo $project_id; ?>';
	var id_jabatan_jo = '<?php echo $id_jabatan_jo; ?>';
	var id_master_jo = '<?php echo $id_master_jo; ?>';
	var tabel_jo;
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

	var not_success_image = "<?php echo base_url('assets/icon/silang_merah.png'); ?>";
	var not_success_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
	not_success_html_text = not_success_html_text + '<img src="' + not_success_image + '" alt="" width="100px">';
	not_success_html_text = not_success_html_text + '<h2 style="color: #00FFA3;">SUDAH ADA AREA TERESEBUT DENGAN STATUS VACANT AKTIF</h2>';
	not_success_html_text = not_success_html_text + '</div>';

	var success_image = "<?php echo base_url('assets/icon/ceklis_hijau.png'); ?>";
	var success_delete_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
	success_delete_html_text = success_delete_html_text + '<img src="' + success_image + '" alt="" width="100px">';
	success_delete_html_text = success_delete_html_text + '<h2 style="color: #00FFA3;">BERHASIL HAPUS DATA</h2>';
	success_delete_html_text = success_delete_html_text + '</div>';

	// execute kalau page sudah ke load 
	$(document).ready(function() {
		//inisialisasi select2 untuk searchable dropdown
		$('.dropdown-dengan-search').select2({
			width: '100%'
		});

		$('.dropdown-JO-search').select2({
			width: "100%",
			dropdownParent: $("#container_modal_JO")
		});

		// Provinsi Change - Area
		$('#provinsi_input_modal').change(function() {
			var provinsi = $(this).val();

			// AJAX request Kota
			$.ajax({
				url: '<?= base_url() ?>registrasi/getKotaByProv/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					provinsi: provinsi,
				},
				dataType: 'json',
				success: function(response) {

					// Remove options
					$('#area_input_modal').find('option').not(':first').remove();
					// $('#area_input_modal').find('option').remove();

					// Add options
					$.each(response, function(index, data) {
						$('#area_input_modal').append('<option value="' + data['id_kab_kota_bps'] + '" style="text-wrap: wrap;">' + data['nama'] + '</option>');
					});
				}
			});
		});

		// Filter status change
		$('input[name="filter_status"]').change(function() {
			var selected_filter = $(this).val();
			// var provinsi = $(this).val();
			// alert(selected_filter);

			tabel_jo.destroy();

			tabel_jo = $('#jo-datatables').DataTable({
				//"bDestroy": true,
				'processing': true,
				'serverSide': true,
				// 'stateSave': true,
				'bFilter': true,
				'serverMethod': 'post',
				// 'dom': 'lBfrtip',
				'dom': 'lfrtip',
				'buttons': ["copy", "csv", "excel", "print", "pdf"],
				'order': [
					[10, 'desc']
				],
				'ajax': {
					'url': '<?= base_url() ?>admin/job_order/list_detail_jo',
					data: {
						[csrfName]: csrfHash,
						id_jabatan_jo: id_jabatan_jo,
						selected_filter: selected_filter,
						// jabatan: jabatan,
						// region: region,
						// rekruter: rekruter,
						// range_tanggal: range_tanggal,
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert("Status :" + xhr.status);
						alert("responseText :" + xhr.responseText);
					},
				},
				'columns': [{
						data: 'aksi',
						"orderable": false
					},
					{
						data: 'region',
						// "orderable": false,
					},
					{
						data: 'area',
						// "orderable": false,
						//searchable: true
					},
					{
						data: 'detail_area',
						// "orderable": false,
						//searchable: true
					},
					{
						data: 'jumlah_request',
						// render: function(data, type, row) {
						// 	let color = 'red';
						// 	// if (data.replace(/[\$,]/g, '') * 1 > 1000) {
						// 	// 	if (row[9] == "buy") {
						// 	// 		color = 'green';
						// 	// 	} else if (row[9] == "sell") {
						// 	// 		color = 'red';
						// 	// 	}
						// 	// }
						// 	return '<span style="background-color:' + color + '">' + data + '</span>';
						// }
						// "orderable": false,
						//searchable: true
					},
					{
						data: 'jumlah_fill',
						// "orderable": false
					},
					{
						data: 'jumlah_vacant',
						// "orderable": false
					},
					{
						data: 'pic_vacant_name',
						// "orderable": false
					},
					{
						data: 'status_vacant',
						"orderable": false
					},
					{
						data: 'created_by',
						// "orderable": false 
					},
					{
						data: 'created_on',
						// "orderable": false
					},
					{
						data: 'finish_on',
						// "orderable": false
					},

				],
				// "columnDefs": [{
				// 		"targets": [8],
				// 		"createdCell": function(td, cellData, rowData, row, col) {
				// 			if (cellData == "ON GOING") {
				// 				$(td).css('color', 'darkblue');
				// 				$(td).css('background-color', 'green');
				// 			} else {
				// 				$(td).css('color', 'darkgreen');
				// 			}
				// 		}
				// 	},
				// 	// 	{
				// 	// 		"targets": [5,6,7,8],
				// 	// 		"createdCell": function(td, cellData, rowData, row, col) {
				// 	// 			// if (cellData >= 1) {
				// 	// 			// 	$(td).css('color', 'green')
				// 	// 			// } else if (cellData < 1) {
				// 	// 				$(td).css('background-color', 'red')
				// 	// 			// }
				// 	// 		}
				// 	// 	},
				// ]
			});
			// }).on('search.dt', () => eventFired('Search'));

			// AJAX request Kota
			// $.ajax({
			// 	url: '<?= base_url() ?>registrasi/getKotaByProv/',
			// 	method: 'post',
			// 	data: {
			// 		[csrfName]: csrfHash,
			// 		provinsi: provinsi,
			// 	},
			// 	dataType: 'json',
			// 	success: function(response) {

			// 		// Remove options
			// 		$('#area_input_modal').find('option').not(':first').remove();
			// 		// $('#area_input_modal').find('option').remove();

			// 		// Add options
			// 		$.each(response, function(index, data) {
			// 			$('#area_input_modal').append('<option value="' + data['id_kab_kota_bps'] + '" style="text-wrap: wrap;">' + data['nama'] + '</option>');
			// 		});
			// 	}
			// });
		});

		//inisialisasi flatcpickr untuk select tanggal
		$("#range_tanggal").flatpickr({
			mode: "range",
			dateFormat: "Y-m-d",
			// maxDate: new Date().fp_incr(14),
			onChange: function(selectedDates, dateStr, instance) {
				//...
				// maxDate: new Date(dateStr).fp_incr(14),
				if (dateStr == "") {

				} else {
					newMaxDate = new Date(selectedDates[0]).fp_incr(31);
					newMinDate = new Date(selectedDates[0]);
					instance.set('maxDate', newMaxDate);
					instance.set('minDate', newMinDate);
				}

				// alert(new Date(selectedDates[0]).fp_incr(14));
			},
			onOpen: function(selectedDates, dateStr, instance) {
				// ...
				instance.set('maxDate', null);
				instance.set('minDate', null);
				instance.clear();
			}
		});

		// alert(id_master_jo);
		// alert(jabatan);
		// alert(region);
		// alert(rekruter);

		//populate data tabel
		// tabel_jo.destroy();
		var selected_filter = $('input[name="filter_status"]:checked').val();

		tabel_jo = $('#jo-datatables').DataTable({
			//"bDestroy": true,
			'processing': true,
			'serverSide': true,
			// 'stateSave': true,
			'bFilter': true,
			'serverMethod': 'post',
			// 'dom': 'lBfrtip',
			'dom': 'lfrtip',
			'buttons': ["copy", "csv", "excel", "print", "pdf"],
			'order': [
				[10, 'desc']
			],
			'ajax': {
				'url': '<?= base_url() ?>admin/job_order/list_detail_jo',
				data: {
					[csrfName]: csrfHash,
					id_jabatan_jo: id_jabatan_jo,
					selected_filter: selected_filter,
					// jabatan: jabatan,
					// region: region,
					// rekruter: rekruter,
					// range_tanggal: range_tanggal,
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert("Status :" + xhr.status);
					alert("responseText :" + xhr.responseText);
				},
			},
			'columns': [{
					data: 'aksi',
					"orderable": false
				},
				{
					data: 'region',
					// "orderable": false,
				},
				{
					data: 'area',
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'detail_area',
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_request',
					// render: function(data, type, row) {
					// 	let color = 'red';
					// 	// if (data.replace(/[\$,]/g, '') * 1 > 1000) {
					// 	// 	if (row[9] == "buy") {
					// 	// 		color = 'green';
					// 	// 	} else if (row[9] == "sell") {
					// 	// 		color = 'red';
					// 	// 	}
					// 	// }
					// 	return '<span style="background-color:' + color + '">' + data + '</span>';
					// }
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_fill',
					// "orderable": false
				},
				{
					data: 'jumlah_vacant',
					// "orderable": false
				},
				{
					data: 'pic_vacant_name',
					// "orderable": false
				},
				{
					data: 'status_vacant',
					"orderable": false
				},
				{
					data: 'created_by',
					// "orderable": false 
				},
				{
					data: 'created_on',
					// "orderable": false
				},
				{
					data: 'finish_on',
					// "orderable": false
				},

			],
			// "columnDefs": [
			// 	{
			// 		"targets": [1,2,3,4],
			// 		"createdCell": function(td, cellData, rowData, row, col) {
			// 			// if (cellData >= 1) {
			// 				$(td).css('background-color', 'green')
			// 			// } else if (cellData < 1) {
			// 			// 	$(td).css('color', 'red')
			// 			// }
			// 		}
			// 	},
			// 	{
			// 		"targets": [5,6,7,8],
			// 		"createdCell": function(td, cellData, rowData, row, col) {
			// 			// if (cellData >= 1) {
			// 			// 	$(td).css('color', 'green')
			// 			// } else if (cellData < 1) {
			// 				$(td).css('background-color', 'red')
			// 			// }
			// 		}
			// 	},
			// ]
		});
		// }).on('search.dt', () => eventFired('Search'));

	});
</script>

<script type="text/javascript">
	document.getElementById("button_download_data").onclick = function(e) {
		var project = document.getElementById("project_input").value;
		var jabatan = document.getElementById("jabatan_input").value;
		var region = document.getElementById("region_input").value;
		var rekruter = document.getElementById("rekruter_input").value;
		var range_tanggal = document.getElementById("range_tanggal").value;
		// var project = document.getElementById("aj_project").value;
		// var sub_project = document.getElementById("aj_sub_project").value;
		// var status = document.getElementById("status").value;

		// // ambil input search dari datatable
		// var filter = $('.dataTables_filter input').val(); //cara 1
		var searchVal = $('#kandidat-datatables_filter').find('input').val(); //cara 2

		if (searchVal == "") {
			searchVal = "-no_input-";
		}

		if (range_tanggal == "") {
			range_tanggal = "0";
		}

		// var text_pesan = "Project: " + project;
		// text_pesan = text_pesan + "\njabatan: " + jabatan;
		// text_pesan = text_pesan + "\nregion: " + region;
		// text_pesan = text_pesan + "\nrekruter: " + rekruter;
		// text_pesan = text_pesan + "\nrange_tanggal: " + range_tanggal;
		// text_pesan = text_pesan + "\nSearch: " + searchVal;
		// alert(text_pesan);
		window.open('<?php echo base_url(); ?>admin/kandidat/printExcel/' + project + '/' + jabatan + '/' + region + '/' + rekruter + '/' + range_tanggal + '/' + searchVal + '/', '_self');

	};
</script>

<!-- SHOW MODAL ADD JO -->
<script>
	function add_job_order() {
		// alert(id);

		//judul modal
		$('#editJOModalLabel').html("Add Data Detail JO");

		//inisialiasasi variabel modal
		$('#region_input_modal').val("").change();
		$('#provinsi_input_modal').val("").change();
		$('#area_input_modal').val("").change();
		$('#detail_area_modal').val("");
		$('#jumlah_request_modal').val("");
		$('#pic_vacant_input_modal').val("").change();

		//open semua input
		$("#region_input_modal").removeAttr('disabled');
		$("#provinsi_input_modal").removeAttr('disabled');
		$("#area_input_modal").removeAttr('disabled');
		$("#detail_area_modal").removeAttr('disabled');
		$("#jumlah_request_modal").removeAttr('disabled');
		$("#pic_vacant_input_modal").removeAttr('disabled');

		//inisialisasi pesan
		$('#pesan_region_input_modal').html("");
		$('#pesan_provinsi_input_modal').html("");
		$('#pesan_area_input_modal').html("");
		$('#pesan_detail_area_modal').html("");
		$('#pesan_jumlah_request_modal').html("");
		$('#pesan_pic_vacant_input_modal').html("");

		//show modal
		$('.isi-modal-edit-JO').attr("hidden", false);
		$('.info-modal-edit-JO').attr("hidden", true);
		$('#button_save_JO').attr("hidden", false);
		$('#button_delete_JO').attr("hidden", true);
		$('#editJOModal').modal('show');
	}
</script>

<!-- SAVE DATA MASTER JO -->
<script type="text/javascript">
	function save_JO() {
		//-------ambil isi variabel-------
		var job_order_id = '<?php echo $id_jabatan_jo; ?>';
		var region_id = $("#region_input_modal").val();
		var region = $("#region_input_modal option:selected").text();
		region = region.trim();
		var provinsi_id = $("#provinsi_input_modal").val();
		var provinsi = $("#provinsi_input_modal option:selected").text();
		provinsi = provinsi.trim();
		var area_id = $("#area_input_modal").val();
		var area = $("#area_input_modal option:selected").text();
		area = area.trim();
		var detail_area = $("#detail_area_modal").val();
		var jumlah_request = $("#jumlah_request_modal").val();
		var pic_vacant = $("#pic_vacant_input_modal").val();
		var pic_vacant_name = $("#pic_vacant_input_modal option:selected").text();
		pic_vacant_name = pic_vacant_name.trim();

		//-------testing-------
		// alert(id_bps_area_modal);
		// alert("masuk button save Data Diri");
		// alert('Server Time: '+ getServerTime());
		// alert('Locale Time: '+ new Date(getServerTime()));

		//-------cek apakah ada yang tidak diisi-------
		var pesan_region_input_modal = "";
		var pesan_provinsi_input_modal = "";
		var pesan_area_input_modal = "";
		var pesan_jumlah_request_modal = "";
		var pesan_pic_vacant_input_modal = "";
		if (pic_vacant == "") {
			pesan_pic_vacant_input_modal = "<small style='color:#FF0000;'>PIC Vacant tidak boleh kosong</small>";
			$('#pic_vacant_input_modal').focus();
		}
		if (jumlah_request == "") {
			pesan_jumlah_request_modal = "<small style='color:#FF0000;'>Jumlah request tidak boleh kosong</small>";
			$('#jumlah_request_modal').focus();
		}
		if (area_id == "") {
			pesan_area_input_modal = "<small style='color:#FF0000;'>Area tidak boleh kosong</small>";
			$('#area_input_modal').focus();
		}
		if (provinsi_id == "") {
			pesan_provinsi_input_modal = "<small style='color:#FF0000;'>Provinsi tidak boleh kosong</small>";
			$('#provinsi_input_modal').focus();
		}
		if (region_id == "") {
			pesan_region_input_modal = "<small style='color:#FF0000;'>Region tidak boleh kosong</small>";
			$('#region_input_modal').focus();
		}
		$('#pesan_pic_vacant_input_modal').html(pesan_pic_vacant_input_modal);
		$('#pesan_jumlah_request_modal').html(pesan_jumlah_request_modal);
		$('#pesan_area_input_modal').html(pesan_area_input_modal);
		$('#pesan_provinsi_input_modal').html(pesan_provinsi_input_modal);
		$('#pesan_region_input_modal').html(pesan_region_input_modal);

		//-------action-------
		if (
			(pesan_pic_vacant_input_modal != "") || (pesan_jumlah_request_modal != "") || (pesan_area_input_modal != "") ||
			(pesan_provinsi_input_modal != "") || (pesan_region_input_modal != "")
		) { //kalau ada input kosong 
			// alert("Tidak boleh ada input kosong");
		} else { //kalau semua terisi dan id_area nya kosong (tambah data baru)
			// AJAX untuk add data interviewer
			// alert("Data ADD OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Job_order/add_detail_JO/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					job_order_id: job_order_id,
					region_id: region_id,
					region: region,
					provinsi_id: provinsi_id,
					provinsi: provinsi,
					area_id: area_id,
					area: area,
					detail_area: detail_area,
					jumlah_request: jumlah_request,
					pic_vacant: pic_vacant,
					pic_vacant_name: pic_vacant_name,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-JO').attr("hidden", false);
					$('.isi-modal-edit-JO').attr("hidden", true);
					$('.info-modal-edit-JO').html(loading_html_text);
					$('#button_save_JO').attr("hidden", true);
					$('#button_delete_JO').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					// alert(res);

					if (res['status'] == "1") {
						//tampilkan pesan sukses
						$('.info-modal-edit-JO').attr("hidden", false);
						$('.isi-modal-edit-JO').attr("hidden", true);
						$('.info-modal-edit-JO').html(success_html_text);
					} else {
						//tampilkan pesan sukses
						$('.info-modal-edit-JO').attr("hidden", false);
						$('.isi-modal-edit-JO').attr("hidden", true);
						$('.info-modal-edit-JO').html(not_success_html_text);
					}

					// $('#area').attr("hidden", true);
					tabel_jo.destroy();
					var selected_filter = $('input[name="filter_status"]:checked').val();

					tabel_jo = $('#jo-datatables').DataTable({
						//"bDestroy": true,
						'processing': true,
						'serverSide': true,
						// 'stateSave': true,
						'bFilter': true,
						'serverMethod': 'post',
						// 'dom': 'lBfrtip',
						'dom': 'lfrtip',
						'buttons': ["copy", "csv", "excel", "print", "pdf"],
						'order': [
							[10, 'desc']
						],
						'ajax': {
							'url': '<?= base_url() ?>admin/job_order/list_detail_jo',
							data: {
								[csrfName]: csrfHash,
								id_jabatan_jo: id_jabatan_jo,
								selected_filter: selected_filter,
								// jabatan: jabatan,
								// region: region,
								// rekruter: rekruter,
								// range_tanggal: range_tanggal,
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert("Status :" + xhr.status);
								alert("responseText :" + xhr.responseText);
							},
						},
						'columns': [{
								data: 'aksi',
								"orderable": false
							},
							{
								data: 'region',
								// "orderable": false,
							},
							{
								data: 'area',
								// "orderable": false,
								//searchable: true
							},
							{
								data: 'detail_area',
								// "orderable": false,
								//searchable: true
							},
							{
								data: 'jumlah_request',
								// render: function(data, type, row) {
								// 	let color = 'red';
								// 	// if (data.replace(/[\$,]/g, '') * 1 > 1000) {
								// 	// 	if (row[9] == "buy") {
								// 	// 		color = 'green';
								// 	// 	} else if (row[9] == "sell") {
								// 	// 		color = 'red';
								// 	// 	}
								// 	// }
								// 	return '<span style="background-color:' + color + '">' + data + '</span>';
								// }
								// "orderable": false,
								//searchable: true
							},
							{
								data: 'jumlah_fill',
								// "orderable": false
							},
							{
								data: 'jumlah_vacant',
								// "orderable": false
							},
							{
								data: 'pic_vacant_name',
								// "orderable": false
							},
							{
								data: 'status_vacant',
								"orderable": false
							},
							{
								data: 'created_by',
								// "orderable": false 
							},
							{
								data: 'created_on',
								// "orderable": false
							},
							{
								data: 'finish_on',
								// "orderable": false
							},

						],
						// "columnDefs": [
						// 	{
						// 		"targets": [1,2,3,4],
						// 		"createdCell": function(td, cellData, rowData, row, col) {
						// 			// if (cellData >= 1) {
						// 				$(td).css('background-color', 'green')
						// 			// } else if (cellData < 1) {
						// 			// 	$(td).css('color', 'red')
						// 			// }
						// 		}
						// 	},
						// 	{
						// 		"targets": [5,6,7,8],
						// 		"createdCell": function(td, cellData, rowData, row, col) {
						// 			// if (cellData >= 1) {
						// 			// 	$(td).css('color', 'green')
						// 			// } else if (cellData < 1) {
						// 				$(td).css('background-color', 'red')
						// 			// }
						// 		}
						// 	},
						// ]
					});
					// }).on('search.dt', () => eventFired('Search'));
					// window.open("<?= base_url() ?>job_order/" + res, "_blank");
					// window.open("<?= base_url() ?>admin/job_order/detail_jo/" + res, "_blank");
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-JO').html(html_text); //coba pake iframe
					$('.isi-modal-edit-JO').attr("hidden", true);
					$('.info-modal-edit-JO').attr("hidden", false);
					$('#button_save_JO').attr("hidden", true);
				}
			});

			// alert("Tidak ada input kosong");
		}
	};
</script>

<!-- Tombol close modal JO -->
<script type="text/javascript">
	function close_edit_JO() {
		// alert("show modal screening");
		$('#editJOModal').modal('hide');
	}
</script>

<!-- Action Tombol Edit kriteria -->
<script type="text/javascript">
	function edit_kriteria(id_jo) {
		alert("EDIT KRITERIA. ID JO: " + id_jo);
		// $('#editJOModal').modal('hide');
	}
</script>

<!-- Action Tombol Edit jobdesc -->
<script type="text/javascript">
	function edit_jobdesc(id_jo) {
		alert("EDIT JOBDESC. ID JO: " + id_jo);
		// $('#editJOModal').modal('hide');
	}
</script>

<!-- Action Tombol Edit benefit -->
<script type="text/javascript">
	function edit_benefit(id_jo) {
		alert("EDIT BENEFIT. ID JO: " + id_jo);
		// $('#editJOModal').modal('hide');
	}
</script>

<script>
	// function initializeTables() {
	//     new DataTable("#kandidat-datatables", {
	//         dom: "lBfrtip",
	//         buttons: ["copy", "csv", "excel", "print", "pdf"],
	//     });
	// }

	// document.addEventListener("DOMContentLoaded", function() {
	//     initializeTables();
	// });
</script>
