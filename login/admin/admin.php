<?php $title = "Data Admin"; ?>
<?php include('../../assets/config/auto_load.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Admin</h1>

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
                    <td>Nama Admin</td>
                    <td>Username</td>
                    <td>Foto</td>
                    <td>Level</td>
                    <td>Action</td>
                </tr>

                <?php
        $no = 1;
        ?>
                <?php if($_SESSION['level'] == "Super Admin"){
                $query = mysqli_query($koneksi, "Select * from users");
                while($p = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['username'] ?></td>
                    <td><img src="../../assets/images/admin/<?=$p['foto'] ?>" width="50" height="50"></td>
                    <td><?= $p['level'] ?></td>

                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                            data-target="#modalEdit_<?php echo $p['id']; ?>">Edit</a>
                        <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal"
                            data-target="#modalHapus_<?php echo $p['id']; ?>">Hapus</a>
                        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="modal"
                            data-target="#modalPw_<?php echo $p['id']; ?>">Ubah Password</a>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="admintambah_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">

                                        <div class="show-gambar text-center">
                                            <img src="../../assets/images/contoh/avatar.png" alt="Foto Post"
                                                class="img-fluid">
                                        </div>
                                        <input type="file" name="foto" class="form-control mt-2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Admin" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username" name="username">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password"
                                                placeholder="Password">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ulangi_password">Ulangi Password</label>
                                            <input name="ulangi_password" type="password" class="form-control"
                                                id="ulangi_password" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Jenis Admin</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Pilih Level Admin</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <button name="btn_registrasi" value="simpan"
                                        class="btn btn-primary btn-user btn-block">
                                        Registrasi Admin Baru
                                    </button>
                                </form>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
                <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog"
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
                                <p>Anda akan menghapus data Admin yang bernama "<?= $p['nama'] ?>". <br>

                                    <b> DATA AKAN DIHAPUS PERMANEN.<b>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <a href="admin_control.php?id=<?php echo $p['id']; ?>" class="btn btn-danger">Hapus</a>
                                <button type="button" name="btn_hapus" class="btn btn-secondary"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="modalEdit_<?= $p['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="adminedit_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?php
                if(isset($p['foto']) && $p['foto'] != '') {
                    $foto = '../../assets/images/admin/'.$p['foto'];
                } else {
                    $foto = '../../assets/images/contoh/avatar.png';
                }
                ?>
                                        <div class="show-gambar text-center">
                                            <img src="<?= $foto ?>" alt="Foto Admin" class="img-fluid">
                                        </div>
                                        <input type="file" name="foto" class="form-control mt-2">
                                        <input type="hidden" name="foto_lama" value="<?php echo $p['foto']; ?>">
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id_admin"
                                        value="<?php echo $p['id']; ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Admin" name="nama" value="<?= $p['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username Admin" name="username"
                                            value="<?= $p['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level Admin</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="">Pilih Level Admin</option>
                                            <option value="Super Admin"
                                                <?php if($p['level'] == 'Super Admin'){ echo "selected"; } ?>>Super
                                                Admin</option>
                                            <option value="Admin"
                                                <?php if($p['level'] == 'Admin'){ echo "selected"; } ?>>Admin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="btn_simpan" value="simpan_profil"
                                            class="btn btn-primary">Simpan</button>
                                        <a href="" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalPw_<?php echo $p['id']; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="adminpws_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" id="id" name="id_admin"
                                        value="<?php echo $p['id']; ?>">
                                    <div class="form-group">
                                        <label for="password_baru">Password Baru</label>
                                        <input type="password" class="form-control" id="password_baru"
                                            placeholder="Masukkan Password Baru Admin" name="password_baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="ulangi_password_baru">Ulangi Password Baru</label>
                                        <input type="password" class="form-control" id="ulangi_password_baru"
                                            placeholder="Masukkan Password Baru Admin" name="ulang_password_baru">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="btn_simpan" value="simpan_profil"
                                    class="btn btn-primary">Simpan</button>
                                <a href="" class="btn btn-danger">Kembali</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>



                <?php
                } ?>


                <?php } else {
                  $query_admin = mysqli_query ($koneksi, "Select * from users where nama = '$_SESSION[nama]'");
                  $da = mysqli_fetch_array($query_admin);
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $da['nama'] ?></td>
                    <td><?= $da['username'] ?></td>
                    <td><img src="../../assets/images/admin/<?=$da['foto'] ?>" width="50" height="50"></td>
                    <td><?= $da['level'] ?></td>

                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                            data-target="#modalEdit2_<?php echo $da['id']; ?>">Edit</a>
                        <a href="" class="btn btn-success btn-sm mb-1" data-toggle="modal"
                            data-target="#modalPw2_<?php echo $da['id']; ?>">Ubah Password</a>
                    </td>
                </tr>


                <div class="modal fade" id="modalEdit2_<?= $da['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="adminedit_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?php
                if(isset($da['foto']) && $da['foto'] != '') {
                    $foto = '../../assets/images/admin/'.$da['foto'];
                } else {
                    $foto = '../../assets/images/contoh/avatar.png';
                }
                ?>
                                        <div class="show-gambar text-center">
                                            <img src="<?= $foto ?>" alt="Foto Admin" class="img-fluid">
                                        </div>
                                        <input type="file" name="foto" class="form-control mt-2">
                                        <input type="hidden" name="foto_lama" value="<?php echo $da['foto']; ?>">
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id_admin"
                                        value="<?php echo $da['id']; ?>">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Admin" name="nama" value="<?= $da['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username Admin" name="username"
                                            value="<?= $da['username'] ?>">
                                    </div>
                                    <input type="hidden" name="level" value="Admin">
                                    <div class="modal-footer">
                                        <button type="submit" name="btn_simpan" value="simpan_profil"
                                            class="btn btn-primary">Simpan</button>
                                        <a href="" class="btn btn-danger">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalPw2_<?php echo $da['id']; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="adminpwa_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" id="id" name="id_admin"
                                        value="<?php echo $da['id']; ?>">
                                    <div class="form-group">
                                        <label for="password_lama">Password Lama</label>
                                        <input type="password" class="form-control" id="password_lama"
                                            placeholder="Masukkan Password Lama Admin" name="password_lama">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_baru">Password Baru</label>
                                        <input type="password" class="form-control" id="password_baru"
                                            placeholder="Masukkan Password Baru Admin" name="password_baru">
                                    </div>
                                    <div class="form-group">
                                        <label for="ulangi_password_baru">Ulangi Password Baru</label>
                                        <input type="password" class="form-control" id="ulangi_password_baru"
                                            placeholder="Masukkan Password Baru Admin" name="ulang_password_baru">
                                    </div>
                                    <div class="note">
                                        <p style="font-style: italic;">Note :<strong> Lupa Password Lama? Silahkan
                                                Hubungi Super Admin!</strong></p>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="btn_simpan" value="simpan_profil"
                                    class="btn btn-primary">Simpan</button>
                                <a href="" class="btn btn-danger">Kembali</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <?php
        if(mysqli_num_rows($query) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada Admin baru</b></td></tr>";
        } ?>


            </table>
            <?php if($_SESSION['level'] == "Super Admin"){ ?>
            <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalvalidasi">Tambah Data
                Admin</a>
            <a href="dashboard.php" class="btn btn-danger btn-sm mb-1">Kembali</a>
            <?php } else { ?>
            <a href="dashboard.php" class="btn btn-danger btn-sm mb-1">Kembali</a>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>