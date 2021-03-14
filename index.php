<?php 
include 'assets/config/koneksi.php';
$title = "Teknik Komputer | Beranda";
include 'metatag.php';
?>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark background-nav fixed-top">
        <?php 
    include 'navbar.php'; 
    ?>
        <!-- End of Navbar -->

        <!-- Slider -->
        <section class="slider mb-4">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $number = 0;
                    $query=mysqli_query($koneksi,"select * from slider order by id desc limit 5");
                    while($item=mysqli_fetch_row($query)){
                    $number = $number+1;
                    if($number == 1){
                    ?>
                    <div class="carousel-item active">
                        <img src="assets/images/slider/<?php echo $item[3]?>" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $item[1]?></h5>
                            <p><?php echo $item[2]?></p>
                        </div>
                    </div>
                    <?php 
                    }else{
                    ?>
                    <div class="carousel-item">
                        <img src="assets/images/slider/<?php echo $item[3]?>" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $item[1]?></h5>
                            <p><?php echo $item[2]?></p>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- End of Slider -->

        <!-- About -->
        <section class="about mb-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 judul mt-6">
                        <h3>Selamat Datang di</h3>
                        <h2>Jurusan Teknik Komputer</h2>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error architecto rerum, praesentium
                            sint perferendis qui ad odio dolores nulla delectus aspernatur ab doloremque corporis
                            blanditiis
                            dignissimos vero impedit? Rerum
                            repudiandae ex accusantium iusto sed earum impedit soluta. Explicabo cumque quis numquam
                            fugiat.
                            Nihil nam at quo culpa, optio sequi maiores!
                        </p>
                        <div class="btn">
                            <a href="">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center mt-6">
                        <div class="welcome-img">
                            <img src="assets/images/berita/tekkom.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of About -->

        <!-- Information -->
        <section class="information background-info mb-5">
            <div class="row mt-3">
                <div class="col text-center mb-5">
                    <div class="section-title">
                        <h2 class="title">Pusat <span class="inner">Informasi</span></h2>
                    </div>
                </div>
            </div>
            <div class="container mb-4">
                <div class="row">
                    <div class="col">
                        <a href="https://sisakmhs.polsri.ac.id/">
                            <div class="card text-center">
                                <h4>Sistem Informasi Akademik</h4>
                                <i class="fas fa-users fa-5x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://sigawai.polsri.ac.id/">
                            <div class="card text-center">
                                <h4>Sistem Informasi Kepegawaian</h4>
                                <i class="fas fa-user-tie fa-5x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="http://lms.polsri.ac.id/login/index.php">
                            <div class="card text-center">
                                <h4>E-Learning</h4>
                                <i class="fas fa-book-reader fa-5x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="https://jurnal.polsri.ac.id/">
                            <div class="card text-center">
                                <h4>Open Journal Systems</h4>
                                <i class="fab fa-readme fa-5x"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="http://eprints.polsri.ac.id/">
                            <div class="card text-center">
                                <h4>Sistem Informasi Laporan Akhir</h4>
                                <i class="fas fa-layer-group fa-5x"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Information -->

        <!-- Profile -->
        <section class="profile mb-5 align-content-center">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5">
                        <div class="section-title">
                            <h2 class="title">Profile <span class="inner">Jurusan</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="video">
                            <div class="card text-center">
                                <div class="iframe-container">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/RZbH61qs8fY"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <a href="http://www.polsri.ac.id/">
                            <div class="link">
                                <div class="card">
                                    <h4><i class="bi bi-link-45deg"></i> Official Website Politeknik Negeri Sriwijaya
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <a href="http://library.polsri.ac.id/">
                            <div class="link">
                                <div class="card">
                                    <h4><i class="bi bi-link-45deg"></i> Perpustakaan Digital Politeknik Negeri
                                        Sriwijaya
                                    </h4>
                                </div>
                            </div>
                        </a>
                        <a href="http://bpm.polsri.ac.id/">
                            <div class="link">
                                <div class="card">
                                    <h4><i class="bi bi-link-45deg"></i> BPM Politeknik Negeri Sriwijaya</h4>
                                </div>
                            </div>
                        </a>
                        <a href="http://p3ai.polsri.ac.id/">
                            <div class="link">
                                <div class="card">
                                    <h4><i class="bi bi-link-45deg"></i> OfficiP3AI Politeknik Negeri Sriwijayaal
                                        Website
                                        Politeknik Negeri Sriwijaya</h4>
                                </div>
                            </div>
                        </a>
                        <a href="http://akademik.polsri.ac.id/">
                            <div class="link">
                                <div class="card">
                                    <h4><i class="bi bi-link-45deg"></i> Bagian Akademik Politeknik Negeri Sriwijaya
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Profile -->

        <!-- News -->
        <section class="news background-news">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5">
                        <div class="section-title">
                            <h2 class="title"><span class="inner">Berita</span> Terbaru</h2>
                        </div>
                    </div>
                </div>
                <div class="row single-news">
                    <?php
                      $query=mysqli_query($koneksi,"select * from posting order by id desc limit 3");
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
                    <?php } ?></php>
                </div>
                <div class="news-more">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card card-title">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center text-center">
                                            <h2 class="title">Lihat Berita Terbaru Lainnya!</h2>
                                        </div>
                                        <div class="col-md-1 mb-3"></div>
                                        <div class="col-md-3">
                                            <a href="berita.php" class="news-more-link">
                                                <div class="card card-link text-center d-flex align-items-center">
                                                    <h3>Klik Disini!</h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of News -->

        <!-- Covid -->
        <section class="covid mb-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5 covid-title-colomn">
                        <div class="section-title">
                            <h2 class="title">Peduli <span class="inner">Covid-19</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner-covid">
                            <div class="card">
                                <img class="popup" src="assets/images/covid/covid.png" alt="Pencegahan Covid-19" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="video">
                                <div class="card">
                                    <div class="iframe-container">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/wTbXuVt1gSo"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="hastag d-flex flex-wrap">
                                <div class="col-md-4 text-center">
                                    <div class="card">
                                        <h4>#StaySafe</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="card">
                                        <h4>#StayAtHome</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="card">
                                        <h4>#PakaiMasker</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Covid -->

        <!-- Footer -->
        <?php
          include 'footer.php'
        ?>
        <!-- End of Footer -->

        <!-- Modal Box -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pencegahan Covid-19</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="covid-popup" alt="Pencegahan Covid-19" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Box -->

        <!-- Script -->
        <script>
        $(document).ready(function() {
            $('.year').text(new Date().getFullYear());
        });
        </script>
        <script>
        $('.popup').click(function() {
            var src = $(this).attr('src');
            $('.modal').modal('show');
            $('#covid-popup').attr('src', src);
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