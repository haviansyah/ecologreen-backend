<x-adminlte-input enable-old-support required name="tree_id" label="Tree ID" readonly value="{{random_int(10000000, 99999999)}}" />

@php
$config = [
    'placeholder' => 'Select Species',
];
@endphp
<x-adminlte-select2 required name="tree_species_id" id="tree_species_id{{ isset($edit) ? '_edit' : '' }}"
    :config="$config" label='Tree Species'>
    <option></option>
    @foreach (\App\Models\TreeSpecies::all() as $cp)
        <option value="{{ $cp->id }}">{{ $cp->local_name }} ({{ $cp->scientific_name }})</option>
    @endforeach
</x-adminlte-select2>

@php
$config = [
    'placeholder' => 'Select Location',
];
@endphp
<x-adminlte-select2 required name="plant_location_id" id="plant_location{{ isset($edit) ? '_edit' : '' }}"
    :config="$config" label='Plant Location'>
    <option></option>
    @foreach (\App\Models\PlantLocation::all() as $cp)
        <option value="{{ $cp->id }}">{{ $cp->name }}</option>
    @endforeach
</x-adminlte-select2>

{{-- Placeholder, time only and prepend icon --}}
@php
$config = ['format' => 'YYYY-MM-DD'];
@endphp
<x-adminlte-input-date name="planting_date" id="planting_date{{ isset($edit) ? '_edit' : '' }}" :config="$config" placeholder="Select planting date">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-calendar"></i>
        </div>
    </x-slot>
</x-adminlte-input-date>

<x-adminlte-input enable-old-support type="number" step="0.0000001" required name="lat" label="Latitude" placeholder="Insert Latitude" />
<x-adminlte-input enable-old-support type="number" step="0.0000001" required name="lon" label="Longitude" placeholder="Insert Longitude" />
