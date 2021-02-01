<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Folks!</title>

    <!-- Font Awesome Icons -->
    <link href="<?= base_url('frontend/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?= base_url('frontend/'); ?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?= base_url('frontend/'); ?>css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a  class="navbar-brand js-scroll-trigger" href="#page-top">Kopi MBaroh</a>
            <!-- <img src="frontend/img/logo.jpg" alt="" href="#"> -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?=site_url('auth/login')?>">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#res">Booking/Reservation</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#book">Feedback</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Tempat Nyaman Untuk Menikmati Secangkir Kopi</h1>
                    <hr class="divider my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5"></p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#">Find Out More</a>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider light my-4">
                    <p class="text-white-50 mb-4">Sebuah Cafe Bernuansa Klasik & Menyuguhkan Kopi dan Hidangan yang Nikmat</p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="<?=base_url('reservation/booking') ?>">Book Now!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">At Your Service</h2>
            <hr class="divider my-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Sturdy Themes</h3>
                        <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Up to Date</h3>
                        <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Ready to Publish</h3>
                        <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Made with Love</h3>
                        <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <?php foreach ($menu as $key => $data) : ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url('uploads/menu/') . $data->gambar; ?>">
                            <img class="img-fluid" src="<?= base_url('uploads/menu/') . $data->gambar; ?>" alt="">
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">
                                    
                                </div>
                                <div class="project-name">
                                    <?= $data->nama_menu ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

   <!-- Booking
   <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="mt-0">Let's have a seat in our place!</h2>
                    <hr class="divider">
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    <form action="<?= base_url('reservation/add') ?>" method="post">
                        <div class="form-group row">
                            <div class="col-sm">
                                <?= form_error('name', '<p class="text-danger">', '</p>'); ?>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your name....">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <?= form_error('phone', '<p class="text-danger">', '</p>'); ?>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Your phone number....">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <?= form_error('jumlah_orang', '<p class="text-danger">', '</p>'); ?>
                                <input type="number" class="form-control" name="jumlah_orang" id="jumlah_orang" placeholder="Your number of ppl....">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <?= form_error('tgl_h', '<p class="text-danger">', '</p>'); ?>
                                <input type="date" class="form-control" name="tgl_h" id="tgl_h" placeholder="Book At....">
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm">
                                <div class="col-sm">
                                    <button type="submit" class="btn btn-primary">Booking now</button>
                                    <a class="btn btn-dark" target="_blank" href="<?= site_url('home/print') ?>">Lihat Daftar Menu</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Feedback -->
   <section class="page-section bg-dark text-white" id="book">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="mt-0">Give ur Feedback</h2>
                    <hr class="divider">
                    <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    <form action="<?= base_url('feedback/add') ?>" method="post">
                        <div class="form-group row">
                            <div class="col-sm">
                                <?= form_error('nama_plgn', '<p class="text-danger">', '</p>'); ?>
                                <input type="text" class="form-control" name="nama_plgn" id="nama_plgn" placeholder="Your name....">
                            </div>
                        </div>
                        <div>
                            <textarea class="col-sm" name="kritik_saran" id="kritik_saran" cols="51" rows="3" placeholder="Your message...."></textarea>
                        </div>
                        
                        <div align="center" style="padding: 50px;color:white;">
                        <p class="text-muted mb-5">Tentukan nilai anda terhadap pelayanan kami</p>
                             <i class="fa fa-star fa-2x" data-index="0"></i>
                             <i class="fa fa-star fa-2x" data-index="1"></i>
                             <i class="fa fa-star fa-2x" data-index="2"></i>
                             <i class="fa fa-star fa-2x" data-index="3"></i>
                             <i class="fa fa-star fa-2x" data-index="4"></i>
                            </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm">
                                <div class="col-sm">
                                <input type="hidden" name="rate" id="rate">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
        </div>
    </footer>

    <!-- Bintang -->
    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script>
        var ratedIndex = -1, uID = 0;

        $(document).ready(function () {
            resetStarColors();

            if (localStorage.getItem('ratedIndex') != null) {
                setStars(parseInt(localStorage.getItem('ratedIndex')));
                uID = localStorage.getItem('uID');
            }

            $('.fa-star').on('click', function () {
               ratedIndex = parseInt($(this).data('index'));
               localStorage.setItem('ratedIndex', ratedIndex);
                $('#rate').val(ratedIndex);
            });

            $('.fa-star').mouseover(function () {
                resetStarColors();
                var currentIndex = parseInt($(this).data('index'));
                setStars(currentIndex);
            });

            $('.fa-star').mouseleave(function () {
                resetStarColors();

                if (ratedIndex != -1)
                    setStars(ratedIndex);
            });
        });


        function setStars(max) {
            for (var i=0; i <= max; i++)
                $('.fa-star:eq('+i+')').css('color', 'yellow');
        }

        function resetStarColors() {
            $('.fa-star').css('color', 'white');
        }
    </script>


    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('frontend/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('frontend/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= base_url('frontend/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('frontend/'); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= base_url('frontend/'); ?>js/creative.min.js"></script>

</body>

</html>