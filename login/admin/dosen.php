<?php $title = "Data Dosen"; ?>
<?php include('../../assets/config/auto_load.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Dosen</h1>

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
                    <td>NIP</td>
                    <td>Nama Dosen</td>
                    <td>Jabatan</td>
                    <td>Pendidikan</td>
                    <td>Status Ikatan Kerja</td>
                    <td>Status Aktivitas</td>
                    <td>Foto Dosen</td>
                    <td>Action</td>
                </tr>

                <?php
        $no = 1;
        $query = mysqli_query($koneksi, "Select * from dosen");
        while($p = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['nip'] ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['jabatan'] ?></td>
                    <td><?= $p['pendidikan'] ?></td>
                    <td><?= $p['sk'] ?></td>
                    <td><?= $p['sa'] ?></td>
                    <td><img src="../../assets/images/dosen/<?=$p['foto'] ?>" width="35" height="40"></td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="dosentambah_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">

                                        <div class="show-gambar text-center">
                                            <img src="../../assets/images/contoh/avatar.png" alt="Foto Dosen"
                                                class="img-fluid">
                                        </div>

                                        <input type="file" name="foto" class="form-control mt-2">
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip"
                                            placeholder="Masukkan NIP Dosen" name="nip">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Dosen</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Dosen" name="nama">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="lk" value="Laki - Laki">
                                                <label class="form-check-label" for="lk">
                                                    Laki Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="pr" value="Perempuan">
                                                <label class="form-check-label" for="pr">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan"
                                                placeholder="Masukkan Jabatan Dosen" name="jabatan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Tertinggi Dosen</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control">
                                            <option value="">Pilih Pendidikan Tertinggi Dosen</option>
                                            <option value="S3">S3</option>
                                            <option value="S2">S2</option>
                                            <option value="S1">S1</option>
                                            <option value="D3">D3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sk">Status Ikatan Kerja</label>
                                        <input type="text" class="form-control" id="sk"
                                            placeholder="Masukkan Status Ikatan Kerja" name="sk">
                                    </div>
                                    <div class="form-group">
                                        <label for="sa">Status Aktivitas</label>
                                        <input type="text" class="form-control" id="sa"
                                            placeholder="Masukkan Status Aktivitas" name="sa">
                                    </div>
                                    <div class="form-group">
                                        <label for="rp">Riwayat Penelitian</label>
                                        <input type="text" class="form-control" id="rp"
                                            placeholder="Masukkan Riwayat Penelitian" name="rp">
                                    </div>
                                    <hr>
                                    <button name="btn_registrasi" value="simpan"
                                        class="btn btn-primary btn-user btn-block">
                                        Tambah Data Dosen
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
                                <p>Anda akan menghapus data dosen "<?= $p['nama'] ?>". <br>

                                    <b> DATA AKAN DIHAPUS PERMANEN.<b>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <a href="dosen_control.php?id=<?php echo $p['id']; ?>" class="btn btn-danger">Hapus</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="dosenedit_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <?php
                if(isset($p['foto']) && $p['foto'] != '') {
                    $foto = '../../assets/images/dosen/'.$p['foto'];
                } else {
                    $foto = '../../assets/images/contoh/avatar.png';
                }
                ?>
                                        <div class="show-gambar text-center">
                                            <img src="<?= $foto ?>" alt="Foto Post" class="img-fluid">
                                        </div>
                                        <input type="file" name="foto" class="form-control mt-2">
                                        <input type="hidden" name="foto_lama" value="<?php echo $p['foto']; ?>">
                                    </div>
                                    <input type="hidden" class="form-control" id="id" name="id_dosen"
                                        value="<?php echo $p['id']; ?>">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip"
                                            placeholder="Masukkan NIP Dosen" name="nip" value="<?= $p['nip'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Dosen</label>
                                        <input type="text" class="form-control" id="nama"
                                            placeholder="Masukkan Nama Dosen" name="nama" value="<?= $p['nama'] ?>">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Jenis Kelamin</label>
                                            <?php
                        $laki = "";
                        $perempuan = "";

                        if($p['jk'] == "Laki - Laki") {
                            $laki = "checked";
                        } else {
                            $perempuan = "checked";
                        }
                        ?>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="lk"
                                                    value="Laki - Laki" <?= $laki ?>>
                                                <label class="form-check-label" for="lk">
                                                    Laki Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="pr"
                                                    value="Perempuan" <?= $perempuan ?>>
                                                <label class="form-check-label" for="pr">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-6">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan"
                                                placeholder="Masukkan Jabatan Dosen" name="jabatan"
                                                value="<?= $p['jabatan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan Tertinggi Dosen</label>
                                        <select name="pendidikan" id="pendidikan" class="form-control">
                                            <option value="">Pilih Pendidikan Tertinggi Dosen</option>
                                            <option value="S3"
                                                <?php if($p['pendidikan'] == 'S3'){ echo "selected"; } ?>>S3</option>
                                            <option value="S2"
                                                <?php if($p['pendidikan'] == 'S2'){ echo "selected"; } ?>>S2</option>
                                            <option value="S1"
                                                <?php if($p['pendidikan'] == 'S1'){ echo "selected"; } ?>>S1</option>
                                            <option value="D3"
                                                <?php if($p['pendidikan'] == 'D3'){ echo "selected"; } ?>>D3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sk">Status Ikatan Kerja</label>
                                        <input type="text" class="form-control" id="sk"
                                            placeholder="Masukkan Status Ikatan Kerja" name="sk"
                                            value="<?= $p['sk'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="sa">Status Aktivitas</label>
                                        <input type="text" class="form-control" id="sa"
                                            placeholder="Masukkan Status Aktivitas" name="sa" value="<?= $p['sa'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="rp">Riwayat Penelitian</label>
                                        <textarea name="rp" id="rp" class="form-control"
                                            style="border: 1px solid #eee; height: 150px; overflow: auto; padding: 10px;"><?= $p['rp'] ?>"</textarea>
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


                    <?php }
        
        
        if(mysqli_num_rows($query) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada postingan baru</b></td></tr>";
        }

        ?>

            </table>
            <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalvalidasi">Tambah Data
                Dosen</a>
            <a href="dashboard.php" class="btn btn-danger btn-sm mb-1">Kembali</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>