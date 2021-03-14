<?php
    include 'assets/config/koneksi.php';
    $title = "Teknik Komputer | Dosen";
    include 'metatag.php';
?>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark background-navbar fixed-top">
        <?php
            include 'navbar.php';
        ?>
        <!-- End of Navbar -->

        <!-- Breadcrumb -->
        <section class="breadcrumb bg-with-black">
            <div class="container text-center">
                <h2 class="title">Dosen</h2>
                <ul class="links">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="dosen.php">Dosen</a></li>
                </ul>
            </div>
        </section>
        <!-- End of Breadcrumb -->

        <!-- Dosen -->
        <section class="dosen">
            <div class="container">
                <div class="single-dosen">
                    <div class="row">
                        <?php
                            $query=mysqli_query($koneksi,"select * from dosen order by id");
                            while($item=mysqli_fetch_row($query)){
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="dosen-upper">
                                    <h4 class="type">Dosen D3</h4>
                                </div>
                                <div class="dosen-img text-center">
                                    <img class="rounded-circle img-thumbnail"
                                        src="assets/images/dosen/<?php echo $item[9] ?>" alt="" />
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Nama</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[2] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">NIP</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[1] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Jenis Kelamin</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[3] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Jabatan Fungsional</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[4] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Pendidikan Tertinggi</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[5] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Status Ikatan Kerja</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[6] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Status Aktifitas</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="detail"><?php echo $item[7] ?></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="detail judul-detail">Riwayat Penelitian</h5>
                                        </div>
                                        <div class="col-md-1">
                                            <h5 class="detail">:</h5>
                                        </div>
                                        <div class="col">
                                            <a href="<?php echo $item[8] ?>" class="detail detail-link">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Dosen -->

        <!-- Footer -->
        <?php
          include 'footer.php';
        ?>
        <!-- End of Footer -->

        <!-- Script -->
        <script>
        $(document).ready(function() {
            $('.year').text(new Date().getFullYear());
        });
        </script>
        <script>
        $(window).scroll(function() {
            $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
        </script>
        <!-- End of Script -->
</body>

</html>