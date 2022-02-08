@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.Select2', true)


@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order # {{ $data->code }}</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row d-none d-print-block">
                    <div class="col-12 mb-4">
                        <h4>
                            <img src="{{ asset('images/logo.svg') }}" height="60px" />
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To:
                        <address>
                            <strong>{{ $data->user->name }}</strong><br>
                            Phone: {{ $data->user->profile->phone_number }}<br>
                            Email: {{ $data->user->email }}
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col"></div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <br>
                        <b>Order #{{ $data->code }}</b><br>
                        <b>Payment Due:</b> {{ $data->due_date->format('d-m-Y H:i') }}<br>
                        @php
                            $color = 'danger';
                            switch ($data->paymentStatus->id) {
                                case 1:
                                    $color = 'info';
                                    break;
                                case 2:
                                    $color = 'warning';
                                    break;
                                case 3:
                                    $color = 'danger';
                                    break;
                                case 4:
                                    $color = 'success';
                                    break;
                            }
                        @endphp
                        <b>Payment Status:</b> <span class="badge badge-pill badge-{{ $color }}">
                            {{ strtoupper($data->paymentStatus->name) }}</span><br>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Tree Species</th>
                                    <th>Plant Location</th>
                                    <th>Qty</th>
                                    <th class="text-right">Unit Price</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->treeCatalog->treeSpecies->local_name }}
                                        ({{ $data->treeCatalog->treeSpecies->scientific_name }})</td>
                                    <td>{{ $data->treeCatalog->plantLocation->name }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td class="text-right">{{ 'Rp ' . number_format($data->unit_price, 0) }}</td>
                                    <td class="text-right">
                                        {{ 'Rp ' . number_format($data->unit_price * $data->quantity, 0) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td class="text-right">
                                            {{ 'Rp ' . number_format($data->unit_price * $data->quantity, 0) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Unique Code</th>
                                        <td class="text-right">{{ $data->unique_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td class="text-right">{{ 'Rp ' . number_format($data->total_price, 0) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <button onclick="print();" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                            Print</button>
                        <form class="d-inline" action="{{ Request::url() }}" method="POST">
                            @csrf
                            @method('PUT')

                            @if ($data->payment_status_id != 3)
                                <button name="action" value="DECLINE"
                                    warning="Are you sure want to decline this payment order?" type="submit"
                                    class="btn btn-danger float-right "><i class="fas fa-times mr-2"></i>
                                    Decline Payment
                                </button>
                            @endif

                            @if ($data->payment_status_id != 2)
                                <button name="action" value="PENDING"
                                    warning="Are you sure want to pending this payment order?" type="submit"
                                    class="btn btn-warning float-right mr-2"><i class="fas fa-hourglass mr-2"></i>
                                    Pending Transaction
                                </button>
                            @endif

                            @if ($data->payment_status_id != 4)
                                <button name="action" value="CONFIRM"
                                    warning="Are you sure want to confirm this payment order?" type="submit"
                                    class="btn btn-success float-right mr-2"><i class="far fa-credit-card mr-2"></i>
                                    Confirm Payment
                                </button>
                            @endif


                        </form>

                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->

        @if ($data->payment_status_id == 4)
            <div class="col-12 d-print-none">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tree Marking 
                            <span class="ml-2 badge badge-{{$data->is_full_marked ? 'success' : 'warning'}}">{{$data->trees->count()}} / {{$data->quantity}} Marked </span>
                        </h4>
                        @if(!$data->is_full_marked)
                        <div class="card-tools">
                            <button class="btn btn-success btn-sm shadow" data-toggle="modal" data-target="#modalAdd"><i
                                    class="fas fa-plus mr-2"></i>Add Trees</button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th width="60px" class="text-center">#</th>
                                    <th>Tree Id</th>
                                    <th>Planting Date</th>
                                    <th>Coordinate</th>
                                    <th class="text-center" width="120px">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($data->trees as $tree)
                                <tr>
                                    <td class="text-center">{{$i++}}</td>
                                    <td>{{$tree->tree_id}}</td>
                                    <td>{{ $tree->planting_date->format('d M Y') }}</td>
                                    <td>{{ $tree->lat }}, {{ $tree->lon }}</td>
                                    <td class="text-center">
                                        <form class="d-inline" action="{{ Request::url() }}/{{$tree->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" warning="Are you sure want to unmarked this tree" class="btn btn-danger btn-sm shadow">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        @endif
    </div>

    <x-adminlte-modal id="modalAdd" size="lg" isForm="true" title="Add New Tree">

        <x-slot name="formSlot">
            <form action="{{ Request::url() }}" method="POST">
                @csrf
        </x-slot>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th width="60px" class="text-center">#</th>
                    <th>Tree ID</th>
                    <th>Planting Date</th>
                    <th>Coordinate</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $tree)
                    <tr>
                        <td class="text-center">
                            <div class="icheck-success" title="check">
                                <input type="checkbox" name="trees[]" value="{{$tree->id}}" id="tree{{ $tree->tree_id }}">
                                <label for="tree{{ $tree->tree_id }}"></label>
                            </div>
                        </td>
                        <td>{{ $tree->tree_id }}</td>
                        <td>{{ $tree->planting_date->format('d M Y') }}</td>
                        <td>{{ $tree->lat }}, {{ $tree->lon }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="success" type="submit" label="Save" />
            <x-adminlte-button theme="default" label="Dismiss" data-dismiss="modal" />

        </x-slot>

    </x-adminlte-modal>
@stop

@section('css')

@stop

@section('js')
    <script>

    </script>
@stop
