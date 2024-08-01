


<!DOCTYPE html>
<html lang="zxx">
    
<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/kleon/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 06:14:19 GMT -->
<head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="Kleon Admin Template">
        <meta name="author" content="">

        <!-- Favicon and touch Icons -->
        <link href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/favicon.png" rel="shortcut icon" type="image/png">
        <link href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
        <link href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
        <link href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

        <!-- Page Title -->
        <title>Kleon Admin Template</title>
        
        <!-- Styles Include -->
        <link rel="stylesheet" href="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/css/main.css" id="stylesheet">
        
    </head>


    <body class="bg-soft-primary">
        <!-- Preloader -->
        <div id="preloader">
            <div class="preloader-inner">
                <div class="spinner"></div>
                <div class="logo"><img src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/logo-icon.svg" alt="img"></div>
            </div>
        </div>
        
        <!-- Registration Form -->
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6">
                <div class="card rounded-2 border-0 p-5 m-0">

                    <div class="card-header border-0 p-0 text-center">
                        <a href="https://wpthemebooster.com/demo/themeforest/html/kleon/index.html" class="w-100 d-inline-block mb-5">
                            <img src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/logo.svg" alt="img">
                        </a>
                        <h3>Welcome to MaleFashion!</h3>
                        <p class="fs-14 text-dark my-4">Signup here to create your own dashboard.</p>
                    </div>

                    <div class="btn-group gap-2">
                        <a href="https://www.google.com/" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-1 px-2 rounded-1">
                            <img src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/svg/google-icon.svg" alt="img">
                            Sign in with Google
                        </a>
                        <a href="https://www.facebook.com/" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-1 px-2 rounded-1">
                            <img src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/img/svg/facebook-icon.svg" alt="img">
                            Sign in with Facebook
                        </a>
                    </div>

                    <div class="position-relative text-center my-4">
                        <p class="mb-0 position-relative z-index-1 d-inline-block bg-white px-3">or Signup with</p>
                        <span class="border border-light position-absolute top-50 start-50 translate-middle d-inline-block w-100"></span>
                    </div>

                    <div class="card-body p-0">
                        <form action="{{ route('register.store') }}" class="form-horizontal" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="" placeholder="Name or User Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-error">
                                    <label class="control-label" for="inputError">Input with error</label>
                                        <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" value="" placeholder=" Password" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" value="" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 text-uppercase text-white rounded-2 lh-34 ff-heading fw-bold shadow">Register</button>
                            
                            <p class="d-flex align-items-center justify-content-center gap-2 mt-4 mb-0">Already have an account? <a href="https://wpthemebooster.com/demo/themeforest/html/kleon/login.html" class="text-secondary fw-bold text-decoration-underline">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Core JS -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/js/jquery-3.6.0.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery UI Kit -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/jquery_ui/jquery-ui.1.12.1.min.js"></script>
        
        <!-- ApexChart -->
        
        
        <!-- Peity  -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/peity/jquery.peity.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/peity/piety-init.js"></script>

        <!-- Select 2 -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/select2/js/select2.min.js"></script>

        <!-- Datatables -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/datatables/js/datatables.init.js"></script>
        
        

        <!-- Date Picker -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/flatpickr/flatpickr.min.js"></script>

        <!-- Dropzone -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/dropzone/dropzone.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/dropzone/dropzone_custom.js"></script>
        
        <!-- TinyMCE -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/tinymce/tinymce.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/prism/prism.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/jquery-repeater/jquery.repeater.js"></script>

        

        

        <!-- Sweet Alert -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/sweetalert/sweetalert2.min.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/sweetalert/sweetalert2-init.js"></script>
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/plugins/nicescroll/jquery.nicescroll.min.js"></script>

        <!-- Snippets JS -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/js/snippets.js"></script>

        <!-- Theme Custom JS -->
        <script src="https://wpthemebooster.com/demo/themeforest/html/kleon/assets/js/theme.js"></script>
        
    </body>

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/kleon/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 06:14:19 GMT -->
</html>



    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>