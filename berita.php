<?php
  include 'assets/config/koneksi.php';
  $title = "Teknik Komputer | Berita";
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
                <h2 class="title">Berita</h2>
                <ul class="links">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="berita.php">Berita</a></li>
                </ul>
            </div>
        </section>
        <!-- End of Breadcrumb -->

        <section class="postingan">
            <div class="container">
                <div class="row single-news">
                    <?php
                      $kategori = "Berita";
                      $query=mysqli_query($koneksi,"select * from posting where ktg='$kategori' order by id");
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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="image">
                                <img src="assets/images/berita/<?php echo $has[3] ?>" alt="<?php echo $has[1] ?>" />
                            </div>
                            <div class="content">
                                <div class="row info">
                                    <div class="col text-center">
                                        <span class="icon">
                                            <i class="fas fa-user"></i>
                                            <?php echo $has[5] ?>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <span class="icon">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo $nmh.', '.$has[4] ?>
                                        </span>
                                    </div>
                                </div>
                                <h2 class="title text-start">
                                    <a href="detail-berita.php?id=<?php echo $has[0] ?>"><?php echo $has[1] ?></a>
                                </h2>
                                <p class="text"><?php echo $isi_berita ?> ...</p>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col text-center">
                                        <div class="btn">
                                            <a href="detail-berita.php?id=<?php echo $has[0] ?>">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

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