<!-- <pre>
    <?php //print_r($_SESSION); 
	?>
</pre> -->

<!-- START MODAL EDIT region -->
<div class="modal fade" id="editregionModal" tabindex="-1" role="dialog" aria-labelledby="editregionModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editregionModalLabel">Edit Data Region</h5>
				<button onclick="close_edit_region()" type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="isi-modal-edit-region">
					<div class="container" id="container_modal_region">
						<div class="row">
							<table class="table table-striped col-md-12">
								<tbody>
									<tr>
										<td><strong>NAMA REGION <font color="#FF0000">*</font></strong></td>
										<td>
											<input hidden id='id_region_modal' name='id_region_modal' type='text' class='form-control' placeholder='ID region' value=''>
											<input id='nama_region_modal' name='nama_region_modal' type='text' class='form-control' placeholder='Nama region' value=''>
											<span id='pesan_nama_region_modal'></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="info-modal-edit-region"></div>

			</div>
			<div class="modal-footer">
				<button onclick="close_edit_region()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
				<button onclick="save_region()" id='button_save_region' name='button_save_region' type='button' class='btn btn-primary'>Save data region</button>
				<button onclick="delete_region()" id='button_delete_region' name='button_delete_region' type='button' class='btn btn-danger'>Delete data region</button>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL EDIT region -->

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
			<h4 class="mb-sm-0">Data region</h4>

			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="admin/master_table">Master Table</a></li>
					<li class="breadcrumb-item active">Data region</li>
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
					<h5 class="card-title mb-0">List Data Region</h5>
					<button onclick="add_region()" id="button_add_region" class="btn btn-success btn-block">Add region</button>
				</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table id="region-datatables" class="display table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>AKSI</th>
								<th>NAMA REGION</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><!--end row-->

<script type='text/javascript'>
	var tabel_region;
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

		$('.dropdown-region-search').select2({
			width: "100%",
			dropdownParent: $("#container_modal_region")
		});

		//populate data tabel
		tabel_region = $('#region-datatables').DataTable({
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
				'url': '<?= base_url() ?>admin/master_table/list_region',
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
					"orderable": false
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

<!-- SHOW MODAL ADD region -->
<script>
	function add_region() {
		// alert(id);

		//judul modal
		$('#editregionModalLabel').html("Add Data region");

		//inisialiasasi variabel modal
		$('#id_region_modal').val("");
		$('#nama_region_modal').val("");

		$("#nama_region_modal").prop("readonly", false);

		//inisialisasi pesan
		$('#pesan_nama_region_modal').html("");

		//show modal
		$('.isi-modal-edit-region').attr("hidden", false);
		$('.info-modal-edit-region').attr("hidden", true);
		$('#button_save_region').attr("hidden", false);
		$('#button_delete_region').attr("hidden", true);
		$('#editregionModal').modal('show');
	}
</script>

<!-- SHOW MODAL EDIT region -->
<script>
	function edit_region(id) {
		// alert(id);

		//judul modal
		$('#editregionModalLabel').html("Edit data region");

		//save id region ke variabel model
		$('#id_region_modal').val(id);

		//inisialisasi pesan
		$('#pesan_nama_region_modal').html("");

		$("#nama_region_modal").prop("readonly", false);

		// AJAX untuk ambil data region terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_region/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-region').attr("hidden", false);
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').html(loading_html_text);
				$('#button_save_region').attr("hidden", true);
				$('#button_delete_region').attr("hidden", true);
				$('#editregionModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$('#nama_region_modal').val(res['data']['nama']);

					$('.isi-modal-edit-region').attr("hidden", false);
					$('.info-modal-edit-region').attr("hidden", true);
					$('#button_save_region').attr("hidden", false);
					$('#button_delete_region').attr("hidden", true);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-region').html(html_text);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#button_delete_region').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-region').html(html_text); //coba pake iframe
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').attr("hidden", false);
				$('#button_save_region').attr("hidden", true);
				$('#button_delete_region').attr("hidden", true);
			}
		});
	}
</script>

<!-- SAVE DATA region -->
<script type="text/javascript">
	function save_region() {
		//-------ambil isi variabel-------
		var id_region_modal = $("#id_region_modal").val();
		var nama_region_modal = $("#nama_region_modal").val();

		//-------testing-------
		// alert(id_bps_region_modal);
		// alert("masuk button save Data Diri");
		// alert('Server Time: '+ getServerTime());
		// alert('Locale Time: '+ new Date(getServerTime()));

		//-------cek apakah ada yang tidak diisi-------
		var pesan_nama_region_modal = "";
		if (nama_region_modal == "") {
			pesan_nama_region_modal = "<small style='color:#FF0000;'>Nama region tidak boleh kosong</small>";
			$('#nama_region_modal').focus();
		}
		$('#pesan_nama_region_modal').html(pesan_nama_region_modal);

		//-------action-------
		if (
			(pesan_nama_region_modal != "")
		) { //kalau ada input kosong 
			// alert("Tidak boleh ada input kosong");
		} else if ((id_region_modal == "") || (id_region_modal == "0")) { //kalau semua terisi dan id_region nya kosong (tambah data baru)
			// AJAX untuk add data interviewer
			// alert("Data ADD OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/add_region/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					nama: nama_region_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-region').attr("hidden", false);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').html(loading_html_text);
					$('#button_save_region').attr("hidden", true);
					$('#button_delete_region').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//tampilkan pesan sukses
						$('.info-modal-edit-region').attr("hidden", false);
						$('.isi-modal-edit-region').attr("hidden", true);
						$('.info-modal-edit-region').html(success_html_text);
						$('#id_region_modal').val("");
						tabel_region.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-region').html(html_text);
						$('.isi-modal-edit-region').attr("hidden", true);
						$('.info-modal-edit-region').attr("hidden", false);
						$('#id_region_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-region').html(html_text); //coba pake iframe
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#id_region_modal').val("");
				}
			});

			// alert("Tidak ada input kosong");
		} else { //kalau semua terisi dan id_interviewer nya ada isinya
			// AJAX untuk update data interviewer
			// alert("Data OK");
			$.ajax({
				url: '<?= base_url() ?>admin/Master_table/update_region/',
				method: 'post',
				data: {
					[csrfName]: csrfHash,
					id: id_region_modal,
					nama: nama_region_modal,
				},
				beforeSend: function() {
					// $('#editKontakModal').modal('show');
					$('.info-modal-edit-region').attr("hidden", false);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').html(loading_html_text);
					$('#button_save_region').attr("hidden", true);
					$('#button_delete_region').attr("hidden", true);
				},
				success: function(response) {

					var res = jQuery.parseJSON(response);

					if (res['status'] == "200") {
						//update nilai terbaru di halaman profile
						// $('#nama_kontak_tabel').html(res['data']['nama']);
						// $('#hubungan_tabel').html(res['data']['hubungan']);
						// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

						//tampilkan pesan sukses
						$('.info-modal-edit-region').attr("hidden", false);
						$('.isi-modal-edit-region').attr("hidden", true);
						$('.info-modal-edit-region').html(success_html_text);
						$('#button_save_region').attr("hidden", true);
						$('#id_region_modal').val("");
						tabel_region.ajax.reload(null, false);
					} else {
						html_text = res['pesan'];
						$('.info-modal-edit-region').html(html_text);
						$('.isi-modal-edit-region').attr("hidden", true);
						$('.info-modal-edit-region').attr("hidden", false);
						$('#button_save_region').attr("hidden", true);
						$('#id_region_modal').val("");
					}
				},
				error: function(xhr, status, error) {
					html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
					html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
					// html_text = "Gagal fetch data. Kode error: " + xhr.status;
					$('.info-modal-edit-region').html(html_text); //coba pake iframe
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#id_region_modal').val("");
				}
			});

			// alert("Tidak ada input kosong");
		}
	};
</script>

<!-- SHOW MODAL DELETE region -->
<script>
	function show_delete_region(id) {
		// alert(id);

		//judul modal
		$('#editregionModalLabel').html("Delete data region");

		//save id region ke variabel model
		$('#id_region_modal').val(id);

		//inisialisasi pesan
		$('#pesan_nama_region_modal').html("");

		// AJAX untuk ambil data region terupdate
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/get_data_region/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id,
			},
			beforeSend: function() {
				$('.info-modal-edit-region').attr("hidden", false);
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').html(loading_html_text);
				$('#button_save_region').attr("hidden", true);
				$('#button_delete_region').attr("hidden", true);
				$('#editregionModal').modal('show');
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "1") {
					$('#nama_region_modal').val(res['data']['nama']);
					$("#nama_region_modal").prop("readonly", true);

					$('.isi-modal-edit-region').attr("hidden", false);
					$('.info-modal-edit-region').html("Apakah anda ingin menghapus data ini?");
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#button_delete_region').attr("hidden", false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-region').html(html_text);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#button_delete_region').attr("hidden", true);
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-region').html(html_text); //coba pake iframe
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').attr("hidden", false);
				$('#button_save_region').attr("hidden", true);
				$('#button_delete_region').attr("hidden", true);
			}
		});
	}
</script>

<!-- ACTION DELETE DATA region -->
<script type="text/javascript">
	function delete_region() {
		//-------ambil isi variabel-------
		var id_region_modal = $("#id_region_modal").val();
		// AJAX untuk update data interviewer
		// alert("Data OK");
		$.ajax({
			url: '<?= base_url() ?>admin/Master_table/delete_region/',
			method: 'post',
			data: {
				[csrfName]: csrfHash,
				id: id_region_modal,
			},
			beforeSend: function() {
				// $('#editKontakModal').modal('show');
				$('.info-modal-edit-region').attr("hidden", false);
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').html(loading_html_text);
				$('#button_save_region').attr("hidden", true);
				$('#button_delete_region').attr("hidden", true);
			},
			success: function(response) {

				var res = jQuery.parseJSON(response);

				if (res['status'] == "200") {
					//update nilai terbaru di halaman profile
					// $('#nama_kontak_tabel').html(res['data']['nama']);
					// $('#hubungan_tabel').html(res['data']['hubungan']);
					// $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

					//tampilkan pesan sukses
					$("#nama_region_modal").prop("readonly", false);
					$('.info-modal-edit-region').attr("hidden", false);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').html(success_delete_html_text);
					$('#button_save_region').attr("hidden", true);
					$('#id_region_modal').val("");
					tabel_region.ajax.reload(null, false);
				} else {
					html_text = res['pesan'];
					$('.info-modal-edit-region').html(html_text);
					$('.isi-modal-edit-region').attr("hidden", true);
					$('.info-modal-edit-region').attr("hidden", false);
					$('#button_save_region').attr("hidden", true);
					$('#id_region_modal').val("");
				}
			},
			error: function(xhr, status, error) {
				html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
				html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
				// html_text = "Gagal fetch data. Kode error: " + xhr.status;
				$('.info-modal-edit-region').html(html_text); //coba pake iframe
				$('.isi-modal-edit-region').attr("hidden", true);
				$('.info-modal-edit-region').attr("hidden", false);
				$('#button_save_region').attr("hidden", true);
				$('#id_region_modal').val("");
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

<!-- Tombol close modal region -->
<script type="text/javascript">
	function close_edit_region() {
		// alert("show modal screening");
		$('#editregionModal').modal('hide');
	}
</script>
