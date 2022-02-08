@extends('adminlte::page')

@section('title', 'Dashboard')

@section('layout_topnav', true)

@section('content')
    <div class="p-lg-5 p-2">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <img src="{{ asset('images/undraw_nature_on_screen_xkli.svg') }}" style="height: 150px" alt="">
                    <div class="px-4">
                        <h4 class="text-bold">Good Morning {{ auth()->user()->name }}</h4>
                        <p>Welcome to <strong>EcoLoGreen Backend! </strong>
                            This is your home page, where you can quickly see your upcoming tasks and access your most
                            important
                            projects.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row px-2" id="home-page">
            <div class="col-12 mb-3">
                <strong class="h5">Apps</strong>
            </div>
            <div class="row">
                <a class="btn btn-app" href="{{ route('transaction.index') }}">
                    <i class="fas fa-tree"></i> Tanam Pohon
                </a>
            </div>

            <div class="col-12 mt-4 mb-3">
                <strong class="h5">Management</strong>
            </div>
            <div class="row">
                <a class="btn btn-app" href="{{ route('bank-account.index') }}">
                    <i class="fas fa-university"></i> Bank Account
                </a>
                <a class="btn btn-app" href="{{ route('payment-method.index') }}">
                    <i class="fas fa-credit-card"></i> Payment Method
                </a>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
