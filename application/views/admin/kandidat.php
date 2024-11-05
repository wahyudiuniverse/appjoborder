<!-- <pre>
    <?php //print_r($_SESSION); ?>
</pre> -->

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Data Kandidat</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="kandidat">Kandidat</a></li>
                    <li class="breadcrumb-item active">Data Kandidat</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<!-- SECTION FILTER -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Filter Data Kandidat</h5>
            </div>

            <div class="card-body border-bottom-blue ">

                <?php //echo form_open_multipart('#'); 
                ?>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label
                                class="form-label"
                                for="project_input">
                                Project
                            </label>
                            <select name="project_input" id="project_input" class="form-control dropdown-dengan-search">
                                <option value="0">All Project</option>
                                <?php foreach ($all_project as $project) : ?>
                                    <option value="<?= $project['project_id']; ?>" style="text-wrap: wrap;">
                                        <?php echo $project['title']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label
                                class="form-label"
                                for="jabatan_input">Posisi/Jabatan</label>
                            <select name="jabatan_input" id="jabatan_input" class="form-control dropdown-dengan-search">
                                <option value="0" style="text-wrap: wrap;">All Jabatan</option>
                                <?php foreach ($all_jabatan as $jabatan) : ?>
                                    <option value="<?= $jabatan['designation_id']; ?>" style="text-wrap: wrap;">
                                        <?php echo $jabatan['designation_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label
                                class="form-label"
                                for="region_input">
                                Region
                            </label>
                            <select name="region_input" id="region_input" class="form-control dropdown-dengan-search">
                                <option value="0">All Region</option>
                                <?php foreach ($all_region as $region) : ?>
                                    <option value="<?= $region['region']; ?>" style="text-wrap: wrap;">
                                        <?php echo $region['region']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label
                                class="form-label"
                                for="rekruter_input">Rekruter</label>
                            <select name="rekruter_input" id="rekruter_input" class="form-control dropdown-dengan-search">
                                <option value="0" style="text-wrap: wrap;">All Rekruter</option>
                                <?php foreach ($all_interviewer as $interviewer) : ?>
                                    <option value="<?= $interviewer['id']; ?>" style="text-wrap: wrap;">
                                        <?php echo $interviewer['nama'] . " - " . $interviewer['jabatan'] . " - " . $interviewer['area']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="range_tanggal" class="form-label">Range Tanggal Registrasi</label>
                            <!-- <input type="text" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" data-provider="flatpickr" data-date-format="Y-m-d" data-range-date="true" data-maxDate=""> -->
                            <input type="text" class="form-control" placeholder="Range Tanggal" id="range_tanggal">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <!-- button submit -->
                            <label
                                class="form-label"
                                for="filter_kandidat">&nbsp;</label>
                            <button name="filter_kandidat" id="filter_kandidat" class="btn btn-primary btn-block col-12">FILTER</button>
                        </div>
                    </div>
                </div>

                <?php //echo form_close(); 
                ?>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">List Data Kandidat</h5>
                    <button hidden id="button_download_data" class="btn btn-success btn-block">Download Data</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="kandidat-datatables" class="display table table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID Registrasi</th>
                                <th>NIK</th>
                                <th>NAMA</th>
                                <th>PROJECT</th>
                                <th>JABATAN</th>
                                <th>AREA</th>
                                <th>REGION</th>
                                <th>REKRUTER</th>
                                <th>TGL REGISTRASI</th>
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
    var tabel_kandidat;
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
        csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // execute kalau page sudah ke load 
    $(document).ready(function() {
        //inisialisasi select2 untuk searchable dropdown
        $('.dropdown-dengan-search').select2({
            width: '100%'
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

        var project = document.getElementById("project_input").value;
        var jabatan = document.getElementById("jabatan_input").value;
        var region = document.getElementById("region_input").value;
        var rekruter = document.getElementById("rekruter_input").value;
        var range_tanggal = document.getElementById("range_tanggal").value;

        // alert(project);
        // alert(jabatan);
        // alert(region);
        // alert(rekruter);

        //populate data tabel
        tabel_kandidat = $('#kandidat-datatables').DataTable({
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
                [0, 'desc']
            ],
            'ajax': {
                'url': '<?= base_url() ?>admin/kandidat/list_kandidat',
                data: {
                    [csrfName]: csrfHash,
                    project: project,
                    jabatan: jabatan,
                    region: region,
                    rekruter: rekruter,
                    range_tanggal: range_tanggal,
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Status :" + xhr.status);
                    alert("responseText :" + xhr.responseText);
                },
            },
            'columns': [{
                    data: 'id',
                    // "orderable": false
                },
                {
                    data: 'nik',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'nama',
                    // "orderable": false,
                },
                {
                    data: 'project_name',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'jabatan_name',
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
                    data: 'interviewer',
                    // "orderable": false,
                },
                {
                    data: 'tanggal_registrasi',
                    // "orderable": false,
                },
            ]
        });
        // }).on('search.dt', () => eventFired('Search'));

    });
</script>

<!-- Tombol Filter -->
<script type="text/javascript">
    document.getElementById("filter_kandidat").onclick = function(e) {
        tabel_kandidat.destroy();

        // e.preventDefault();

        var project = document.getElementById("project_input").value;
        var jabatan = document.getElementById("jabatan_input").value;
        var region = document.getElementById("region_input").value;
        var rekruter = document.getElementById("rekruter_input").value;
        var range_tanggal = document.getElementById("range_tanggal").value;

        // var searchVal = $('#tabel_employees_filter').find('input').val();

        // alert(range_tanggal);

        if ((range_tanggal == "")) {
            $('#button_download_data').attr("hidden", true);

        } else {
            $('#button_download_data').attr("hidden", false);
        }

        //populate data tabel
        tabel_kandidat = $('#kandidat-datatables').DataTable({
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
                [0, 'desc']
            ],
            'ajax': {
                'url': '<?= base_url() ?>admin/kandidat/list_kandidat',
                data: {
                    [csrfName]: csrfHash,
                    project: project,
                    jabatan: jabatan,
                    region: region,
                    rekruter: rekruter,
                    range_tanggal: range_tanggal,
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert("Status :" + xhr.status);
                    alert("responseText :" + xhr.responseText);
                },
            },
            'columns': [{
                    data: 'id',
                    // "orderable": false
                },
                {
                    data: 'nik',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'nama',
                    // "orderable": false,
                },
                {
                    data: 'project_name',
                    // "orderable": false,
                    //searchable: true
                },
                {
                    data: 'jabatan_name',
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
                    data: 'interviewer',
                    // "orderable": false,
                },
                {
                    data: 'tanggal_registrasi',
                    // "orderable": false,
                },
            ]
        });
        // }).on('search.dt', () => eventFired('Search'));

        // $('#tombol_filter').attr("disabled", false);
        // $('#tombol_filter').removeAttr("data-loading");
        // }

        // alert(project);
        // alert(sub_project);
        // alert(status);
    };
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