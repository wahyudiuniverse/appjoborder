<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:46:58 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sign In | Job Portal Cakrawala Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sign in Dashboard Job Portal Cakrawala Group" name="description" />
    <meta content="Cakrawala Group" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <script src="<?= base_url() ?>assets/libs/jquery/jquery-3.7.1.min.js"></script>

    <!-- Layout config Js -->
    <script src="<?= base_url() ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="<?= base_url() ?>" class="d-inline-block auth-logo">
                                    <img src="<?= base_url() ?>assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Dashboard Job Portal Cakrawala Group</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Selamat datang !</h5>
                                    <p class="text-muted">Silahkan sign in untuk melanjutkan.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="#">

                                        <div class="mb-3">
                                            <label for="nip" class="form-label">NIP / ID Registrasi</label>
                                            <input type="text" class="form-control" id="nip" placeholder="Masukkan NIP / ID Registrasi">
                                        </div>

                                        <div class="mb-3">
                                            <!-- <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div> -->
                                            <label class="form-label" for="pin">PIN / NIK</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" placeholder="Masukkan PIN / NIK" id="pin">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> -->

                                        <div hidden class="mt-4 text-center" id="pesan_login">
                                            <p style="color:red;" class="mb-0">Akun anda salah</p>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit" id="button_sign_in">Sign In</button>
                                        </div>

                                        <!-- <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                            </div>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Belum punya akun ? <a href="registrasi" class="fw-semibold text-primary text-decoration-underline"> Daftar </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Cakrawala Group.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="<?= base_url() ?>assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?= base_url() ?>assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="<?= base_url() ?>assets/js/pages/password-addon.init.js"></script>

    <!-- Tombol Sign In -->
    <script type="text/javascript">
        document.getElementById("button_sign_in").onclick = function(e) {
            e.preventDefault();

            var loading_image = "<?php echo base_url('assets/images/loading/loading_animation3.gif'); ?>";
            var loading_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
            loading_html_text = loading_html_text + '<img src="' + loading_image + '" alt="" width="50px">';
            loading_html_text = loading_html_text + '<h2>Memproses data...</h2>';
            loading_html_text = loading_html_text + '</div>';

            var success_image = "<?php echo base_url('assets/images/loading/ceklis_hijau.png'); ?>";
            var success_html_text = '<div class="col-12 col-md-12 col-auto text-center align-self-center">';
            success_html_text = success_html_text + '<img src="' + success_image + '" alt="" width="50px">';
            success_html_text = success_html_text + '<h2>Login Sukses</h2>';
            success_html_text = success_html_text + '</div>';

            var nip = $("#nip").val();
            var pin = $("#pin").val();

            if (nip == "" || nip == null) {
                nip = "0";
            }
            if (pin == "" || pin == null) {
                pin = "0";
            }
            // alert(bank_id);
            // alert(nomor_rekening);

            // AJAX request
            $.ajax({
                url: '<?= base_url() ?>auth/API_login_cis/' + nip + "/" + pin + "/",
                method: 'get',
                beforeSend: function() {
                    $('#nip').attr('disabled', true);
                    $('#pin').attr('disabled', true);
                    $('#pesan_login').html(loading_html_text);
                    $('#pesan_login').attr("hidden", false);
                },
                success: function(response) {
                    // alert(response);
                    var res = jQuery.parseJSON(response);
                    if (res['status'] == "0") {
                        // alert(res['status']);
                        // alert(res['message']);
                        $('#nip').attr('disabled', false);
                        $('#pin').attr('disabled', false);
                        $('#pesan_login').html("<p style='color:red;' class='mb-0'>" + "NIP / ID Registrasi atau PIN / NIK salah, Hubungi admin untuk informasi lengkapnya." + "</p>");
                        $('#pesan_login').attr("hidden", false);
                    } else if (res['status'] == "1") {
                        // alert(res['status']);
                        // alert(res['message']);
                        $('#pesan_login').html(success_html_text);
                        $('#pesan_login').attr("hidden", false);
                        // alert("NIP: " + res['data']['employee_id'] + "\nNama: " + res['data']['fullname'] + "\nStatus Karyawan: " + res['data']['status_emp'] + "\nUser Role: " + res['data']['userrole'] + "\nApp Role: " + res['data']['approle']);
                        window.open('<?php echo base_url(); ?>dashboard/', '_self');
                    } else {
                        alert("undefined error");
                        alert(res['status']);
                        alert(res['message']);
                    }

                },
                error: function(xhr, status, error) {
                    // var res = jQuery.parseJSON(response);
                    alert(xhr.responseText);
                }
            });

        };
    </script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-signin-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Aug 2024 07:46:58 GMT -->

</html>