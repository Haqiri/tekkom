<?php $title = "Dashboard Admin"; ?>
<?php include('../../assets/config/auto_load.php'); ?>

<?php include('dashboard_control.php') ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-info text-uppercase mb-1">Jumlah Berita</div>

                            <div class="h5 mt-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_pendaftar) ?> Berita
                            </div>
                            <div class="row no-gutters align-items-center">

                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-newspaper text-gray-300" style="font-size: 90px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-success text-uppercase mb-1">Jumlah Dosen</div>

                            <div class="h5 mt-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_dosen) ?> Dosen
                            </div>
                            <div class="row no-gutters align-items-center">

                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="font-size: 90px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h3 font-weight-bold text-info text-uppercase mb-1">Jumlah Foto Slider</div>

                            <div class="h5 mt-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_lolos) ?> Foto
                            </div>
                            <div class="row no-gutters align-items-center">

                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list text-gray-300" style="font-size: 90px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

<?php include '../template/footer.php'; ?>