@include('customerlayouts.elements.lib_header.lib_header')
<body class="template-color-1">

<div class="main-wrapper">

    @include('customerlayouts.elements.popup.popup')

    @include('customerlayouts.elements.header.tmp_header')

    <div class="slider-with-category_menu">
        <div class="container-fluid">
            <div class="row">
                @include('customerlayouts.elements.vertical_menu.tmp_vertical_menu')

                @include('customerlayouts.elements.slider.tmp_slider')
                @include('customerlayouts.elements.sidebar.tmp_sidebar')
            </div>
        </div>
    </div>
@include("customerlayouts.elements.tmp_main_content.tmp_main_content")
    @include("customerlayouts.elements.shipping_area.shipping_area")
    @include("customerlayouts.elements.footer.tmp_footer")
    @include("customerlayouts.elements.tmp_product.tmp_quickview.tmp_quickview")

</div>
</body>
<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{asset('/customerlayouts_assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Modernizer JS -->
<script src="{{asset('/customerlayouts_assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('/customerlayouts_assets/js/vendor/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('/customerlayouts_assets/js/vendor/bootstrap.min.js')}}"></script>

<!-- Slick Slider JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/slick.min.js')}}"></script>
<!-- Countdown JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/countdown.js')}}"></script>
<!-- Barrating JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.barrating.min.js')}}"></script>
<!-- Counterup JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.counterup.js')}}"></script>
<!-- Nice Select JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.nice-select.js')}}"></script>
<!-- Sticky Sidebar JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.sticky-sidebar.js')}}"></script>
<!-- Jquery-ui JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.ui.touch-punch.min.js')}}"></script>
<!-- Lightgallery JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/lightgallery.min.js')}}"></script>
<!-- Scroll Top JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/scroll-top.js')}}"></script>
<!-- Theia Sticky Sidebar JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/theia-sticky-sidebar.min.js')}}"></script>
<!-- Waypoints JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/waypoints.min.js')}}"></script>
<!-- Instafeed JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/instafeed.min.js')}}"></script>
<!-- ElevateZoom JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script>
<!-- Timecircles JS -->
<script src="{{asset('/customerlayouts_assets/js/plugins/timecircles.js')}}"></script>

<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="{{asset('/customerlayouts_assets/js/vendor/vendor.min.js')}}"></script>
<script src="{{asset('/customerlayouts_assets/js/plugins/plugins.min.js')}}"></script>
-->

<!-- Main JS -->
<script src="{{asset('/customerlayouts_assets/js/main.js')}}"></script>
</html>

