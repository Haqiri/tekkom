<?php
    include 'assets/config/koneksi.php';
    $title = "Teknik Komputer | Detail Berita";
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
                <h2 class="title">Detail Berita</h2>
                <ul class="links">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="berita.php">Berita</a></li>
                    <li><a href="detail-berita.php?id=<?php echo $_GET['id'] ?>">Detail Berita</a></li>
                </ul>
            </div>
        </section>
        <!-- End of Breadcrumb -->

        <!-- Detail Berita -->
        <?php
            $data=mysqli_fetch_row(mysqli_query($koneksi,"select * from posting where id='".$_GET['id']."'"));
            $tgl=explode("-",$data[4]);
            $x  = mktime(0, 0, 0, date("$tgl[1]"), date("$tgl[2]"),  date("$tgl[0]")); 
                switch(date("l",$x)){
                    case 'Monday':$nmh="Senin";break; 
                    case 'Tuesday':$nmh="Selasa";break; 
                    case 'Wednesday':$nmh="Rabu";break; 
                    case 'Thursday':$nmh="Kamis";break; 
                    case 'Friday':$nmh="Jumat";break; 
                    case 'Saturday':$nmh="Sabtu";break; 
                    case 'Sunday':$nmh="Minggu";break; 
                }
		?>
        <section class="detail-berita">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="card detail-berita-content">
                            <div class="banner text-center">
                                <img src="assets/images/berita/<?php echo $data[3]?>" alt="">
                            </div>
                            <ul class="meta">
                                <li class="info"><span class="icon"><i class="fas fa-user"></i></span> Oleh
                                    <?php echo $data[5]?></li>
                                <li class="info"><span class="icon"><i
                                            class="far fa-calendar-alt"></i></span><?php echo $nmh.', '.$data[4] ?></li>
                            </ul>
                            <h2 class="title"><?php echo $data[1] ?></h2>
                            <div class="text">
                                <p><?php echo $data[2] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                        <div class="sidebar">
                            <div class="card sidebar-widget">
                                <h2 class="sidebar-title">
                                    Berita Terbaru
                                </h2>
                                <?php
                                    $query=mysqli_query($koneksi,"select * from posting order by id desc limit 7");
                                    while($has=mysqli_fetch_row($query))
                                    {
                                    $isi_berita = substr($has[2],0,250);
                                    $tgl=explode("-",$has[4]);
                                    $x  = mktime(0, 0, 0, date("$tgl[1]"), date("$tgl[2]"),  date("$tgl[0]")); 
                                        switch(date("l",$x)){
                                            case 'Monday':$nmh="Senin";break; 
                                            case 'Tuesday':$nmh="Selasa";break; 
                                            case 'Wednesday':$nmh="Rabu";break; 
                                            case 'Thursday':$nmh="Kamis";break; 
                                            case 'Friday':$nmh="Jumat";break; 
                                            case 'Saturday':$nmh="Sabtu";break; 
                                            case 'Sunday':$nmh="Minggu";break; 
                                        }
                                ?>
                                <div class="row content-widget">
                                    <div class="row">
                                        <div class="col img-widget d-flex align-items-center">
                                            <a href="detail-berita.php?id=<?php echo $has[0] ?>"><img
                                                    src="assets/images/berita/<?php echo $has[3] ?>" alt=""></a>
                                        </div>
                                        <div class="col content">
                                            <span class="meta">
                                                <span class="info"><span class="icon"><i class="fas fa-user"></i></span>
                                                    Oleh <?php echo $has[5] ?></span>
                                                <span class="info"><span class="icon"><i
                                                            class="far fa-calendar-alt"></i></span><?php echo $nmh.', '.$has[4] ?></span>
                                            </span>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="detail-berita.php?id=<?php echo $has[0] ?>">
                                                        <span class="content">
                                                            <span class="title"><?php echo $has[1] ?></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End of Detail Berita -->

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