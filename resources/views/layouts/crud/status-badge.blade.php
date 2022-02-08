@switch($status)
    @case('PUBLISH')
        <span class="badge badge-pill badge-success">Publish</span>
        @break
    @case('DRAFT')
        <span class="badge badge-pill badge-warning">Draft</span>
        @break
    @case('HOLD')
        <span class="badge badge-pill badge-danger">Tolak</span>
    @break
    @case('REQ')
        <span class="badge badge-pill badge-success">Baru</span>
    @break
    @default
@endswitch