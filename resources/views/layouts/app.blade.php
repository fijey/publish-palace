<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Publish Palace - Write, Publish, Inspire</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Publish Palace Merupakan Sebuah Platform Bagi Para Penulis">
    <meta name="dicoding:email" content="fajarmukti9@gmail.com">
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>

    <!-- Theme CSS -->  
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <style>
      .toastify .on  .toastify-right .toastify-top{
        background-color: "linear-gradient(to right, #ff7533, #ff7533))" !important,
      }

      .mt-6{
        margin-top: 6rem;
      }
    </style>
  @livewireStyles
</head> 

<body>    
    @yield('content')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    
    

    <footer class="footer bg-primary text-light p-5">
      <div class="container">
          <div class="row text-light">
              <div class="col-md-6">
                  <h5 class="mb-4 text-light">Tentang Kami</h5>
                  <p>Publish Palace adalah platform penerbitan buku online yang memungkinkan penulis untuk menerbitkan dan menjual buku secara digital.</p>
              </div>
              <div class="col-md-3 text-light">
                  <h5 class="mb-4 text-light">Navigasi</h5>
                  <ul class="list-unstyled text-light">
                      <li><a href="#" class="text-light" onclick="scrollToClass('tentang-kami')">Tentang Kami</a></li>
                      <li><a href="#" class="text-light" onclick="scrollToClass('fitur')">Fitur</a></li>
                      <li><a href="#" class="text-light" onclick="scrollToClass('visi-misi')">Visi Misi</a></li>
                  </ul>
              </div>
              <div class="col-md-3 text-light">
                  <h5 class="mb-4 text-light">Kontak Kami</h5>
                  <ul class="list-unstyled">
                      <li class="text-light">Email: info@publish-palace.online</li>
                      {{-- <li>Telepon: 123-456-789</li> --}}
                      <li class="text-light">Alamat: Majalaya, Kab Bandung</li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="footer-bottom text-center py-3">
          <small class="text-light">© 2023 Publish Palace. All rights reserved.</small>
      </div>
  </footer>
  
       
    <!-- Javascript -->          
    <script src="{{asset('assets/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('assets/plugins/smoothscroll.min.js')}}"></script> 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
           document.addEventListener('show-toast', function (toast) {
            console.log(toast);
            Toastify({
                text: toast.detail.text,
                duration: toast.detail.duration,
                // destination: "https://github.com/apvarun/toastify-js",
                // newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    'color' : "white"
                },
                onClick: function(){} // Callback after click
                },2000).showToast();
        });

        function scrollToClass(className) {
            var element = $("." + className);
            if (element.length > 0) {
                $("html, body").animate({
                    scrollTop: element.offset().top
                }, 800); // You can adjust the scrolling speed (in milliseconds) as needed
            }
        }
        function hideElement(idName) {
            var element = $("#" + idName);
           element.hide();
        }
    </script>

    <script>
      $(document).ready(function () {
        $('.nav-link').each(function (index, element) {
          // element == this
          $(this).click(function(){
            $(document).find('.nav-link').removeClass('active');
            $(this).addClass('active');
          })
          
        });
      });
    </script>
    @livewireScripts
</body>
</html> 