@php 
use App\Helper\PPHelper;
@endphp
<div>
    <style>
        /* Styling untuk judul h1 */
        h1 {
        font-family: "Arial", sans-serif;
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        }

        /* Styling untuk paragraf dengan kelas "lead" */
        p.lead {
        font-family: "Helvetica", sans-serif;
        font-size: 18px;
        line-height: 1.6;
        color: #444; /* Warna abu-abu untuk teks paragraf */
        text-align: justify;
        margin-bottom: 30px;
        }
        /* Styling untuk tombol utama (Primary) */
        .btn-primary {
        background-color: #ff4500; /* Warna merah tua untuk tombol utama */
        color: #fff; /* Warna teks putih */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-right: 10px;
        }

        /* Hover effect untuk tombol utama */
        .btn-primary:hover {
        background-color: #cc3700; /* Warna merah tua yang lebih terang saat dihover */
        }

        /* Styling untuk tombol sekunder (Secondary) */
        .btn-secondary {
        background-color: #f0f0f0; /* Warna abu-abu untuk tombol sekunder */
        color: #333; /* Warna teks hitam */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        }

        /* Hover effect untuk tombol sekunder */
        .btn-secondary:hover {
        background-color: #ddd; /* Warna abu-abu yang lebih terang saat dihover */
        }

          a {
            color: initial;
            text-decoration: initial;
          }
          
      
          .box {
            width: 8rem; /* Ukuran lebar card */
            height: 10rem;
            background-color: #fff;
            transition: .5s;
            margin: 20px; /* Jarak antar card */
            border: 1px solid #ffffff40;
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
          }
      
          .box:hover {
            box-shadow: 5px 5px 70px rgba(0, 0, 0, 0.3);
          }
      
          .top .tab {
            width: 0.5rem;
            height: 1rem;
            background-color: #ff7526;
            float: right;
            margin-right: 15px;
            margin-top: 0;
          }

          .info-buku{
            height: 10rem;
          }
      
       
        </style>

    <main>

      <section class="hero-section mt-8">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-7 pt-5 mb-5 align-self-center">
              <div class="promo pe-md-3 pe-lg-5">
                <h1 class="headline mb-3">
                  SELAMAT DATANG DI <br>PLATFORM PUBLISH PALACE   
                </h1><!--//headline-->
                <div class="subheadline mb-4">
                  Tempat di mana kata-kata menjadi karya yang mengagumkan. 
                  
                </div><!--//subheading-->
                
                <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
                  <div class="col-12 col-md-auto">
                      <a class="btn btn-primary w-100" href="/login">Register</a>
                  </div>
                  <div class="col-12 col-md-auto">
                      <a class="btn btn-secondary scrollto w-100" href="#benefits-section">Learn More</a>
                  </div>
                </div><!--//cta-holder-->
                
                <div class="hero-quotes mt-5">
                  <div id="quotes-carousel" class="quotes-carousel carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="8000">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#quotes-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <blockquote class="quote p-4 theme-bg-light">
                            "Filosofi write mengajarkan pentingnya ekspresi diri dan kekuatan kata-kata dalam menyampaikan pesan, menceritakan kisah, atau menyampaikan informasi. Menulis juga memungkinkan seseorang untuk menjernihkan pikiran, merenungkan pengalaman, dan menciptakan karya yang dapat mempengaruhi orang lain."     
                          </blockquote><!--//item-->
                          <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                            <div class="col-12 col-md-auto text-center text-md-start">
                                {{-- <img class="source-profile" src="assets/images/profiles/profile-1.png" alt="image" > --}}
                            </div><!--//col-->
                            <div class="col source-info text-center text-md-start">
                              <div class="source-name">Write</div>
                              <div class="soure-title">Filosofi</div>
                          </div><!--//col-->
                          </div><!--//source-->
                      </div><!--//carousel-item-->
                      <div class="carousel-item">
                          <blockquote class="quote p-4 theme-bg-light">
                            " Filosofi publish menekankan pentingnya berbagi pengetahuan dan kreativitas dengan dunia. Dengan menerbitkan karya, seseorang memberikan kesempatan bagi orang lain untuk mengakses, menilai, dan mengapresiasi hasil kerja mereka. Menerbitkan juga mencerminkan komitmen untuk berbagi ide dan memberi dampak positif pada masyarakat."
                          </blockquote><!--//item-->
                          <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                            <div class="col-12 col-md-auto text-center text-md-start">
                                {{-- <img class="source-profile" src="assets/images/profiles/profile-2.png" alt="image" > --}}
                            </div><!--//col-->
                            <div class="col source-info text-center text-md-start">
                              <div class="source-name">Publish</div>
                              <div class="soure-title">Filosofi</div>
                          </div><!--//col-->
                          </div><!--//source-->
                      </div><!--//carousel-item-->
                      <div class="carousel-item">
                          <blockquote class="quote p-4 theme-bg-light">
                          "Filosofi inspire mengajarkan bahwa karya tulis yang kuat dan bermakna dapat merangsang perubahan, membangkitkan motivasi, dan menghadirkan perasaan positif pada orang lain. Ketika karya tulis berhasil menginspirasi, maka tulisan tersebut memiliki daya hidup yang melebihi kata-kata dan mencapai kedalaman emosional yang lebih dalam."
                          </blockquote><!--//item-->
                          <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                            <div class="col-12 col-md-auto text-center text-md-start">
                                {{-- <img class="source-profile" src="assets/images/profiles/profile-3.png" alt="image" > --}}
                            </div><!--//col-->
                            <div class="col source-info text-center text-md-start">
                              <div class="source-name">Inspire</div>
                              <div class="soure-title">Filosofi</div>
                          </div><!--//col-->
                          </div><!--//source-->
                      </div><!--//carousel-item-->
                  </div><!--//carousel-inner-->
                </div><!--//quotes-carousel-->
                
                </div><!--//hero-quotes-->
              </div><!--//promo-->
            </div><!--col-->
            <div class="col-12 col-md-5 mb-5 align-self-center">
              <div class="book-cover-holder">
                <img class="img-fluid book-cover" src="{{asset('assets/pp-cove2r.png')}}" alt="book cover" >
                <div class="book-badge d-inline-block shadow">
                  New<br>Release
                </div>
              </div><!--//book-cover-holder-->
            </div><!--col-->
          </div><!--//row-->
        </div><!--//container-->
      </section><!--//hero-section-->
      
      <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
        <div class="container py-5">
          <h2 class="section-heading text-center mb-3">KENAPA HARUS PUBLISH DI SINI?</h2>
          <div class="section-intro single-col-max mx-auto text-center mb-5">Dengan mempublikasi di platform kami, kamu akan mendapatkan berbagai keuntungan fitur menarik, diantaranya</div>
          <div class="row text-center">
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                  <div class="item-icon"><i class="fas fa-laptop-code"></i></div>
                  <h3 class="item-heading">AI for you ( coming soon )</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Selain bisa publikasi e-book pdf kamu, kamu juga bisa edit langsung didalam platform dengan bantuan AI yang
                  bisa membantu kamu mengecek paraphrase penulisan.
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                  <div class="item-icon"><i class="fas fa-money-bill"></i></div>
                  <h3 class="item-heading">Sell</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Kamu Bisa Menjual Ebook Kamu disini, kamu juga bisa mengubah status e-book kamu apakah free atau berbayar
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                  <div class="item-icon"><i class="fab fa-rocketchat"></i></div>
                  <h3 class="item-heading">Discuss ( coming soon )</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Nikmati Fitur Forum yang bisa digunakan untuk diskusi antar penulis, brain storming penulisan bersama, membuat e-book bersama dll
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                  <div class="item-icon"><i class="fas fa-book"></i></div>
                  <h3 class="item-heading">Experience Membaca yang sangat nyaman</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Nikmati Pengalaman Membaca dalam 3D
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                <!-- Ganti ikon code-branch dengan ikon register -->
                <div class="item-icon"><i class="fas fa-clipboard-list"></i></div>
                  <h3 class="item-heading">Pendaftaran 100% Free</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Untuk Memberdayakan Penulis di Indonesia, Platform ini 100% Free
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
            <div class="item col-12 col-md-6 col-lg-4">
              <div class="item-inner p-3 p-lg-4">
                <div class="item-header mb-3">
                  <div class="item-icon"><i class="fas fa-sync-alt"></i></div>
                  <h3 class="item-heading">Montly Updated</h3>
                </div><!--//item-heading-->
                <div class="item-desc">
                  Pembaharuan Akan Kami Rilis Setiap Bulan, Jadi Jangan Lupa Daftar dan tunggu fitur menarik dari kami
                </div><!--//item-desc-->
              </div><!--//item-inner-->
            </div><!--//item-->
          </div><!--//row-->
        </div><!--//container-->
      </section><!--//benefits-section-->
      
      {{-- <section id="content-section" class="content-section">
        <div class="container">
          <div class="single-col-max mx-auto">
          <h2 class="section-heading text-center mb-5">What's Included</h2>
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="figure-holder mb-5">
                  <img class="img-fluid" src="assets/images/devbook-devices.png" alt="image" >
                </div><!--//figure-holder-->
              </div><!--//col-->
              <div class="col-12 col-md-6 mb-5">
                <div class="key-points mb-4 text-center">
                  <ul class="key-points-list list-unstyled mb-4 mx-auto d-inline-block text-start">
                    <li><i class="fas fa-check-circle me-2"></i>List your book's content here.</li>
                    <li><i class="fas fa-check-circle me-2"></i>PDF fermentum tincidunt erat.</li>
                    <li><i class="fas fa-check-circle me-2"></i>EPUB curabitur fermentum.</li>
                    <li><i class="fas fa-check-circle me-2"></i>Lorem ipsum dolor sit amet.</li>
                    <li><i class="fas fa-check-circle me-2"></i>Praesent molestie odio risus. </li>
                    <li><i class="fas fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                    <li><i class="fas fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                    <li><i class="fas fa-check-circle me-2"></i>Kindle curabitur fermentum.</li>
                  </ul>
                  <div class="text-center"><a class="btn btn-primary" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/">I want this book</a></div>
                </div><!--//key-points-->
                
              </div><!--//col-12-->   
            </div><!--//row-->
          </div><!--//single-col-max-->
        </div><!--//container-->
      </section><!--//content-section-->
       --}}
      <section id="audience-section" class="audience-section py-5">
        <div class="container">
          <h2 class="section-heading text-center mb-4">Visi</h2>
          <div class="section-intro single-col-max mx-auto text-center mb-5">
            Visi Publish Palace adalah menjadi platform terkemuka yang memberdayakan penulis dan penerbit untuk menerbitkan karya mereka dengan mudah, efisien, dan profesional. Kami berkomitmen untuk menyediakan layanan berkualitas tinggi dan inovatif yang memungkinkan penulis dan penerbit untuk mencapai audiens yang lebih luas, memperluas dampak, dan meningkatkan visibilitas karya mereka di pasar global.
<br>
 </div><!--//section-intro-->
 <h2 class="section-heading text-center mb-4">Misi</h2>
          <div class="audience mx-auto">
            <div class="item row gx-3">
              <div class="col-auto item-icon">1</div>
              <div class="col">
                <h4 class="item-title">Kemudahan Penerbitan</h4>
                <div class="item-desc">Menyediakan platform yang user-friendly dan intuitif sehingga penulis dan penerbit dari berbagai latar belakang dapat menerbitkan buku, e-book, dan materi penerbitan lainnya dengan mudah dan cepat.</div>
              </div><!--//col-->
            </div><!--//item-->			    
            <div class="item row gx-3">
              <div class="col-auto item-icon">2</div>
              <div class="col">
                <h4 class="item-title">Akses Global</h4>
                <div class="item-desc">Menawarkan akses ke pasar global dan distribusi yang luas sehingga karya-karya yang diterbitkan dapat dijangkau oleh pembaca dari berbagai belahan dunia.</div>
              </div><!--//col-->
            </div><!--//item-->			    
            <div class="item row gx-3">
              <div class="col-auto item-icon">3</div>
              <div class="col">
                <h4 class="item-title">Dukungan Professional</h4>
                <div class="item-desc">Memberikan dukungan penerbitan profesional yang mencakup editing, desain, dan pemasaran agar karya-karya yang diterbitkan memiliki kualitas tinggi dan menarik bagi pembaca.</div>
              </div><!--//col-->
            </div><!--//item-->
            <div class="item row gx-3">
              <div class="col-auto item-icon">4</div>
              <div class="col">
                <h4 class="item-title">Kebebasan Kreatif</h4>
                <div class="item-desc">Memberikan kebebasan bagi penulis untuk mengekspresikan ide-ide kreatif mereka tanpa batasan, sehingga karya-karya yang diterbitkan mencerminkan keunikan dan visi penulis.</div>
              </div><!--//col-->
            </div><!--//item-->
            <div class="item row gx-3">
              <div class="col-auto item-icon">5</div>
              <div class="col">
                <h4 class="item-title">Inovasi Teknologi</h4>
                <div class="item-desc">Terus menghadirkan teknologi terbaru dalam industri penerbitan untuk meningkatkan efisiensi dan efektivitas proses penerbitan.</div>
              </div><!--//col-->
            </div><!--//item-->
            <div class="item row gx-3">
              <div class="col-auto item-icon">6</div>
              <div class="col">
                <h4 class="item-title">Komunitas Penerbit</h4>
                <div class="item-desc">Membangun komunitas yang solid dari penulis dan penerbit yang saling mendukung, berbagi pengetahuan, dan menginspirasi satu sama lain untuk mencapai kesuksesan.</div>
              </div><!--//col-->
            </div><!--//item-->
            <div class="item row gx-3">
              <div class="col-auto item-icon">7</div>
              <div class="col">
                <h4 class="item-title">Kualitas dan Etika</h4>
                <div class="item-desc">Menjunjung tinggi standar kualitas dan etika dalam setiap aspek bisnis, termasuk perlindungan hak cipta dan hak-hak penulis.</div>
              </div><!--//col-->
            </div><!--//item-->
          </div><!--//audience-->
        </div><!--//container-->
      </section><!--//audience-section-->
      
      {{-- <section id="form-section" class="form-section">
        <div class="container">
          <div class="lead-form-wrapper single-col-max mx-auto theme-bg-light rounded p-5">
            <h2 class="form-heading text-center">Get A Free Preview</h2>
            <div class="form-intro text-center mb-3">Sign up to get a free preview of the book. <br>You can offer visitors free book previews to generate leads.</div>
            <div class="form-wrapper mx-auto">					
            <form class="signup-form row g-2 align-items-center">
                        <div class="col-12 col-lg-9">
                            <label class="sr-only" for="semail">Email</label>
                            <input type="email" id="semail" name="semail1" class="form-control me-md-1 semail" placeholder="Your email">
                        </div>
                        <div class="col-12 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-submit w-100">Send</button>
                        </div>
                    </form><!--//signup-form-->
            </div><!--//form-wrapper-->
          </div><!--//lead-form-wrapper-->
        </div><!--//container-->
      </section><!--//form-section-->
      
      <section id="reviews-section" class="reviews-section py-5">
        <div class="container">
          <h2 class="section-heading text-center">Book Reviews</h2>
          <div class="section-intro text-center single-col-max mx-auto mb-5">See what our readers are saying. </div>
          <div class="row justify-content-center">
            <div class="item col-12 col-lg-4 p-3 mb-4">
              <div class="item-inner theme-bg-light rounded p-4">
                
                <blockquote class="quote">
                    "Excellent Book! Add your book review here consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. "     
                  </blockquote><!--//item-->
                  <div class="source row gx-md-3 gy-3 gy-md-0">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img class="source-profile" src="assets/images/profiles/profile-1.png" alt="image" >
                    </div><!--//col-->
                    <div class="col source-info text-center text-md-start">
                      <div class="source-name">James Doe</div>
                      <div class="soure-title">Co-Founder, Startup Week</div>
                  </div><!--//col-->
                  </div><!--//source-->
                  <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
              </div><!--//inner-->
            </div><!--//item-->
            <div class="item col-12 col-lg-4 p-3 mb-4">
              <div class="item-inner theme-bg-light rounded p-4">
                <blockquote class="quote">
                    "Great Book! Add your book review here consectetur adipiscing elit. Aliquam euismod nunc porta urna facilisis tempor. Praesent mauris neque."     
                  </blockquote><!--//item-->				        
                  <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img class="source-profile" src="assets/images/profiles/profile-2.png" alt="image" >
                    </div><!--//col-->
                    <div class="col source-info text-center text-md-start">
                      <div class="source-name">Jean Doe</div>
                      <div class="soure-title">Co-Founder, Company Tristique</div>
                  </div><!--//col-->
                  </div><!--//source-->
                  
                   <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
              </div><!--//inner-->
            </div><!--//item-->
            <div class="item col-12 col-lg-4 p-3 mb-4">
              <div class="item-inner theme-bg-light rounded p-4">
                <blockquote class="quote">
                    "Excellent Book! Add your book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
                  </blockquote><!--//item-->
                  <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img class="source-profile" src="assets/images/profiles/profile-3.png" alt="image" >
                    </div><!--//col-->
                    <div class="col source-info text-center text-md-start">
                      <div class="source-name">Tom Doe</div>
                      <div class="soure-title">Product Designer, Company Lorem</div>
                  </div><!--//col-->
                  </div><!--//source-->
                   <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
              </div><!--//inner-->
            </div><!--//item-->
            <div class="item col-12 col-lg-4 p-3 mb-4">
              <div class="item-inner theme-bg-light rounded p-4">
                <blockquote class="quote">
                    "Another book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
                  </blockquote><!--//item-->
                  <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img class="source-profile" src="assets/images/profiles/profile-4.png" alt="image" >
                    </div><!--//col-->
                    <div class="col source-info text-center text-md-start">
                      <div class="source-name">Alice Doe</div>
                      <div class="soure-title">App Developer, Company Ipsum</div>
                  </div><!--//col-->
                  </div><!--//source-->
                  <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
              </div><!--//inner-->
            </div><!--//item-->
            <div class="item col-12 col-lg-4 p-3 mb-4">
              <div class="item-inner theme-bg-light rounded p-4">
                <blockquote class="quote">
                    "Another book review here consectetur adipiscing elit. Pellentesque ac leo turpis. Phasellus imperdiet id ligula tempor imperdiet."     
                  </blockquote><!--//item-->
                  <div class="source row gx-md-3 gy-3 gy-md-0 align-items-center">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <img class="source-profile" src="assets/images/profiles/profile-5.png" alt="image" >
                    </div><!--//col-->
                    <div class="col source-info text-center text-md-start">
                      <div class="source-name">Sam Doe</div>
                      <div class="soure-title">Co-Founder, Company Integer</div>
                  </div><!--//col-->
                  </div><!--//source-->
                  <div class="icon-holder"><i class="fas fa-quote-right"></i></div>
              </div><!--//inner-->
            </div><!--//item-->
          </div><!--//row-->
          <div class="text-center">
              <a class="btn btn-primary" href="https://themes.3rdwavemedia.com/bootstrap-templates/startup/devbook-free-bootstrap-5-book-ebook-landing-page-template-for-developers/">Get Your Copy Today</a>
          </div>
        </div><!--//container-->
      </section><!--//reviews-section-->
       --}}
      <section id="author-section" class="author-section section theme-bg-primary py-5 tentang-kami">
        <div class="container py-3">
          <div class="author-profile text-center mb-5">
            {{-- <img class="author-pic" src="assets/images/profiles/author-profile.png" alt="image" > --}}
          </div><!--//author-profile-->
          <h2 class="section-heading text-center text-white mb-3">About The Publish Palace</h2>
          <div class="author-bio single-col-max mx-auto">
            Selamat datang di istana penerbitan yang megah, tempat di mana kata-kata menjadi karya yang mengagumkan. 
              <br>Publish Palace adalah rumah bagi para penulis yang penuh dedikasi, para pemimpi yang ingin menghadirkan kisah mereka ke dalam dunia sastra. 
              <br> Misi kami adalah memberdayakan para penulis dengan sarana untuk mengungkapkan kreativitas mereka tanpa batas. 
              
              <br><br> Dengan tim profesional yang berpengalaman, kami hadir untuk menyediakan perjalanan penerbitan yang mulus dan berpengaruh, dari awal hingga akhir. <br> Bersama-sama, kita akan menemukan permata sastra baru yang tak terhitung jumlahnya dan menghadirkannya kepada pembaca yang lapar akan petualangan baru.

              Tunjukkan bakatmu, biarkan kata-katamu mengalir, dan hadirkan karya sastramu di PublishPalace. <br> <br>Bergabunglah dengan komunitas kami yang bersemangat, temukan inspirasi, dan wujudkan mimpi sastramu di panggung dunia.
              
              Ayo, mari bersama-sama menulis sejarah!
            {{-- <div class="author-links text-center pt-4">
                <h5 class="text-white mb-4">Follow Author</h5>
              <ul class="social-list list-unstyled">
                <li class="list-inline-item"><a href="https://twitter.com/3rdwave_themes"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://github.com/xriley"><i class="fab fa-github-alt"></i></a></li> 
                    <li class="list-inline-item"><a href="https://medium.com/@3rdwave_themes"><i class="fab fa-medium-m"></i></a></li>
                    
                    <li class="list-inline-item"><a href="https://themes.3rdwavemedia.com/"><i class="fas fa-globe-europe"></i></a></li>
                </ul><!--//social-list-->
            </div><!--//author-links--> --}}
            
          </div><!--//author-bio-->
          
        </div><!--//container-->
      </section><!--//author-section-->

      <section id="audience-section" class="audience-section py-5">
          <div class="container">
            <h4 class="text-center">
              Koleksi Buku Terbaru Dari Komunitas
            </h4>
            <div class="row">
                @forelse ($data_books as $item)
                    <div class="col-sm-6 col-md-6 col-lg-2 d-flex justify-content-center" wire:click="modal_detail_toggle({{@$item->id}})" role="button">
                        <div class="box top" style=" 
                        position: relative;
                        background-image: url({{asset('storage/' .@$item->cover)}});
                        background-size: cover;">
                            <div class="tab"></div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 d-flex justify-content-center mt-8">
                        <h6>Belum Ada Koleksi Buku</h6>
                    </div>
                @endforelse
            </div>
          </div>
      </section>
      
      </main>
        <!-- Modal Detail Buku -->
        <div class="modal fade {{$is_show_detail == true ? 'show' : ''}}" style="{{$is_show_detail == true ? 'background-color: #00000073;display:block' : 'display:none'}}" id="modalBookDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="myModalLabel">{{$judul_buku}}</h5>
                      <a class="close" data-dismiss="modal" aria-label="Close" wire:click="modal_detail_toggle(false)">
                          <span aria-hidden="true">&times;</span>
                      </a>
                  </div>
                  <div class="modal-body">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-12 col-md-3 d-flex justify-content-center">
                                  <div class="cover bg-primary-pp" style="height: 200px; width:150px; background-image: url({{asset('storage/' .$cover)}}); background-size: cover;"></div>
                              </div>
                              <div class="col-sm-12 mt-4 col-md-9 mt-md-0 d-flex justify-content-start">
                                  <div class="row">
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Nama</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{$nama_penulis}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Judul</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start ">{{$judul_buku}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>ISBN</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start ">{{$isbn}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Kategori</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{$nama_kategori}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Harga</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{PPHelper::formatCurrency($harga)}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Apakah Gratis?</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_free ? 'Ya, Ini Gratis' : 'Tidak Gratis'}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Lisensi</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{$lisensi}}</div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start"><strong>Status</strong></div>
                                    <div class="col-sm-12 col-md-6 text-center text-md-start">{{$is_publikasi ? 'Sudah Di Publikasi' : 'Draft'}}</div>
                                  </div>
                              </div>
                              <div class="col-sm-12 mt-4 mt-md-2">
                                  <h5 class="text-center">Book Description</h5>
                                  <p>{{$deskripsi}}</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" wire:click="modal_detail_toggle(false)">Tutup</button>
                      <a type="button" href="{{route('book.show',$slug??123)}}" class="btn btn-primary" target="_blank">Lihat Karya</a>
                      {{-- 
                      <button type="button" class="btn btn-danger" wire:click="delete_book()">Hapus</button> --}}
                  </div>
              </div>
          </div>
      </div>
</div>
