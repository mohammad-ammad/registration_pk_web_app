<!-- jQuery -->
<script src="{{asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/assets/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('/assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
  @if(session('error'))
        toastr.error($('#error-message').val());
  @endif

  @if(session('success'))
        toastr.success($('#success-message').val());
  @endif
</script>
@yield('scripts')

</body>
</html>