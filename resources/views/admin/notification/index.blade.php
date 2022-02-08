@extends('adminlte::page')

@section('layout_topnav', true)


@section('plugins.Datatables', true)


@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Notifikasi Masuk</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@stop

@section('content')
    @if ($data->count() == 0)
        <div class="row">
            <div class="col-12">
                <div class="card p-5">
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ asset('images/undraw_new_notifications_re_xpcv.svg') }}" style="width: 300px">
                        <h3 class="text-muted mt-3"> Tidak Ada Notifikasi</h3>

                        <p>
                            Sedang tidak ada notifikasi saat ini,
                        </p>
                        <a href="/" class="btn btn-success">Kembali ke Dashboard</a>

                    </div>
                </div>
            </div>

        </div>



        <!-- /.error-page -->
    @else
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Messages</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $tnc)
                            <tr>
                                <td>{{ $i++ }}.</td>
                                <td>
                                    <a class="btn btn-text text-success"
                                        href="{{ route('notifications.read', ['id' => $tnc->id, 'next' => $tnc->data['url'] ?? '/']) }}">
                                        {{ $tnc->data['messages'] }}
                                    </a>
                                </td>
                                <td>{{ $tnc->created_at->format('d M Y H:i:s') }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    @endif
@endsection

@section('js')
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
@stop
