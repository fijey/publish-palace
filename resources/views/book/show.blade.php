@extends('layouts.app')

@section('content')

    <style>
       .df-lightbox-controls{
            display: none !important;
        }
    </style>
  <!-- Flipbook StyleSheet -->
  <link href="{{asset('assets/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Icons Stylesheet -->
  <link href="{{asset('assets/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">

    <div class="container">
        <div class="_df_custom btn-open" source="{{asset($path_book)}}?time={{time()}}">
        </div>
    </div>

    <!-- jQuery  -->
<script src="{{asset('assets/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/dflip/js/dflip.min.js')}}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{asset('assets/dflip/js/libs/three.min.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function () {
    $('.btn-open').trigger('click');

    let html = `
    <div class="df-ui-btn df-ui-pagemode" title="Dark Mode" onclick="toggleDarkMode()">
        <i class="fas fa-moon"></i> <!-- Ikon bulan untuk dark mode -->
        <i class="fas fa-sun" style="display:none"></i><span class="p-1">Toggle Dark Mode</span>
    </div>
    `;

    setTimeout(() => {
      $('.more-container').append(html);
      toggleDarkMode();
    }, 2000);
  });

  function toggleDarkMode() {
        // Toggle class 'dark-mode' pada elemen body
        document.body.classList.toggle('dark-mode');

        // Mengatur tampilan ikon berdasarkan mode yang aktif
        const moonIcon = document.querySelector('.fa-moon');
        const sunIcon = document.querySelector('.fa-sun');
        const canvas = document.querySelector('.df-3dcanvas');
        if (document.body.classList.contains('dark-mode')) {
            moonIcon.style.display = 'none';
            sunIcon.style.display = 'inline';
            canvas.style.backgroundColor = "#000000db";
        } else {
            moonIcon.style.display = 'inline';
            sunIcon.style.display = 'none';
            canvas.style.backgroundColor = "#FFFFFFDB";
        }
    }
</script>
@endsection

