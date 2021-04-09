@include('frontent.partial.head')

<div class="main-content">
    {{-- <div class="container">
        @include('backend.partial.messages')
    </div> --}}

    @yield('main')
</div>
@include('frontent.partial.footer')
