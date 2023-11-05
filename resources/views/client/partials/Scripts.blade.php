<script src="{{asset('/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/assets/plugins/toastr/toastr.min.js')}}"></script>

<script>
    @if(session('error'))
        toastr.error($('#error-message').val());
    @endif

    @if(session('success'))
            toastr.success($('#success-message').val());
    @endif
    
    const dropdownButton = document.querySelector(".service_dropdown");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const icon = document.querySelector(".fa-solid.fa-chevron-down");

    let isMenuOpen = false;

    dropdownButton.addEventListener("click", () => {
        if (!isMenuOpen) {
            dropdownMenu.classList.remove("hidden");
            dropdownMenu.classList.add("scale-y-100");
            icon.classList.add("rotate-180");
        } else {
            dropdownMenu.classList.remove("scale-y-100");
            dropdownMenu.classList.add("hidden");
            icon.classList.remove("rotate-180");
        }
        isMenuOpen = !isMenuOpen;
    });
</script>
@yield('scripts')

</body>
</html>