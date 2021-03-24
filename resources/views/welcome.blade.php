<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Laravel</title>
    @PWA
  </head>

  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <img class="logo" src="{{ asset('img/logo.png') }}">
        <a class="text-white" href="{{ route('login') }}">Login</a>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 data-aos="fade-up" class="header">SELAMAT DATANG</h1>
        <p data-aos="fade-up" class="lead">Segera buat akun anda dan daftarkan <br> ke aplikasi
          untuk
          menggunakan serta menikmati fitur yang tersedia</p>
      </div>
    </div>

    <footer class="footer bg-dark text-white text-md-start">
      <div class="container p-4">
        <div class="row">
          <div class="">
            <div id="footer">
              <img class="logo" src="{{ asset('img/logo.png') }}">
              <p class="mt-3">Jl. Parangtritis 97 RT 57 RW 15, Brontokusuman, Mergangsan, DI Yogyakarta55143</p>
              <p>Telp : (0274) 6055655</p>
              <p>WA Area Jogja : 00000000000</p>
              <p class="mt-3">Email : Cs@LifeMedia.id </p>
            </div>
          </div>
        </div>

        <div class=" text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          <a class="text-white">Build With Love by UMY Intern Team</a>
          <small><a href='https://www.freepik.com/vectors/technology'>Technology vector created by stories -
              www.freepik.com</a>-</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 1000,
      });
      var pwaInstallBtn = document.getElementById('pwa-install');
                let isInitiatePwa = false;
                pwaInstallBtn.style.display = 'none';
                window.addEventListener('beforeinstallprompt', (e) => {
                  // Prevent the mini-infobar from appearing on mobile
                  e.preventDefault();
                  window.deferredPrompt = e;
                  pwaInstallBtn.style.display = 'block';
                });

                pwaInstallBtn.addEventListener('click', (e) => {
                  // Show the install prompt
                  const deferredPrompt = window.deferredPrompt;
                  deferredPrompt.prompt();
                  // Wait for the user to respond to the prompt
                  deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                      console.log('User accepted the install prompt');
                    } else {
                      console.log('User dismissed the install prompt');
                    }
                  });
                });

                window.addEventListener('appinstalled', (evt) => {
                    pwaInstallBtn.style.display = 'none'
                    window.deferredPrompt = null
                  // Log install to analytics
                  // console.log('INSTALL: Success');
                });
    </script>

  </body>

</html>