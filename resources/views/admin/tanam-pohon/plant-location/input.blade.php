<x-adminlte-input enable-old-support required name="name" label="Plant Location Name" placeholder="Insert Plant Location Name" />

@php
$config = [
    'placeholder' => 'Select Plant Location Type',
];
@endphp
<x-adminlte-select2 required name="plant_location_type_id" :config="$config" label='Plant Location Type'>
    <option></option>
    @foreach (\App\Models\PlantLocationType::all() as $cp)
        <option value="{{ $cp->id }}">{{ $cp->name }}</option>
    @endforeach
</x-adminlte-select2>

<x-adminlte-textarea name="address" label="Plant Location Address" placeholder="Insert Plant Location Address" />
