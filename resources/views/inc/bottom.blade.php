    </div>
    <!-- ck-editors plugin -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'article-ckeditor' ); </script>     
    <!-- Google Maps Plugin   -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Main Script   -->
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script>
      $(document).ready(function() {
        nowuiKit.initSliders();
      });
      function scrollToDownload() {
        if ($('.section-download').length != 0) {
          $ ("html, body").animate({
            scrollTop: $('.section-download').offset().top
          }, 1000);
        }
      }
    </script>
  </body>
</html>