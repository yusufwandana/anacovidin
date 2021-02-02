<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anacovidin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="http://fonts.cdnfonts.com/css/cheddar-gothic-stencil" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" media="screen and (min-device-width:768px)" href="{{asset('css/web.css')}}">
    <link rel="stylesheet" type="text/css" media="screen and (max-device-width:769px)" href="{{asset('css/mobile.css')}}">
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar is-info is-fixed-top" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
              <a class="navbar-item" href="#">
                <span class="nameApp">AnaCovidIn</span>
              </a>
              <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
              <div class="navbar-start ">
                <a class="navbar-item" href="#home">Home</a>
                <a class="navbar-item" href="#data">Data</a>
                <a class="navbar-item" href="#statistik">Statistik</a>
                <a class="navbar-item" href="#protokol">Protokol Kesehatan</a>
              </div>
            </div>
        </div>
      </nav>

      {{-- Hero --}}
      <section class="hero is-info is-fullheight-with-navbar" style="padding-top: 6%;" id="home">
        <div class="hero-body home">
          <div class="container">
            <div class="columns">
               <div class="column is-two-fifths" data-aos="fade-down-right">
                    <img class="img-doctor-virus animated bounce" src="{{asset('img/doctor-virus.png')}}" alt="">
              </div>
              <div class="column" data-aos="fade-down-left">
                <h1 class="heading hero-title hero-text">Informasi <u class="text-red">Virus Corona</u> di Indonesia</h1>
                <p class="subtitle hero-subtitle">
                    Menampilkan data terbaru mengenai kasus penyebaran COVID-19. Wujudkan Indonesia bebas dari wabah COVID-19 dengan cara menerapkan <i>new normal</i> tanpa meremehkan protokol kesehatan.
                </p>
                <a class="button is-light" href="#data" style="width:130px;"><p class="heading button-title">Mulai</p></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      {{-- Total Cases --}}
      <section class="section" id="data" style="">
          <div class="container">
            <div class="columns has-text-centered">
                <div class="column" data-aos="zoom-in">
                    <h1 class="heading section-title mt-5">Total Kasus <u class="text-red">COVID-19</u> di Indonesia</h1>
                </div>
            </div>
            <div class="columns has-text-centered my-3">
                <div class="column mx-2" data-aos="fade-right">
                    <i class="fas fa-viruses pb-3" style="font-size:5em; color:red;"></i>
                    <p class="heading icon-text my-3">Positif</p>
                    <p class="title">{{$data[0]['positif']}}</p>
                </div>
                <div class="column mx-2" data-aos="fade-right">
                    <i class="fas fa-heartbeat pb-3" style="font-size:5em; color:green;"></i>
                    <p class="heading my-3 icon-text">Sembuh</p>
                    <p class="title">{{$data[0]['sembuh']}}</p>
                </div>
                <div class="column mx-2" data-aos="fade-left">
                    <i class="fas fa-procedures pb-3" style="font-size:5em; color:orange;"></i>
                    <p class="heading my-3 icon-text">Dirawat</p>
                    <p class="title">{{$data[0]['dirawat']}}</p>
                </div>
                <div class="column mx-2" data-aos="fade-left">
                    <i class="fas fa-ambulance pb-3" style="font-size:5em; color:red;"></i>
                    <p class="heading my-3 icon-text">Meninggal</p>
                    <p class="title">{{$data[0]['meninggal']}}</p>
                </div>
            </div>
          </div>
      </section>

      {{-- Tabel Detail --}}
      <section class="section">
        <div class="container">
            <div class="columns has-text-centered">
                <div class="column" data-aos="zoom-in">
                    <h1 class="heading section-title mt-3">Detail Kasus <u class="text-red">COVID-19</u> per Provinsi</h1>
                </div>
            </div>
            <div class="columns">
                <div class="column table-res" data-aos="zoom-in">
                    <table class="">
                        <tr>
                            <th>Provinsi</th>
                            <th>Positif</th>
                            <th>Sembuh</th>
                            <th>Meninggal</th>
                        </tr>
                        @foreach ($detailData as $item)
                        <tr>
                            <td>{{$item['attributes']['Provinsi']}}</td>
                            <td>{{$item['attributes']['Kasus_Posi']}}</td>
                            <td>{{$item['attributes']['Kasus_Semb']}}</td>
                            <td>{{$item['attributes']['Kasus_Meni']}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>

      {{-- Statistik --}}
      <section class="section bg-abu" id="statistik">
          <div class="container">
            <div class="columns" data-aos="zoom-in">
                <div class="column mx-2 has-text-centered">
                    <h1 class="heading section-title mt-5">Grafik Kasus <u class="text-red">Positif</u> per Provinsi</h1>
                </div>
            </div>
            <div class="columns">
                <div class="column mx-2" data-aos="zoom-in-down">
                    {{ $chart->container() }}
                </div>
            </div>
        </div>
      </section>

      {{-- Protokol --}}
      <section class="section" id="protokol">
        <div class="container">
            <div class="columns">
                <div class="column mx-2 has-text-centered">
                    <h1 class="heading section-title mt-5" data-aos="fade-in">Patuhi Protokol <u class="text-green">Kesehatan</u></h1>
                </div>
            </div>
            <div class="columns">
                <div class="column mx-2">
                    <div class="card box-radius" data-aos="fade-down-right">
                        <div class="card-content">
                            <div class="columns">
                                <div class="column is-half">
                                    <img src="{{asset('img/stay_at_home.png')}}">
                                </div>
                                <div class="column has-text-justified">
                                    <h1 class="heading section-title protokol-title">#DiRumahAja</h1>
                                    <p class="subtitle protokol-desc">Tetap dirumah apabila tidak ada kepentingan apapun di luar rumah.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column mx-2">
                    <div class="card box-radius" data-aos="fade-down-left">
                        <div class="card-content">
                            <div class="columns">
                                <div class="column is-half has-text-justified">
                                    <h1 class="heading section-title protokol-title">Menjalankan 3M</h1>
                                    <p class="subtitle protokol-desc">
                                        Jika beraktifitas di luar rumah, jangan lupa untuk memakai masker, menjaga jarak dan mencuci tangan.
                                    </p>
                                </div>
                                <div class="column has-text-centered">
                                    <img src="{{asset('img/social_distancing.png')}}" style="width:66%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns pb-5 mb-5">
                <div class="column mx-2">
                    <div class="card box-radius" data-aos="fade-up-right">
                        <div class="card-content">
                            <div class="columns">
                                <div class="column is-half">
                                    <img src="{{asset('img/50_percent.png')}}">
                                </div>
                                <div class="column has-text-justified">
                                    <h1 class="heading section-title protokol-title">Maksimal 50%</h1>
                                    <p class="subtitle protokol-desc">Setiap perusahaan hanya boleh mempekerjakan setengah dari total seluruh karyawannya agar tidak terjadi kerumunan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column mx-2">
                    <div class="card box-radius" data-aos="fade-up-left">
                        <div class="card-content">
                            <div class="columns">
                                <div class="column is-half">
                                    <h1 class="heading section-title protokol-title">Saling Mengingatkan</h1>
                                    <p class="subtitle protokol-desc">Saling menjaga dan saling mengingatkan mencerminkan tingkah laku yang baik.</p>
                                </div>
                                <div class="column has-text-justified">
                                    <img src="{{asset('img/remind.png')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>

      {{-- Footer --}}
      <footer class="footer">
        <div class="content has-text-centered">
            Total Pengunjung : {{$totalVisitor}}
          <strong></strong>
          <p><strong>Copyright</strong> &copy; 2021 <a href="#"><strong>Anacovidin</strong></a>. All Rights Reserved.</p>
        </div>
      </footer>


      {{-- Javascript --}}
      <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

                    });
                });
            }

        });
      </script>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script> --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
      <script>
          $(document).ready(function(){
            $('.chartjs-render-monitor').css('height', '500px');
          });
      </script>
      {{ $chart->script() }}
  </body>
</html>
