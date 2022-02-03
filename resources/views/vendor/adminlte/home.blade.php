@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')


@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop


@section('classes_body'){{ 'layout-top-nav' }}@stop


@section('body')
    <div class="wrapper">
        @include('adminlte::partials.navbar.navbar-layout-topnav')

        <div class="content-wrapper">
            {{-- Main Content --}}
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
