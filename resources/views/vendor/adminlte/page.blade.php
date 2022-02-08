@extends('adminlte::master')

@section('plugins.Sweetalert2', true)
@section('plugins.BlockUI', true)

@section('plugins.tempusdominusBootstrap4', true)
@section('plugins.inputmask', true)
{{-- @section('plugins.bsCustomFileInput', true) --}}
@section('plugins.toastr', true)

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop


@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('usermenu_body')
    <li>
        <a class="dropdown-item" href="http://localhost">
            <i class="fas fa-fw fa-home "></i>
            Home
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="http://localhost/admin/pages">
            <i class="fas fa-fw fa-lock "></i>
            Change Password
        </a>
    </li>
 

@endsection


@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if (!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    @if (session('message'))
        <script>
            $(document).ready(function() {
                $(document).Toasts('create', {
                    class: 'bg-info',
                    title: 'Success',
                    delay: 750,
                    body: '{{ session('message') }}'
                })
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            $(document).ready(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    delay: 750,
                    body: '{{ session('error') }}'
                })
            });
        </script>
    @endif

@stop
