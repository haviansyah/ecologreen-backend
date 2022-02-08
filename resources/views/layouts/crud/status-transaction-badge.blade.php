@switch($payment_status_id)
    @case(1)
        <span class="badge badge-pill badge-info">WAITING</span>
        @break
    @case(2)
        <span class="badge badge-pill badge-warning">PENDING</span>
        @break
    @case(3)
        <span class="badge badge-pill badge-danger">CANCELED</span>
    @break
    @case(4)
        <span class="badge badge-pill badge-success">CONFIRMED</span>
    @break
    @default
@endswitch

