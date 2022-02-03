
<button data-id="{{$id}}" class="btn btn-info btn-sm shadow crud-edit-button" @isset($custom_data) @foreach($custom_data as $key => $value) {{$key }} = "{{$value}}" @endforeach @endif  >
    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
</button>
<form class="d-inline" action="{{Request::url()}}/{{$id}}" method="POST">
    @csrf
    @method('DELETE')
 
    <button name="DELETE" class="btn btn-danger btn-sm action-delete shadow" name="action" warning="Are you sure want to delete this record?"  data-id="{{$id}}" href="javascript:void(0)">
        <i class="fa fa-trash-alt" aria-hidden="true"></i>
    </button>
</form>
