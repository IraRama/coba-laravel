<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Anyar Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('anyar') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('anyar') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('anyar') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('anyar') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('anyar') }}/assets/css/style.css" rel="stylesheet">
  <link href="{{ asset('font') }}/css/all.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Anyar - v2.1.0
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a></li>
          <li><i class="icofont-phone"></i> +1 5589 55488 55</li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li>
        </ul>
      </div>
      <div class="cta">
        <a href="#about" class="scrollto">Get Started</a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="#header" class="scrollto">Anyar</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#header" class="logo mr-auto scrollto"><img src="{{ asset('anyar') }}/assets/img/logo.png" alt="" class="img-fluid"></a>-->

      @include('menu_utama')
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section style="height:30vh" id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

      
    </div>
  </section><!-- End Hero -->

  <main id="main" style="margin-top:50px">    

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">
        @if (Session::has('pesan'))
            <div class="alert alert-info">
              {{ \Session::get('pesan') }}
            </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif


        <div class="section-title">
          <h2>Selamat Datang {{ \Auth::guard('mahasiswa')->user()->nama }}</h2>
          <p>Silakan lengkapi berkas syarat pendaftaran dibawah ini :</p>
        </div>

        <div class="card-body">
          <table class="table table-sm table-light">
            <tbody>
              <tr>
                <td rowspan="5" width="100">
                  <img src="{{ \Storage::url(Auth::guard('mahasiswa')->user()->foto) }}" alt="foto" width="100">
                  <td width="30%">Nama</td>
                <td>: {{ Auth::guard('mahasiswa')->user()->nama }}</td>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ Auth::guard('mahasiswa')->user()->jenis_kelamin }}</td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>: {{ Auth::guard('mahasiswa')->user()->tanggal_lahir }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>: {{ Auth::guard('mahasiswa')->user()->email }}</td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td>: {{ $registrasi->jurusan->nama }}</td>
              </tr>
            </tbody>
          </table>
          <table class="table table-light table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <td>No</td>
                <td>Nama Dokumen</td>
                <td>Download</td>
                <td>Status</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($registrasi->syarat as $item)
                  <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>
                    <a href="{{ \Storage::url($item->file) }}" target="blank" class="fa fa-download"> Download File</a>
                  </td>
                  <td class="fa fa-circle"> {{ $item->status }}</td>
                  <td><a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="{{ url('mahasiswa/hapus-syarat', [$item->id]) }}">Hapus File</a></td>
                  </tr>
                  
              @endforeach
            </tbody>
          </table>
          <hr><h2>Input Syarat Pendaftara Mahasiswa Baru</h2>
          {!! Form::model($objek, ['action'=> $action, 'method' => $method, 'files'=>true]) !!}
            <div class="form -group">
              <label for="nama">Nama Syarat</label>
              {!! Form::select('nama', [
                'Kartu Tanda Penduduk' => 'Fotocopy KTP',
                'Ijazah' => 'Fotocopy Ijazah',
                'Surat Keterangan Sehat' => 'Fotocopy Surat Keterangan Sehat'
              ], null, ['class' => 'form-control']) !!}
              <span class="text-helper">{{ $errors->first('nama') }}</span>
            </div>
            <div class="form-group">
              <label for="file">File (Format : jpg, jpeg, png)</label>
              {!! Form::file('file', ['class' => 'form-control']) !!}
              <span class="text-helper">{{ $errors->first('file') }}</span>
            </div>

          {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}  
          {!! Form::close() !!}
        </div>
    </section><!-- End Frequently Asked Questions Section -->

  

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Anyar</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Anyar</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        Login Admin <a href="{{ url('login', []) }}">Login</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('anyar') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('anyar') }}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('anyar') }}/assets/js/main.js"></script>

</body>

</html>