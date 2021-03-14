<?php $title = "Data Postingan"; ?>
<?php include('../../assets/config/auto_load.php'); ?>

<?php include('../template/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Post</h1>

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
                    <td>Judul Berita</td>
                    <td>Isi Berita</td>
                    <td>Gambar</td>
                    <td>Tanggal</td>
                    <td>Author</td>
                    <td>Kategori</td>
                    <td>Action</td>
                </tr>

                <?php
        $no = 1;
        $query = mysqli_query($koneksi, "Select * from posting");
        while($p = mysqli_fetch_array($query)) { ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $p['judul'] ?></td>
                    <td><?= substr($p['isi'],0,400).' ...'?></td>
                    <td><img src="../../assets/images/berita/<?=$p['foto'] ?>" width="35" height="40"></td>
                    <td><?= $p['tgl'] ?></td>
                    <td><?= $p['author'] ?></td>
                    <td><?= $p['ktg'] ?></td>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal"
                            data-target="#modalEdit_<?= $p['id'] ?>">Edit</a>
                        <a href="" class="btn btn-danger btn-sm mb-1" data-toggle="modal"
                            data-target="#modalHapus_<?= $p['id'] ?>">Hapus</a>
                    </td>
                </tr>

                <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="user" action="tambahposting_control.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">

                                        <div class="show-gambar text-center">
                                            <img src="../../assets/images/contoh/avatar.png" alt="Foto Post"
                                                class="img-fluid">
                                        </div>

                                        <div class="upload-img">
                                            <input required type="file" name="foto" class="form-control mt-2 mb-2">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input required type="text" class="form-control" id="judul"
                                                placeholder="Masukkan Judul" name="judul">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="author">Author</label>
                                                <input required type="text" class="form-control" id="author"
                                                    placeholder="Nama Pemosting" name="author">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tgl">Tanggal Post</label>
                                                <input required type="date" class="form-control " id="tgl"
                                                    placeholder="Tanggal Post" name="tgl">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi">Keterangan</label>
                                            <textarea name="isi" id="isi" class="form-control"
                                                style="border: 1px solid #eee; height: 150px; overflow: auto; padding: 10px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="ktg">Kategori</label>
                                            <select name="ktg" id="ktg" class="form-control" required>
                                                <option value="">Pilih Kategori Post</option>
                                                <option value="Berita">Berita</option>
                                                <option value="Acara">Acara</option>
                                                <option value="Pengumuman">Pengumuman</option>
                                                <option value="Informasi">Informasi</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <button name="btn_registrasi" value="simpan"
                                            class="btn btn-primary btn-user btn-block">
                                            Posting
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
                        <p>Anda akan menghapus data ini dengan judul "<?= $p['judul'] ?>". <br>

                            <b> DATA AKAN DIHAPUS PERMANEN.<b>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="posting_control.php?id=<?php echo $p['id']; ?>" class="btn btn-danger">Hapus</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="editposting_control.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php
                if(isset($p['foto']) && $p['foto'] != '') {
                    $foto = '../../assets/images/berita/'.$p['foto'];
                } else {
                    $foto = '../../assets/images/contoh/avatar.png';
                }
                ?>
                                <div class="show-gambar text-center">
                                    <img src="<?= $foto ?>" alt="Foto Post" class="img-fluid">
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="file" name="foto" class="form-control mt-2">
                                <input required type="hidden" name="foto_lama" value="<?php echo $p['foto']; ?>">
                            </div>

                            <input required type="hidden" class="form-control" id="id" name="id_posting"
                                value="<?php echo $p['id']; ?>">

                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input required type="text" class="form-control" id="judul" placeholder="Masukkan Judul"
                                    name="judul" value="<?= $p['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea name="isi" id="isi" class="form-control"
                                    style="border: 1px solid #eee; height: 150px; overflow: auto; padding: 10px;"><?= $p['isi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Post</label>
                                <input required type="date" class="form-control" id="tgl" placeholder="Tanggal"
                                    name="tgl" value="<?= $p['tgl'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input required name="author" type="text" class="form-control" id="author"
                                    placeholder="Nama Author" value="<?= $p['author'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="ktg">Kategori</label>
                                <select name="ktg" id="ktgn" class="form-control" required>
                                    <option value="">Pilih Kategori Post</option>
                                    <option value="Berita" <?php if($p['ktg'] == 'Berita'){ echo "selected"; } ?>>Berita
                                    </option>
                                    <option value="Acara" <?php if($p['ktg'] == 'Acara'){ echo "selected"; } ?>>Acara
                                    </option>
                                    <option value="Pengumuman"
                                        <?php if($p['ktg'] == 'Pengumuman'){ echo "selected"; } ?>>Pengumuman</option>
                                    <option value="Informasi" <?php if($p['ktg'] == 'Informasi'){ echo "selected"; } ?>>
                                        Informasi</option>
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


            <?php }
        
        
        if(mysqli_num_rows($query) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada postingan baru</b></td></tr>";
        }

        ?>

            </table>
            <a href="" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modalvalidasi">Tambah
                Post</a>
            <a href="dashboard.php" class="btn btn-danger btn-sm mb-1">Kembali</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>