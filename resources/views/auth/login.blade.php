<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/kleon/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 06:16:58 GMT -->
<head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Kleon Admin Template">
        <meta name="author" content="">

        <!-- Favicon and touch Icons -->
        <link href="assets/img/favicon.png" rel="shortcut icon" type="image/png">
        <link href="assets/img/apple-touch-icon.html" rel="apple-touch-icon">
        <link href="assets/img/apple-touch-icon-72x72.html" rel="apple-touch-icon" sizes="72x72">
        <link href="assets/img/apple-touch-icon-114x114.html" rel="apple-touch-icon" sizes="114x114">
        <link href="assets/img/apple-touch-icon-144x144.html" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>MaleFashion Admin Template</title>

        <!-- Styles Include -->
        <link rel="stylesheet" href="assets/css/main.css" id="stylesheet">

    </head>


    <body class="bg-primary">
        <!-- Preloader -->
        <div id="preloader">
            <div class="preloader-inner">
                <div class="spinner"></div>
                <div class="logo"><img src="assets/img/logo-icon.svg" alt="img"></div>
            </div>
        </div>

        <!-- Login Form -->
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
                <div class="card rounded-2 border-0 p-5 m-0">

                    <div class="card-header border-0 p-0 text-center">
                        <a href="index-2.html" class="w-100 d-inline-block mb-5">
                            <img src="assets/img/logo.svg" alt="img">
                        </a>
                        <h3>Welcome back!</h3>
                        <p class="fs-14 text-dark my-4">Please login using your account.</p>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{ route('login') }}" class="form-horizontal" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" value="" placeholder="Username or Email" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" value="" placeholder="Type Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow">Login</button>

                            <p class="d-flex align-items-center justify-content-between mt-4 mb-4">Forgot your password? <a href="forgot-password.html" class="text-primary fw-bold text-decoration-underline">Reset Here</a></p>

                            <a href="register.html" class="btn btn-secondary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold">Create an Account</a>
                        </form>


                    </div>
                </div>
            </div>
        </div>



        <!-- Core JS -->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery UI Kit -->
        <script src="plugins/jquery_ui/jquery-ui.1.12.1.min.js"></script>

        <!-- ApexChart -->


        <!-- Peity  -->
        <script src="plugins/peity/jquery.peity.min.js"></script>
        <script src="plugins/peity/piety-init.js"></script>

        <!-- Select 2 -->
        <script src="plugins/select2/js/select2.min.js"></script>

        <!-- Datatables -->
        <script src="plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/js/datatables.init.js"></script>



        <!-- Date Picker -->
        <script src="plugins/flatpickr/flatpickr.min.js"></script>

        <!-- Dropzone -->
        <script src="plugins/dropzone/dropzone.min.js"></script>
        <script src="plugins/dropzone/dropzone_custom.js"></script>

        <!-- TinyMCE -->
        <script src="plugins/tinymce/tinymce.min.js"></script>
        <script src="plugins/prism/prism.js"></script>
        <script src="plugins/jquery-repeater/jquery.repeater.js"></script>





        <!-- Sweet Alert -->
        <script src="plugins/sweetalert/sweetalert2.min.js"></script>
        <script src="plugins/sweetalert/sweetalert2-init.js"></script>
        <script src="plugins/nicescroll/jquery.nicescroll.min.js"></script>

        <!-- Snippets JS -->
        <script src="assets/js/snippets.js"></script>

        <!-- Theme Custom JS -->
        <script src="assets/js/theme.js"></script>

    </body>

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/kleon/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 06:16:58 GMT -->
</html>
