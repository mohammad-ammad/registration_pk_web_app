@include('client.partials.header')

    <div class="fixed z-50 w-full">
        @include('client.partials.topNavigation')

        @include('client.partials.navbar')
    </div>

    <div>
        @yield('content')
    </div>

@include('client.partials.footer')
@include('client.partials.Scripts')
