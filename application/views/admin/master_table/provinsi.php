<!-- <pre>
    <?php //print_r($_SESSION); 
	?>
</pre> -->

<!-- START MODAL EDIT PROVINSI -->
<div class="modal fade" id="editProvinsiModal" tabindex="-1" role="dialog" aria-labelledby="editProvinsiModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editProvinsiModalLabel">Edit Data Provinsi</h5>
				<button onclick="close_edit_provinsi()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-edit-provinsi">
					<div class="container" id="container_modal_provinsi">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td style='width:25%'><strong>ID BPS (ID Provinsi sesuai dengan data BPS) <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<input hidden id='id_provinsi_modal' name='id_provinsi_modal' type='text' class='form-control' placeholder='ID provinsi' value=''>
											<input id='id_bps_provinsi_modal' name='id_bps_provinsi_modal' type='text' class='form-control' placeholder='ID BPS Provinsi' value=''>
											<span id='pesan_id_bps_provinsi_modal'></span>
										</td>
									</tr>
									<tr>
										<td><strong>NAMA <font color="#FF0000">*</font></strong></td>
										<td>
											<input id='nama_provinsi_modal' name='nama_provinsi_modal' type='text' class='form-control' placeholder='Nama Provinsi' value=''>
											<span id='pesan_nama_provinsi_modal'></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-edit-provinsi"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_edit_provinsi()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button onclick="save_provinsi()" id='button_save_provinsi' name='button_save_provinsi' type='button' class='btn btn-primary'>Save Data Provinsi</button>
				<button onclick="delete_provinsi()" id='button_delete_provinsi' name='button_delete_provinsi' type='button' class='btn btn-danger'>Delete Data Provinsi</button>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL EDIT PROVINSI -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
			<h4 class="mb-sm-0">Data Provinsi</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="admin/master_table">Master Table</a></li>
					<li class="breadcrumb-item active">Data Provinsi</li>
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
					<h5 class="card-title mb-0">List Data Provinsi</h5>
					<button onclick="add_provinsi()" id="button_add_provinsi" class="btn btn-success btn-block">Add Provinsi</button>
				</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table id="provinsi-datatables" class="display table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>AKSI</th>
								<th>ID BPS</th>
								<th>NAMA</th>
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
	var tabel_provinsi;
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

		$('[data-plugin="select_provinsi_modal"]').select2({
			width: "100%",
			dropdownParent: $("#container_modal_provinsi")
		});

		//populate data tabel
		tabel_provinsi = $('#provinsi-datatables').DataTable({
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
				[1, 'asc']
			],
			'ajax': {
				'url': '<?= base_url() ?>admin/master_table/list_provinsi',
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
					data: 'id_bps',
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

<!-- SHOW MODAL ADD PROVINSI -->
<script>
	function add_provinsi() {
		// alert(id);

		//judul modal
		$('#editProvinsiModalLabel').html("Add Data Provinsi");

		//inisialiasasi variabel modal
		$('#id_provinsi_modal').val("");
		$('#id_bps_provinsi_modal').val("");
		$('#nama_provinsi_modal').val("");

		$("#id_bps_provinsi_modal").prop("readonly", false);
		$("#nama_provinsi_modal").prop("readonly", false);

		//inisialisasi pesan
		$('#pesan_id_bps_provinsi_modal').html("");
		$('#pesan_nama_provinsi_modal').html("");

		//show modal
		$('.isi-modal-edit-provinsi').attr("hidden", false);
		$('.info-modal-edit-provinsi').attr("hidden", true);
		$('#button_save_provinsi').attr("hidden", false);
		$('#button_delete_provinsi').attr("hidden", true);
		$('#editProvinsiModal').modal('show');
	}
</script>

<!-- SHOW MODAL EDIT PROVINSI -->
<script>
	function edit_provinsi(id) {
		// alert(id);

		//judul modal
		$('#editProvinsiModalLabel').html("Edit Data Provinsi");

		//save id provinsi ke variabel model
		$('#id_provinsi_modal').val(id);

		//inisialisasi pesan
		$('#pesan_id_bps_provinsi_modal').html("");
		$('#pesan_nama_provinsi_modal').html("");

		$("#id_bps_provinsi_modal").prop("readonly", false);
		$("#nama_provinsi_modal").prop("readonly", false);

		// AJAX untuk ambil data provinsi terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_provinsi/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').html(loading_html_text);
				$('#button_save_provinsi').attr("hidden", true);
				$('#button_delete_provinsi').attr("hidden", true);
				$('#editProvinsiModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$('#id_bps_provinsi_modal').val(res['data']['id_bps']);
					$('#nama_provinsi_modal').val(res['data']['nama']);

					$('.isi-modal-edit-provinsi').attr("hidden", false);
					$('.info-modal-edit-provinsi').attr("hidden", true);
					$('#button_save_provinsi').attr("hidden", false);
					$('#button_delete_provinsi').attr("hidden", true);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-provinsi').html(html_text);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#button_delete_provinsi').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-provinsi').html(html_text); //coba pake iframe
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('#button_save_provinsi').attr("hidden", true);
				$('#button_delete_provinsi').attr("hidden", true);
			}
		});
	}
</script>

<!-- SAVE DATA PROVINSI -->
<script type="text/javascript">
	function save_provinsi() {
		//-------ambil isi variabel-------
		var id_provinsi_modal = $("#id_provinsi_modal").val();
		var id_bps_provinsi_modal = $("#id_bps_provinsi_modal").val();
		var nama_provinsi_modal = $("#nama_provinsi_modal").val();

		//-------testing-------
		// alert(id_interviewer_modal);
		// alert("masuk button save Data Diri");
		// alert('Server Time: '+ getServerTime());
		// alert('Locale Time: '+ new Date(getServerTime()));

		//-------cek apakah ada yang tidak diisi-------
		var pesan_id_bps_provinsi_modal = "";
		var pesan_nama_provinsi_modal = "";
		if (nama_provinsi_modal == "") {
			pesan_nama_provinsi_modal = "<small style='color:#FF0000;'>Nama Provinsi tidak boleh kosong</small>";
			$('#nama_provinsi_modal').focus();
		}
		if (id_bps_provinsi_modal == "") {
			pesan_id_bps_provinsi_modal = "<small style='color:#FF0000;'>ID BPS Provinsi tidak boleh kosong</small>";
			$('#id_bps_provinsi_modal').focus();
		}
		$('#pesan_nama_provinsi_modal').html(pesan_nama_provinsi_modal);
		$('#pesan_id_bps_provinsi_modal').html(pesan_id_bps_provinsi_modal);

		//-------action-------
		if (
			(pesan_nama_provinsi_modal != "") || (pesan_id_bps_provinsi_modal != "")
		) { //kalau ada input kosong 
			// alert("Tidak boleh ada input kosong");
		} else if ((id_provinsi_modal == "") || (id_provinsi_modal == "0")) { //kalau semua terisi dan id_provinsi nya kosong (tambah data baru)
			// AJAX untuk add data interviewer
			// alert("Data ADD OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/add_provinsi/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					id_bps: id_bps_provinsi_modal,
					nama: nama_provinsi_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').html(loading_html_text);
					$('#button_save_provinsi').attr("hidden", true);
					$('#button_delete_provinsi').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//tampilkan pesan sukses
						$('.info-modal-edit-provinsi').attr("hidden", false);
						$('.isi-modal-edit-provinsi').attr("hidden", true);
						$('.info-modal-edit-provinsi').html(success_html_text);
						$('#provinsi').attr("hidden", true);
						$('#id_provinsi_modal').val("");
						tabel_provinsi.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-provinsi').html(html_text);
						$('.isi-modal-edit-provinsi').attr("hidden", true);
						$('.info-modal-edit-provinsi').attr("hidden", false);
						$('#provinsi').attr("hidden", true);
						$('#id_provinsi_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-provinsi').html(html_text); //coba pake iframe
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#id_provinsi_modal').val("");
				}
			});

			// alert("Tidak ada input kosong");
		} else { //kalau semua terisi dan id_interviewer nya ada isinya
			// AJAX untuk update data interviewer
			// alert("Data OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/update_provinsi/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					id: id_provinsi_modal,
					id_bps: id_bps_provinsi_modal,
					nama: nama_provinsi_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').html(loading_html_text);
					$('#button_save_provinsi').attr("hidden", true);
					$('#button_delete_provinsi').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//update nilai terbaru di halaman profile
						// $('#nama_kontak_tabel').html(res['data']['nama']);
						// $('#hubungan_tabel').html(res['data']['hubungan']);
						// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

						//tampilkan pesan sukses
						$('.info-modal-edit-provinsi').attr("hidden", false);
						$('.isi-modal-edit-provinsi').attr("hidden", true);
						$('.info-modal-edit-provinsi').html(success_html_text);
						$('#button_save_provinsi').attr("hidden", true);
						$('#id_provinsi_modal').val("");
						tabel_provinsi.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-provinsi').html(html_text);
						$('.isi-modal-edit-provinsi').attr("hidden", true);
						$('.info-modal-edit-provinsi').attr("hidden", false);
						$('#button_save_provinsi').attr("hidden", true);
						$('#id_provinsi_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-provinsi').html(html_text); //coba pake iframe
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#id_provinsi_modal').val("");
				}
			});

			// alert("Tidak ada input kosong");
		}
	};
</script>

<!-- SHOW MODAL DELETE PROVINSI -->
<script>
	function show_delete_provinsi(id) {
		// alert(id);

		//judul modal
		$('#editProvinsiModalLabel').html("Delete Data Provinsi");

		//save id provinsi ke variabel model
		$('#id_provinsi_modal').val(id);

		//inisialisasi pesan
		$('#pesan_id_bps_provinsi_modal').html("");
		$('#pesan_nama_provinsi_modal').html("");

		// AJAX untuk ambil data provinsi terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_provinsi/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').html(loading_html_text);
				$('#button_save_provinsi').attr("hidden", true);
				$('#button_delete_provinsi').attr("hidden", true);
				$('#editProvinsiModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$('#id_bps_provinsi_modal').val(res['data']['id_bps']);
					$('#nama_provinsi_modal').val(res['data']['nama']);
					$("#id_bps_provinsi_modal").prop("readonly", true);
					$("#nama_provinsi_modal").prop("readonly", true);

					$('.isi-modal-edit-provinsi').attr("hidden", false);
					$('.info-modal-edit-provinsi').html("Apakah anda ingin menghapus data ini?");
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#button_delete_provinsi').attr("hidden", false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-provinsi').html(html_text);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#button_delete_provinsi').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-provinsi').html(html_text); //coba pake iframe
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('#button_save_provinsi').attr("hidden", true);
				$('#button_delete_provinsi').attr("hidden", true);
			}
		});
	}
</script>

<!-- ACTION DELETE DATA PROVINSI -->
<script type="text/javascript">
	function delete_provinsi() {
		//-------ambil isi variabel-------
		var id_provinsi_modal = $("#id_provinsi_modal").val();
		// AJAX untuk update data interviewer
		// alert("Data OK");
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/delete_provinsi/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id_provinsi_modal,
			},
			beforeSend: function() {
				// $('#editKontakModal').modal('show');
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').html(loading_html_text);
				$('#button_save_provinsi').attr("hidden", true);
				$('#button_delete_provinsi').attr("hidden", true);
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "200") {
					//update nilai terbaru di halaman profile
					// $('#nama_kontak_tabel').html(res['data']['nama']);
					// $('#hubungan_tabel').html(res['data']['hubungan']);
					// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

					//tampilkan pesan sukses
					$("#id_bps_provinsi_modal").prop("readonly", false);
					$("#id_bps_provinsi_modal").prop("readonly", false);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').html(success_delete_html_text);
					$('#button_save_provinsi').attr("hidden", true);
					$('#id_provinsi_modal').val("");
					tabel_provinsi.ajax.reload(null, false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-provinsi').html(html_text);
					$('.isi-modal-edit-provinsi').attr("hidden", true);
					$('.info-modal-edit-provinsi').attr("hidden", false);
					$('#button_save_provinsi').attr("hidden", true);
					$('#id_provinsi_modal').val("");
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-provinsi').html(html_text); //coba pake iframe
				$('.isi-modal-edit-provinsi').attr("hidden", true);
				$('.info-modal-edit-provinsi').attr("hidden", false);
				$('#button_save_provinsi').attr("hidden", true);
				$('#id_provinsi_modal').val("");
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

<!-- Tombol close modal provinsi -->
<script type="text/javascript">
	function close_edit_provinsi() {
		// alert("show modal screening");
		$('#editProvinsiModal').modal('hide');
	}
</script>
