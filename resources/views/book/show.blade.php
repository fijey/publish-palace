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
  });
</script>
@endsection

