@extends('adminlte::page')

@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>@section('title') @parent @show</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-sm-right">
                    <button class="btn btn-success shadow" data-toggle="modal" data-target="#modalCreate"><i
                            class="fas fa-plus mr-2"></i> Create</button>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        {{ $dataTable->table() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button> --}}

    <!-- Modal -->
    <x-adminlte-modal id="modalCreate" isForm="true" title="Create New {{ View::getSection('title') }}" theme="success"
        icon="fas fa-plus">
        @csrf
        @include(View::getSection('input-form'))
        <x-slot name="formSlot">
            <form action="{{ route(View::getSection('route') . '.store') }}" method="POST">
        </x-slot>
        <x-slot name="footerSlot">
            <x-adminlte-button theme="success" type="submit" label="Save" />
            <x-adminlte-button theme="default" label="Dismiss" data-dismiss="modal" />

        </x-slot>

    </x-adminlte-modal>

    <x-adminlte-modal id="modalEdit" isForm="true" title="Edit {{ View::getSection('title') }}" theme="success"
        icon="fas fa-plus">
        <x-slot name="formSlot">
            <form method="POST">
                @method('PUT')
                @csrf
        </x-slot>
        @include(View::getSection('input-form'))
        <x-slot name="footerSlot">
            <x-adminlte-button theme="success" type="submit" label="Save" />
            <x-adminlte-button theme="default" label="Dismiss" data-dismiss="modal" />

        </x-slot>

    </x-adminlte-modal>

@stop

@section('css')

@stop

@section('js')
    {{ $dataTable->scripts() }}
    <script>
        $(function() {
            var editButton = $(".crud-edit-button");
            const modalEdit = $("#modalEdit");
            const modalEditForm = modalEdit.find('form');
            $(document).on('click', '.crud-edit-button', function() {
                var id = $(this).data('id');
                var editUrl = '{{ route(View::getSection('route') . '.index') }}/' + id + '/edit';
                var putUrl = '{{ route(View::getSection('route') . '.index') }}/' + id ;
                modalEditForm.attr('action',putUrl)
                $.ajax({
                    url: editUrl,
                    headers: {
                        "Accept": "application/json; charset=utf-8",
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    success: function(response) {
                        model_data = response;
                        for (const [key, value] of Object.entries(model_data)) {
                            var input = modalEdit.find(`[name=${key}]`);
                            console.log(input);
                            
                            if (input != null) {
                                $(input).val(value);
                            }
                        }
                        modalEdit.modal('toggle');
                    }
                });
            });
        });
    </script>
@stop
