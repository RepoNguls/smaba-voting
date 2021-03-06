<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo base_url(); ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?php echo base_url(); ?>/assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="<?php echo base_url(); ?>/stylesheet" href="assets/css/dark-theme.css" />
    <link rel="<?php echo base_url(); ?>/stylesheet" href="assets/css/semi-dark.css" />
    <link rel="<?php echo base_url(); ?>/stylesheet" href="assets/css/header-colors.css" />
    <link rel="<?php echo base_url(); ?>/stylesheet" href="assets/css/custom.css" />
    <title>Voting SMAN 1 Barambai</title>
    <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <?php include('sidebar.php'); ?>
        <!--end sidebar wrapper -->
        <!--start header -->
        <?php include('navbar.php'); ?>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <?= view($view); ?>
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright SMABA?? 2021. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start Modal Logout-->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini .</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="<?php echo base_url(); ?>/logout" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!--end Modal Logout-->
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?php echo base_url(); ?>/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/chartjs/js/Chart.extension.js"></script>
    <!--<script src="<?php echo base_url(); ?>/assets/js/index.js"></script>-->

    <!--app JS-->
    <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>
</body>

</html>