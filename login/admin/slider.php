<?php $title = "Data Slider"; ?>
<?php include('../../assets/config/auto_load.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Slider</h1>

    <div class="row">
        <div class="col-12">
            <?php if(isset($_SESSION['pesan_sukses'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['pesan_sukses']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }
            unset($_SESSION['pesan_sukses']);
      ?>
        </div>

        <div class="col-12">
            <?php if(isset($_SESSION['pesan_gagal'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['pesan_gagal']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }
            unset($_SESSION['pesan_gagal']);
      ?>
        </div>

        <div class="col-md-12 table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <td>No</td>
                    <td>Judul Slider</td>
                    <td>Keterangan Slider</td>
                    <td>Gambar</td>
                    <td>Action</td>
                </tr>

                <?php
        $no = 1;
        $query = mysqli_query($koneksi, "Select * from slider");
        while($p = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['judul'] ?></td>
                    <td><?= $p['keterangan'] ?></td>
                    <td><img src="../../assets/images/slider/<?=$p['foto'] ?>" width="35" height="40"></td>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                            data-target="#modalEdit_<?= $p['id'] ?>">Edit</a>
                        <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal"
                            data-target="#modalHapus_<?= $p['id'] ?>">Hapus</a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Slider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="slidertambah_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">

                                        <div class="show-gambar text-center">
                                            <img src="../../assets/images/contoh/avatar.png" alt="Foto Slider"
                                                class="img-fluid">
                                        </div>

                                        <div class="upload-img">
                                            <input required type="file" name="foto" class="form-control mt-2 mb-2">
                                            <p><span class="note" style="font-style: italic;">Note : </span><strong>
                                                    Gambar Harus Berukuran 1872px x 864px </strong></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input required type="text" class="form-control" id="judul"
                                                placeholder="Masukkan Judul" name="judul">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea name="keterangan" id="keterangan" class="form-control"
                                                style="border: 1px solid #eee; height: 150px; overflow: auto; padding: 10px;"></textarea>
                                        </div>
                                        <hr>
                                        <button name="btn_registrasi" value="simpan"
                                            class="btn btn-primary btn-user btn-block">
                                            Posting Slider
                                        </button>
                                </form>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalHapus_<?php echo $p['id']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda akan menghapus data ini dengan judul "<?= $p['judul'] ?>". <br>

                            <b> DATA AKAN DIHAPUS PERMANEN.<b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="slider_control.php?id=<?php echo $p['id']; ?>" class="btn btn-danger">Hapus</a>
                        <button type="button" name="btn_hapus" class="btn btn-secondary"
                            data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit_<?php echo $p['id']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="editslider_control.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                if(isset($p['foto']) && $p['foto'] != '') {
                    $foto = '../../assets/images/slider/'.$p['foto'];
                } else {
                    $foto = '../../assets/images/contoh/avatar.png';
                }
                ?>
                                <div class="show-gambar text-center">
                                    <img src="<?= $foto ?>" alt="Foto Post" class="img-fluid">
                                </div>
                                <input type="file" name="foto" class="form-control mt-2">
                                <input required type="hidden" name="foto_lama" value="<?php echo $p['foto']; ?>">
                                <p><span style="font-style: italic;">Note : </span><strong> Gambar Harus Berukuran
                                        1872px x 864px </strong></p>
                            </div>

                            <input required type="hidden" class="form-control" id="id" name="id_slider"
                                value="<?php echo $p['id']; ?>">

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input required type="text" class="form-control" id="judul" placeholder="Masukkan Judul"
                                    name="judul" value="<?php echo $p['judul']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control"
                                    style="border: 1px solid #eee; height: 150px; overflow: auto; padding: 10px;"><?php echo $p['keterangan']; ?></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="btn_simpan" value="simpan_profil"
                                    class="btn btn-primary">Simpan</button>
                                <a href="" class="btn btn-danger">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php }
        
        
        if(mysqli_num_rows($query) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada postingan baru</b></td></tr>";
        }

        ?>

        </table>
        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalvalidasi">Tambah
            Slider</a>
        <a href="dashboard.php" class="btn btn-danger btn-sm mb-1">Kembali</a>
    </div>
</div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>