<!-- <pre>
    <?php //print_r($_SESSION); 
	?>
</pre> -->

<!-- START MODAL EDIT area -->
<div class="modal fade" id="editareaModal" tabindex="-1" role="dialog" aria-labelledby="editareaModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editareaModalLabel">Edit Data area</h5>
				<button onclick="close_edit_area()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-edit-area">
					<div class="container" id="container_modal_area">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td style='width:25%'><strong>PROVINSI <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="provinsi_input" id="provinsi_input" class="form-control dropdown-area-search">
												<option value="">Pilih Provinsi</option>
												<?php foreach ($all_provinsi as $provinsi) : ?>
													<option value="<?= $provinsi['id_bps']; ?>" style="text-wrap: wrap;">
														<?php echo $provinsi['nama']; ?>
													</option>
												<?php endforeach; ?>
											</select>
											<span id='pesan_provinsi_input'></span>
										</td>
									</tr>
									<tr>
										<td style='width:25%'><strong>ID BPS (ID area sesuai dengan data BPS) <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<input hidden id='id_area_modal' name='id_area_modal' type='text' class='form-control' placeholder='ID area' value=''>
											<input id='id_bps_area_modal' name='id_bps_area_modal' type='text' class='form-control' placeholder='ID BPS area' value=''>
											<span id='pesan_id_bps_area_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>NAMA <font color="#FF0000">*</font></strong></td>
										<td>
											<input id='nama_area_modal' name='nama_area_modal' type='text' class='form-control' placeholder='Nama area' value=''>
											<span id='pesan_nama_area_modal'></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-edit-area"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_edit_area()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button onclick="save_area()" id='button_save_area' name='button_save_area' type='button' class='btn btn-primary'>Save Data area</button>
				<button onclick="delete_area()" id='button_delete_area' name='button_delete_area' type='button' class='btn btn-danger'>Delete Data area</button>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL EDIT area -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
			<h4 class="mb-sm-0">Data area</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="admin/master_table">Master Table</a></li>
					<li class="breadcrumb-item active">Data area</li>
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
					<h5 class="card-title mb-0">List Data area</h5>
					<button onclick="add_area()" id="button_add_area" class="btn btn-success btn-block">Add area</button>
				</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table id="area-datatables" class="display table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>AKSI</th>
								<th>PROVINSI</th>
								<th>ID BPS</th>
								<th>NAMA AREA</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><!--end row-->

<!-- Tombol Open Profile -->
<script type="text/javascript">
	function open_profile(id_kandidat) {
		// alert("ID Kandidat: " + id_kandidat);
		window.open("<?= base_url() ?>profile/" + id_kandidat, "_blank");
	}
</script>

<script type='text/javascript'>
	var tabel_area;
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

		$('.dropdown-area-search').select2({
			width: "100%",
			dropdownParent: $("#container_modal_area")
		});

		//populate data tabel
		tabel_area = $('#area-datatables').DataTable({
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
				[2, 'asc']
			],
			'ajax': {
				'url': '<?= base_url() ?>admin/master_table/list_area',
				data: {
					[csrfName]: csrfHash,
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert("Status :" + xhr.status);
					alert("responseText :" + xhr.responseText);
				},
			},
			'columns': [{
					data: 'aksi',
					// "orderable": false
				},
				{
					data: 'provinsi',
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'id_kab_kota_bps',
					// "orderable": false,
					//searchable: true
				},
				{
					data: 'nama',
					// "orderable": false,
				},
			]
		});
		// }).on('search.dt', () => eventFired('Search'));

	});
</script>

<!-- SHOW MODAL ADD area -->
<script>
	function add_area() {
		// alert(id);

		//judul modal
		$('#editareaModalLabel').html("Add Data area");

		//inisialiasasi variabel modal
		$('#provinsi_input').val("").change();
		$('#id_area_modal').val("");
		$('#id_bps_area_modal').val("");
		$('#nama_area_modal').val("");

		$("#provinsi_input").removeAttr('disabled');
		$("#id_bps_area_modal").prop("readonly", false);
		$("#nama_area_modal").prop("readonly", false);

		//inisialisasi pesan
		$('#pesan_provinsi_input').html("");
		$('#pesan_id_bps_area_modal').html("");
		$('#pesan_nama_area_modal').html("");

		//show modal
		$('.isi-modal-edit-area').attr("hidden", false);
		$('.info-modal-edit-area').attr("hidden", true);
		$('#button_save_area').attr("hidden", false);
		$('#button_delete_area').attr("hidden", true);
		$('#editareaModal').modal('show');
	}
</script>

<!-- SHOW MODAL EDIT area -->
<script>
	function edit_area(id) {
		// alert(id);

		//judul modal
		$('#editareaModalLabel').html("Edit Data area");

		//save id area ke variabel model
		$('#id_area_modal').val(id);

		//inisialisasi pesan
		$('#pesan_provinsi_input').html("");
		$('#pesan_id_bps_area_modal').html("");
		$('#pesan_nama_area_modal').html("");

		$("#provinsi_input").removeAttr('disabled');
		$("#id_bps_area_modal").prop("readonly", false);
		$("#nama_area_modal").prop("readonly", false);

		// AJAX untuk ambil data area terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_area/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-area').attr("hidden", false);
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').html(loading_html_text);
				$('#button_save_area').attr("hidden", true);
				$('#button_delete_area').attr("hidden", true);
				$('#editareaModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$("#provinsi_input").val(res["data"]["id_prov_bps"]).change();
					$('#id_bps_area_modal').val(res['data']['id_kab_kota_bps']);
					$('#nama_area_modal').val(res['data']['nama']);

					$('.isi-modal-edit-area').attr("hidden", false);
					$('.info-modal-edit-area').attr("hidden", true);
					$('#button_save_area').attr("hidden", false);
					$('#button_delete_area').attr("hidden", true);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-area').html(html_text);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#button_delete_area').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-area').html(html_text); //coba pake iframe
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').attr("hidden", false);
				$('#button_save_area').attr("hidden", true);
				$('#button_delete_area').attr("hidden", true);
			}
		});
	}
</script>

<!-- SAVE DATA area -->
<script type="text/javascript">
	function save_area() {
		//-------ambil isi variabel-------
		var provinsi_input = $("#provinsi_input").val();
		var id_area_modal = $("#id_area_modal").val();
		var id_bps_area_modal = $("#id_bps_area_modal").val();
		var nama_area_modal = $("#nama_area_modal").val();

		//-------testing-------
		// alert(id_bps_area_modal);
		// alert("masuk button save Data Diri");
		// alert('Server Time: '+ getServerTime());
		// alert('Locale Time: '+ new Date(getServerTime()));

		//-------cek apakah ada yang tidak diisi-------
		var pesan_provinsi_input = "";
		var pesan_id_bps_area_modal = "";
		var pesan_nama_area_modal = "";
		if (nama_area_modal == "") {
			pesan_nama_area_modal = "<small style='color:#FF0000;'>Nama area tidak boleh kosong</small>";
			$('#nama_area_modal').focus();
		}
		if (id_bps_area_modal == "") {
			pesan_id_bps_area_modal = "<small style='color:#FF0000;'>ID BPS area tidak boleh kosong</small>";
			$('#id_bps_area_modal').focus();
		}
		if (provinsi_input == "") {
			pesan_provinsi_input = "<small style='color:#FF0000;'>Provinsi tidak boleh kosong</small>";
			$('#provinsi_input').focus();
		}
		$('#pesan_provinsi_input').html(pesan_provinsi_input);
		$('#pesan_nama_area_modal').html(pesan_nama_area_modal);
		$('#pesan_id_bps_area_modal').html(pesan_id_bps_area_modal);

		//-------action-------
		if (
			(pesan_nama_area_modal != "") || (pesan_id_bps_area_modal != "") || (pesan_provinsi_input != "")
		) { //kalau ada input kosong 
			// alert("Tidak boleh ada input kosong");
		} else if ((id_area_modal == "") || (id_area_modal == "0")) { //kalau semua terisi dan id_area nya kosong (tambah data baru)
			// AJAX untuk add data interviewer
			// alert("Data ADD OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/add_area/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					id_prov_bps: provinsi_input,
					id_kab_kota_bps: id_bps_area_modal,
					nama: nama_area_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-area').attr("hidden", false);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').html(loading_html_text);
					$('#button_save_area').attr("hidden", true);
					$('#button_delete_area').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//tampilkan pesan sukses
						$('.info-modal-edit-area').attr("hidden", false);
						$('.isi-modal-edit-area').attr("hidden", true);
						$('.info-modal-edit-area').html(success_html_text);
						// $('#area').attr("hidden", true);
						$('#id_area_modal').val("");
						tabel_area.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-area').html(html_text);
						$('.isi-modal-edit-area').attr("hidden", true);
						$('.info-modal-edit-area').attr("hidden", false);
						// $('#area').attr("hidden", true);
						$('#id_area_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-area').html(html_text); //coba pake iframe
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#id_area_modal').val();
				}
			});

			// alert("Tidak ada input kosong");
		} else { //kalau semua terisi dan id_interviewer nya ada isinya
			// AJAX untuk update data interviewer
			// alert("Data OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/update_area/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					id: id_area_modal,
					id_prov_bps: provinsi_input,
					id_kab_kota_bps: id_bps_area_modal,
					nama: nama_area_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-area').attr("hidden", false);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').html(loading_html_text);
					$('#button_save_area').attr("hidden", true);
					$('#button_delete_area').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//update nilai terbaru di halaman profile
						// $('#nama_kontak_tabel').html(res['data']['nama']);
						// $('#hubungan_tabel').html(res['data']['hubungan']);
						// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

						//tampilkan pesan sukses
						$('.info-modal-edit-area').attr("hidden", false);
						$('.isi-modal-edit-area').attr("hidden", true);
						$('.info-modal-edit-area').html(success_html_text);
						$('#button_save_area').attr("hidden", true);
						$('#id_area_modal').val("");
						tabel_area.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-area').html(html_text);
						$('.isi-modal-edit-area').attr("hidden", true);
						$('.info-modal-edit-area').attr("hidden", false);
						$('#button_save_area').attr("hidden", true);
						$('#id_area_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-area').html(html_text); //coba pake iframe
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#id_area_modal').val("");
				}
			});

			// alert("Tidak ada input kosong");
		}
	};
</script>

<!-- SHOW MODAL DELETE area -->
<script>
	function show_delete_area(id) {
		// alert(id);

		//judul modal
		$('#editareaModalLabel').html("Delete Data area");

		//save id area ke variabel model
		$('#id_area_modal').val(id);

		//inisialisasi pesan
		$('#pesan_provinsi_input').html("");
		$('#pesan_id_bps_area_modal').html("");
		$('#pesan_nama_area_modal').html("");

		// AJAX untuk ambil data area terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_area/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-area').attr("hidden", false);
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').html(loading_html_text);
				$('#button_save_area').attr("hidden", true);
				$('#button_delete_area').attr("hidden", true);
				$('#editareaModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$('#provinsi_input').val(res['data']['id_prov_bps']).change();
					$('#id_bps_area_modal').val(res['data']['id_kab_kota_bps']);
					$('#nama_area_modal').val(res['data']['nama']);
					$("#provinsi_input").attr('disabled','disabled');
					$("#id_bps_area_modal").prop("readonly", true);
					$("#nama_area_modal").prop("readonly", true);

					$('.isi-modal-edit-area').attr("hidden", false);
					$('.info-modal-edit-area').html("Apakah anda ingin menghapus data ini?");
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#button_delete_area').attr("hidden", false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-area').html(html_text);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#button_delete_area').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-area').html(html_text); //coba pake iframe
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').attr("hidden", false);
				$('#button_save_area').attr("hidden", true);
				$('#button_delete_area').attr("hidden", true);
			}
		});
	}
</script>

<!-- ACTION DELETE DATA area -->
<script type="text/javascript">
	function delete_area() {
		//-------ambil isi variabel-------
		var id_area_modal = $("#id_area_modal").val();
		// AJAX untuk update data interviewer
		// alert("Data OK");
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/delete_area/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id_area_modal,
			},
			beforeSend: function() {
				// $('#editKontakModal').modal('show');
				$('.info-modal-edit-area').attr("hidden", false);
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').html(loading_html_text);
				$('#button_save_area').attr("hidden", true);
				$('#button_delete_area').attr("hidden", true);
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "200") {
					//update nilai terbaru di halaman profile
					// $('#nama_kontak_tabel').html(res['data']['nama']);
					// $('#hubungan_tabel').html(res['data']['hubungan']);
					// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

					//tampilkan pesan sukses
					$("#provinsi_input").removeAttr('disabled');
					$("#id_bps_area_modal").prop("readonly", false);
					$("#id_bps_area_modal").prop("readonly", false);
					$('.info-modal-edit-area').attr("hidden", false);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').html(success_delete_html_text);
					$('#button_save_area').attr("hidden", true);
					$('#id_area_modal').val("");
					tabel_area.ajax.reload(null, false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-area').html(html_text);
					$('.isi-modal-edit-area').attr("hidden", true);
					$('.info-modal-edit-area').attr("hidden", false);
					$('#button_save_area').attr("hidden", true);
					$('#id_area_modal').val("");
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-area').html(html_text); //coba pake iframe
				$('.isi-modal-edit-area').attr("hidden", true);
				$('.info-modal-edit-area').attr("hidden", false);
				$('#button_save_area').attr("hidden", true);
				$('#id_area_modal').val("");
			}
		});

	};
</script>

<!-- <script type="text/javascript">
    document.getElementById("button_download_data").onclick = function(e) {
        // var project = document.getElementById("project_input").value;
        // var jabatan = document.getElementById("jabatan_input").value;
        // var region = document.getElementById("region_input").value;
        // var rekruter = document.getElementById("rekruter_input").value;
        // var range_tanggal = document.getElementById("range_tanggal").value;
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
</script> -->

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

<!-- Tombol close modal area -->
<script type="text/javascript">
	function close_edit_area() {
		// alert("show modal screening");
		$('#editareaModal').modal('hide');
	}
</script>
