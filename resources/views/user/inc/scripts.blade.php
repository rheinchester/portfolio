{{-- <!--   Core JS Files   --> --}}
<script src="{{asset('user/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('user/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('user/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('user/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
{{-- <!--  Google Maps Plugin    --> --}}
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
{{-- <!-- Chart JS --> --}}
<script src="{{asset('user/assets/js/plugins/chartjs.min.js')}}"></script>
{{-- <!--  Notifications Plugin    --> --}}
<script src="{{asset('user/assets/js/plugins/bootstrap-notify.js')}}"></script>
{{-- <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc --> --}}
<script src="{{asset('user/assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript')}}"></script>
{{-- <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('user/assets/demo/demo.js')}}"></script> --}}
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>