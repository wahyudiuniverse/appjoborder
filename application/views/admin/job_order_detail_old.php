<!-- <pre>
    <?php //print_r($all_jabatan); 
	?>
</pre> -->

<!-- START MODAL EDIT JOB ORDER -->
<div class="modal fade" id="editJOModal" tabindex="-1" role="dialog" aria-labelledby="editJOModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editJOModalLabel">Edit Data JO</h5>
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
										<td style='width:25%'><strong>REGION <font color="#FF0000">*</font></strong></td>
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
										<td style='width:25%'><strong>Jabatan/Posisi <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="jabatan_input_modal" id="jabatan_input_modal" class="form-control dropdown-JO-search">
												<option value="">Pilih Jabatan/Posisi</option>
												<?php if ($all_jabatan == null) {
												} else { ?>
													<?php foreach ($all_jabatan as $jabatan) : ?>
														<option value="<?= $jabatan['designation_id']; ?>" style="text-wrap: wrap;">
															<?php echo $jabatan['designation_name']; ?>
														</option>
													<?php endforeach; ?>
												<?php } ?>
											</select>
											<span id='pesan_jabatan_input_modal'></span>
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
			<h4 class="mb-sm-0">Job Order</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="job_order">Master Job Order</a></li>
					<li class="breadcrumb-item active">Job Order</li>
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
					<h5 class="card-title mb-0">Job Order</h5>
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
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<table class="table table-striped">
									<tbody>
										<tr>
											<th scope="row">Total Jumlah Request<span class="icon-verify-nama"></span></th>
											<td id="jumlah_request_tabel"><?php echo $rekap_vacant['request']; ?></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Actual</th>
											<td id="jumlah_actual_tabel"><?php echo $rekap_vacant['fulfill']; ?></td>
										</tr>
										<tr>
											<th scope="row">Total Jumlah Vacant</th>
											<td id="jumlah_vacant_tabel"><?php echo $rekap_vacant['vacant']; ?></td>
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
					<h5 class="card-title mb-0">List Posisi / Jabatan</h5>
					<button onclick="add_job_order()" id="button_add_job_order" class="btn btn-success btn-block">Add Posisi/Jabatan JO</button>
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
								//} else { ?>
									<?php //foreach ($all_jabatan as $jabatan) : ?>
										<option value="<?php //echo $jabatan['designation_id']; ?>" style="text-wrap: wrap;">
											<?php //echo $jabatan['designation_name']; ?>
										</option>
									<?php //endforeach; ?>
								<?php //} ?>
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
					<p>
						<font color="#FF0000">Catatan: Klik add posisi/jabatan JO jika di tabel belum ada posisi/jabatannya</font>
					</p>
					<div class="col-md-12">
						<div class="table-responsive">
							<table id="jo-datatables" class="display table table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Aksi</th>
										<th>ID JABATAN</th>
										<th>NAMA JABATAN</th>
										<th>JUMLAH TOTAL AREA</th>
										<th>JUMLAH AREA ON GOING</th>
										<th>JUMLAH AREA FINISHED</th>
										<th>TOTAL REQUEST</th>
										<th>TOTAL ACTUAL</th>
										<th>TOTAL VACANT</th>
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

		// alert(project);
		// alert(jabatan);
		// alert(region);
		// alert(rekruter);

		//populate data tabel
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
				[1, 'desc']
			],
			'ajax': {
				'url': '<?= base_url() ?>admin/job_order/list_rekap_jo',
				data: {
					[csrfName]: csrfHash,
					// project: project,
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
					data: 'project_id',
					// "orderable": false,
				},
				{
					data: 'project_name',
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_jo',
					"orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_jo',
					"orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_jo',
					"orderable": false,
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
					"orderable": false,
					//searchable: true
				},
				{
					data: 'jumlah_fulfill',
					"orderable": false
				},
				{
					data: 'jumlah_vacant',
					"orderable": false
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
		$('#editJOModalLabel').html("Add Data JO");

		//inisialiasasi variabel modal
		$('#project_input_modal').val("").change();

		$("#project_input_modal").removeAttr('disabled');

		//inisialisasi pesan
		$('#pesan_project_input_modal').html("");

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
		var project_id = $("#project_input_modal").val();
		var project_name = $("#project_input_modal option:selected").text();

		//-------testing-------
		// alert(id_bps_area_modal);
		// alert("masuk button save Data Diri");
		// alert('Server Time: '+ getServerTime());
		// alert('Locale Time: '+ new Date(getServerTime()));

		//-------cek apakah ada yang tidak diisi-------
		var pesan_project_input_modal = "";
		if (project_id == "") {
			pesan_project_input_modal = "<small style='color:#FF0000;'>Project tidak boleh kosong</small>";
			$('#project_id').focus();
		}
		$('#pesan_project_input_modal').html(pesan_project_input_modal);

		//-------action-------
		if (
			(pesan_project_input_modal != "")
		) { //kalau ada input kosong 
			// alert("Tidak boleh ada input kosong");
		} else { //kalau semua terisi dan id_area nya kosong (tambah data baru)
			// AJAX untuk add data interviewer
			// alert("Data ADD OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Job_order/add_master_JO/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					project_id: project_id,
					project_name: project_name,
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

					//tampilkan pesan sukses
					$('.info-modal-edit-JO').attr("hidden", false);
					$('.isi-modal-edit-JO').attr("hidden", true);
					$('.info-modal-edit-JO').html(success_html_text);
					// $('#area').attr("hidden", true);
					tabel_jo.ajax.reload(null, false);
					// window.open("<?= base_url() ?>job_order/" + res, "_blank");
					window.open("<?= base_url() ?>admin/job_order/detail_jo/" + res, "_blank");
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
