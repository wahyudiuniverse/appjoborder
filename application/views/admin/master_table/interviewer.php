<!-- <pre>
    <?php //print_r($_SESSION); 
    ?>
</pre> -->

<!-- START MODAL EDIT INTERVIEWER -->
<div class="modal fade" id="editInterviewerModal" tabindex="-1" role="dialog" aria-labelledby="editInterviewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInterviewerModalLabel">Edit Data Interviewer</h5>
                <button onclick="close_edit_interviewer()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="isi-modal-edit-interviewer">
                    <div class="container" id="container_modal_interviewer">
                        <div class="row">
                            <table class="table table-striped col-md-12">
                                <tbody>
                                    <tr>
                                        <td style='width:25%'><strong>NIP</strong></td>
                                        <td style='width:75%'>
                                            <input hidden id='id_interviewer_modal' name='id_interviewer_modal' type='text' class='form-control' placeholder='NIP Interviewer' value=''>
                                            <input id='nip_interviewer_modal' name='nip_interviewer_modal' type='text' class='form-control' placeholder='NIP Interviewer' value=''>
                                            <span id='pesan_nip_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>NAMA <font color="#FF0000">*</font></strong></td>
                                        <td>
                                            <input id='nama_interviewer_modal' name='nama_interviewer_modal' type='text' class='form-control' placeholder='Nama Interviewer' value=''>
                                            <span id='pesan_nama_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>NAMA LENGKAP</strong></td>
                                        <td>
                                            <input id='nama_lengkap_interviewer_modal' name='nama_lengkap_interviewer_modal' type='text' class='form-control' placeholder='Nama Lengkap Interviewer' value=''>
                                            <span id='pesan_nama_lengkap_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>JABATAN <font color="#FF0000">*</font></strong></td>
                                        <td>
                                            <input id='jabatan_interviewer_modal' name='jabatan_interviewer_modal' type='text' class='form-control' placeholder='Jabatan Interviewer' value=''>
                                            <span id='pesan_jabatan_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>AREA <font color="#FF0000">*</font></strong></td>
                                        <td>
                                            <input id='area_interviewer_modal' name='area_interviewer_modal' type='text' class='form-control' placeholder='Area Interviewer' value=''>
                                            <span id='pesan_area_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td><strong>REGION <font color="#FF0000">*</font></strong></td>
                                        <td>
                                            <input id='region_interviewer_modal' name='region_interviewer_modal' type='text' class='form-control' placeholder='Region Interviewer' value=''>
                                            <span id='pesan_region_interviewer_modal'></span>
                                        </td>
                                    </tr> -->
									<tr>
										<td style='width:25%'><strong>REGION <font color="#FF0000">*</font></strong></td>
										<td style='width:75%'>
											<select name="region_interviewer_modal" id="region_interviewer_modal" class="form-control select_interviewer_modal">
												<option value="">Pilih REGION</option>
												<?php foreach ($all_region as $region) : ?>
													<option value="<?php echo $region['id']; ?>" style="text-wrap: wrap;">
														<?php echo $region['nama']; ?>
													</option>
												<?php endforeach; ?>
											</select>
											<span id='pesan_region_interviewer_modal'></span>
										</td>
									</tr>
                                    <tr>
                                        <td><strong>Status <font color="#FF0000">*</font></strong></td>
                                        <td>
                                            <select class="form-control" id="status_interviewer_modal" name="status_interviewer_modal" data-plugin="select_interviewer_modal" data-placeholder="Pilih Status">
                                                <option value="">Pilih Status</option>
                                                <option value="1">AKTIF</option>
                                                <option value="0">TIDAK AKTIF</option>
                                            </select>
                                            <span id='pesan_status_interviewer_modal'></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="info-modal-edit-interviewer"></div>

            </div>
            <div class="modal-footer">
                <button onclick="close_edit_interviewer()" type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                <button onclick="save_interviewer()" id='button_save_interviewer' name='button_save_interviewer' type='button' class='btn btn-primary'>Save Data Interviewer</button>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL EDIT INTERVIEWER -->

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Data Interviewer</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="admin/master_table">Master Table</a></li>
                    <li class="breadcrumb-item active">Data Interviewer</li>
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
                    <h5 class="card-title mb-0">List Data Interviewer</h5>
                    <button onclick="add_interviewer()" id="button_add_interviewer" class="btn btn-success btn-block">Add Interviewer</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="interviewer-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>AKSI</th>
                                <th>NIP</th>
                                <th>NAMA</th>
                                <th>NAMA LENGKAP</th>
                                <th>JABATAN</th>
                                <th>AREA</th>
                                <th>REGION</th>
                                <th>STATUS</th>
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
    var tabel_interviewer;
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

    // execute kalau page sudah ke load 
    $(document).ready(function() {
        //inisialisasi select2 untuk searchable dropdown
        $('.dropdown-dengan-search').select2({
            width: '100%'
        });

        $('.select_interviewer_modal').select2({
            width: "100%",
            dropdownParent: $("#container_modal_interviewer")
        });

        //inisialisasi flatcpickr untuk select tanggal
        // $("#range_tanggal").flatpickr({
        //     mode: "range",
        //     dateFormat: "Y-m-d",
        //     // maxDate: new Date().fp_incr(14),
        //     onChange: function(selectedDates, dateStr, instance) {
        //         //...
        //         // maxDate: new Date(dateStr).fp_incr(14),
        //         if (dateStr == "") {

        //         } else {
        //             newMaxDate = new Date(selectedDates[0]).fp_incr(31);
        //             newMinDate = new Date(selectedDates[0]);
        //             instance.set('maxDate', newMaxDate);
        //             instance.set('minDate', newMinDate);
        //         }

        //         // alert(new Date(selectedDates[0]).fp_incr(14));
        //     },
        //     onOpen: function(selectedDates, dateStr, instance) {
        //         // ...
        //         instance.set('maxDate', null);
        //         instance.set('minDate', null);
        //         instance.clear();
        //     }
        // });

        // var project = document.getElementById("project_input").value;

        // alert(project);
        // alert(jabatan);
        // alert(region);
        // alert(rekruter);

        //populate data tabel
        tabel_interviewer = $('#interviewer-datatables').DataTable({
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
                'url': '<?= base_url() ?>admin/master_table/list_interviewer',
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
                    data: 'nip',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'nama',
                    // "orderable": false,
                },
                {
                    data: 'nama_lengkap',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'jabatan',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'area',
                    // "orderable": false
                },
                {
                    data: 'region',
                    // "orderable": false
                },
                {
                    data: 'status',
                    "orderable": false,
                },
            ]
        });
        // }).on('search.dt', () => eventFired('Search'));

    });
</script>

<!-- SHOW MODAL ADD INTERVIEWER -->
<script>
    function add_interviewer(id) {
        // alert(id);

        //judul modal
        $('#editInterviewerModalLabel').html("Add Data Interviewer");

        //inisialiasasi variabel model
        $('#id_interviewer_modal').val("");
        $('#nip_interviewer_modal').val("");
        $('#nama_interviewer_modal').val("");
        $('#nama_lengkap_interviewer_modal').val("");
        $('#jabatan_interviewer_modal').val("");
        $('#area_interviewer_modal').val("");
        $('#region_interviewer_modal').val("");
        $("#status_interviewer_modal").val("1").change();

        //inisialisasi pesan
        $('#pesan_nip_interviewer_modal').html("");
        $('#pesan_nama_interviewer_modal').html("");
        $('#pesan_nama_lengkap_interviewer_modal').html("");
        $('#pesan_jabatan_interviewer_modal').html("");
        $('#pesan_area_interviewer_modal').html("");
        $('#pesan_region_interviewer_modal').html("");
        $('#pesan_status_interviewer_modal').html("");

        //show modal
        $('.isi-modal-edit-interviewer').attr("hidden", false);
        $('.info-modal-edit-interviewer').attr("hidden", true);
        $('#button_save_interviewer').attr("hidden", false);
        $('#editInterviewerModal').modal('show');
    }
</script>

<!-- SHOW MODAL EDIT INTERVIEWER -->
<script>
    function edit_interviewer(id) {
        // alert(id);

        //judul modal
        $('#editInterviewerModalLabel').html("Edit Data Interviewer");

        //save id interviewer ke variabel model
        $('#id_interviewer_modal').val(id);

        //inisialisasi pesan
        $('#pesan_nip_interviewer_modal').html("");
        $('#pesan_nama_interviewer_modal').html("");
        $('#pesan_nama_lengkap_interviewer_modal').html("");
        $('#pesan_jabatan_interviewer_modal').html("");
        $('#pesan_area_interviewer_modal').html("");
        $('#pesan_region_interviewer_modal').html("");
        $('#pesan_status_interviewer_modal').html("");

        // AJAX untuk ambil data employee terupdate
        $.ajax({
            url: '<?= base_url() ?>admin/Master_table/get_data_Interviewer/',
            method: 'post',
            data: {
                [csrfName]: csrfHash,
                id: id,
            },
            beforeSend: function() {
                $('.info-modal-edit-interviewer').attr("hidden", false);
                $('.isi-modal-edit-interviewer').attr("hidden", true);
                $('.info-modal-edit-interviewer').html(loading_html_text);
                $('#button_save_interviewer').attr("hidden", true);
                $('#editInterviewerModal').modal('show');
            },
            success: function(response) {

                var res = jQuery.parseJSON(response);

                if (res['status'] == "1") {
                    $('#nip_interviewer_modal').val(res['data']['nip']);
                    $('#nama_interviewer_modal').val(res['data']['nama']);
                    $('#nama_lengkap_interviewer_modal').val(res['data']['nama_lengkap']);
                    $('#jabatan_interviewer_modal').val(res['data']['jabatan']);
                    $('#area_interviewer_modal').val(res['data']['area']);
                    $('#region_interviewer_modal').val(res['data']['id_region']).change();
                    $("#status_interviewer_modal").val(res['data']['status_aktif']).change();

                    $('.isi-modal-edit-interviewer').attr("hidden", false);
                    $('.info-modal-edit-interviewer').attr("hidden", true);
                    $('#button_save_interviewer').attr("hidden", false);
                } else {
                    html_text = res['pesan'];
                    $('.info-modal-edit-interviewer').html(html_text);
                    $('.isi-modal-edit-interviewer').attr("hidden", true);
                    $('.info-modal-edit-interviewer').attr("hidden", false);
                    $('#button_save_interviewer').attr("hidden", true);
                }
            },
            error: function(xhr, status, error) {
                html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
                html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
                // html_text = "Gagal fetch data. Kode error: " + xhr.status;
                $('.info-modal-edit-interviewer').html(html_text); //coba pake iframe
                $('.isi-modal-edit-interviewer').attr("hidden", true);
                $('.info-modal-edit-interviewer').attr("hidden", false);
                $('#button_save_interviewer').attr("hidden", true);
            }
        });
    }
</script>

<!-- SAVE DATA INTERVIEWER -->
<script type="text/javascript">
    function save_interviewer() {
        //-------ambil isi variabel-------
        var id_interviewer_modal = $("#id_interviewer_modal").val();
        var nip_interviewer_modal = $("#nip_interviewer_modal").val();
        var nama_interviewer_modal = $("#nama_interviewer_modal").val();
        var nama_lengkap_interviewer_modal = $("#nama_lengkap_interviewer_modal").val();
        var jabatan_interviewer_modal = $("#jabatan_interviewer_modal").val();
        var area_interviewer_modal = $("#area_interviewer_modal").val();
        var region_interviewer_modal = $("#region_interviewer_modal").val();
        var status_interviewer_modal = $("#status_interviewer_modal option:selected").val();

        //-------testing-------
        // alert(id_interviewer_modal);
        // alert("masuk button save Data Diri");
        // alert('Server Time: '+ getServerTime());
        // alert('Locale Time: '+ new Date(getServerTime()));

        //-------cek apakah ada yang tidak diisi-------
        var pesan_nama_interviewer_modal = "";
        var pesan_jabatan_interviewer_modal = "";
        var pesan_area_interviewer_modal = "";
        var pesan_region_interviewer_modal = "";
        var pesan_status_interviewer_modal = "";
        if (status_interviewer_modal == "") {
            pesan_status_interviewer_modal = "<small style='color:#FF0000;'>Status interviewer tidak boleh kosong</small>";
            $('#status_interviewer_modal').focus();
        }
        if (region_interviewer_modal == "") {
            pesan_region_interviewer_modal = "<small style='color:#FF0000;'>Region interviewer tidak boleh kosong</small>";
            $('#region_interviewer_modal').focus();
        }
        if (area_interviewer_modal == "") {
            pesan_area_interviewer_modal = "<small style='color:#FF0000;'>Area interviewer tidak boleh kosong</small>";
            $('#area_interviewer_modal').focus();
        }
        if (jabatan_interviewer_modal == "") {
            pesan_jabatan_interviewer_modal = "<small style='color:#FF0000;'>Jabatan interviewer tidak boleh kosong</small>";
            $('#jabatan_interviewer_modal').focus();
        }
        if (nama_interviewer_modal == "") {
            pesan_nama_interviewer_modal = "<small style='color:#FF0000;'>Nama interviewer tidak boleh kosong</small>";
            $('#nama_interviewer_modal').focus();
        }
        $('#pesan_nama_interviewer_modal').html(pesan_nama_interviewer_modal);
        $('#pesan_jabatan_interviewer_modal').html(pesan_jabatan_interviewer_modal);
        $('#pesan_area_interviewer_modal').html(pesan_area_interviewer_modal);
        $('#pesan_region_interviewer_modal').html(pesan_region_interviewer_modal);
        $('#pesan_status_interviewer_modal').html(pesan_status_interviewer_modal);

        //-------action-------
        if (
            (pesan_nama_interviewer_modal != "") || (pesan_jabatan_interviewer_modal != "") ||
            (pesan_area_interviewer_modal != "") || (pesan_region_interviewer_modal != "") ||
            (pesan_status_interviewer_modal != "")
        ) { //kalau ada input kosong 
            // alert("Tidak boleh ada input kosong");
        } else if ((id_interviewer_modal == "") || (id_interviewer_modal == "0")) { //kalau semua terisi dan id_interviewer nya kosong
            // AJAX untuk add data interviewer
            // alert("Data ADD OK");
            $.ajax({
                url: '<?= base_url() ?>admin/Master_table/add_interviewer/',
                method: 'post',
                data: {
                    [csrfName]: csrfHash,
                    id: id_interviewer_modal,
                    nip: nip_interviewer_modal,
                    nama: nama_interviewer_modal,
                    nama_lengkap: nama_lengkap_interviewer_modal,
                    jabatan: jabatan_interviewer_modal,
                    area: area_interviewer_modal,
                    region: region_interviewer_modal,
                    status: status_interviewer_modal,
                },
                beforeSend: function() {
                    // $('#editKontakModal').modal('show');
                    $('.info-modal-edit-interviewer').attr("hidden", false);
                    $('.isi-modal-edit-interviewer').attr("hidden", true);
                    $('.info-modal-edit-interviewer').html(loading_html_text);
                    $('#button_save_interviewer').attr("hidden", true);
                },
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res['status'] == "200") {
                        //update nilai terbaru di halaman profile
                        // $('#nama_kontak_tabel').html(res['data']['nama']);
                        // $('#hubungan_tabel').html(res['data']['hubungan']);
                        // $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

                        //tampilkan pesan sukses
                        $('.info-modal-edit-interviewer').attr("hidden", false);
                        $('.isi-modal-edit-interviewer').attr("hidden", true);
                        $('.info-modal-edit-interviewer').html(success_html_text);
                        $('#button_save_interviewer').attr("hidden", true);
                        $('#id_interviewer_modal').val("");
                        tabel_interviewer.ajax.reload(null, false);
                    } else {
                        html_text = res['pesan'];
                        $('.info-modal-edit-interviewer').html(html_text);
                        $('.isi-modal-edit-interviewer').attr("hidden", true);
                        $('.info-modal-edit-interviewer').attr("hidden", false);
                        $('#button_save_interviewer').attr("hidden", true);
                        $('#id_interviewer_modal').val("");
                    }
                },
                error: function(xhr, status, error) {
                    html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
                    html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
                    // html_text = "Gagal fetch data. Kode error: " + xhr.status;
                    $('.info-modal-edit-interviewer').html(html_text); //coba pake iframe
                    $('.isi-modal-edit-interviewer').attr("hidden", true);
                    $('.info-modal-edit-interviewer').attr("hidden", false);
                    $('#button_save_interviewer').attr("hidden", true);
                    $('#id_interviewer_modal').val("");
                }
            });

            // alert("Tidak ada input kosong");
        } else { //kalau semua terisi dan id_interviewer nya ada isinya
            // AJAX untuk update data interviewer
            // alert("Data OK");
            $.ajax({
                url: '<?= base_url() ?>admin/Master_table/update_interviewer/',
                method: 'post',
                data: {
                    [csrfName]: csrfHash,
                    id: id_interviewer_modal,
                    nip: nip_interviewer_modal,
                    nama: nama_interviewer_modal,
                    nama_lengkap: nama_lengkap_interviewer_modal,
                    jabatan: jabatan_interviewer_modal,
                    area: area_interviewer_modal,
                    region: region_interviewer_modal,
                    status: status_interviewer_modal,
                },
                beforeSend: function() {
                    // $('#editKontakModal').modal('show');
                    $('.info-modal-edit-interviewer').attr("hidden", false);
                    $('.isi-modal-edit-interviewer').attr("hidden", true);
                    $('.info-modal-edit-interviewer').html(loading_html_text);
                    $('#button_save_interviewer').attr("hidden", true);
                },
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res['status'] == "200") {
                        //update nilai terbaru di halaman profile
                        // $('#nama_kontak_tabel').html(res['data']['nama']);
                        // $('#hubungan_tabel').html(res['data']['hubungan']);
                        // $('#nomor_kontak_darurat_tabel').html(res['data']['no_kontak']);

                        //tampilkan pesan sukses
                        $('.info-modal-edit-interviewer').attr("hidden", false);
                        $('.isi-modal-edit-interviewer').attr("hidden", true);
                        $('.info-modal-edit-interviewer').html(success_html_text);
                        $('#button_save_interviewer').attr("hidden", true);
                        $('#id_interviewer_modal').val();
                        tabel_interviewer.ajax.reload(null, false);
                    } else {
                        html_text = res['pesan'];
                        $('.info-modal-edit-interviewer').html(html_text);
                        $('.isi-modal-edit-interviewer').attr("hidden", true);
                        $('.info-modal-edit-interviewer').attr("hidden", false);
                        $('#button_save_interviewer').attr("hidden", true);
                        $('#id_interviewer_modal').val("");
                    }
                },
                error: function(xhr, status, error) {
                    html_text = "<strong><span style='color:#FF0000;'>ERROR.</span> Silahkan foto pesan error di bawah dan kirimkan ke whatsapp IT Care di nomor: 085174123434</strong>";
                    html_text = html_text + "<iframe srcdoc='" + xhr.responseText + "' style='zoom:1' frameborder='0' height='250' width='99.6%'></iframe>";
                    // html_text = "Gagal fetch data. Kode error: " + xhr.status;
                    $('.info-modal-edit-interviewer').html(html_text); //coba pake iframe
                    $('.isi-modal-edit-interviewer').attr("hidden", true);
                    $('.info-modal-edit-interviewer').attr("hidden", false);
                    $('#button_save_interviewer').attr("hidden", true);
                    $('#id_interviewer_modal').val("");
                }
            });

            // alert("Tidak ada input kosong");
        }
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

<!-- Tombol close modal mulai screening -->
<script type="text/javascript">
    function close_edit_interviewer() {
        // alert("show modal screening");
        $('#editInterviewerModal').modal('hide');
    }
</script>
