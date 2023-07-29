<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Publish Palace - Write, Publish, Inspire</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
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
    
    
    

    <footer class="footer">

	    <div class="footer-bottom text-center py-5">

	        <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Publish Palace</small>
 
	    </div>
	    
    </footer>
       
    <!-- Javascript -->          
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
                }).showToast();
        });
    </script>
    @livewireScripts
</body>
</html> 