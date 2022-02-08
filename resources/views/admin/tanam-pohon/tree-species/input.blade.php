<x-adminlte-input enable-old-support required name="local_name" label="Local Name" placeholder="Insert Local Name" />
<x-adminlte-input enable-old-support required name="scientific_name" label="Scientific Name"
    placeholder="Insert Scientific Name" />
<x-adminlte-input enable-old-support step="0.1" required name="sequestration" label="CO2e Sequestration (kg)"
    type="number" placeholder='Insert Sequestration (kg)' />
<x-adminlte-input enable-old-support step="0.1" required name="max_height" label="Max Height (m)" type="number"
    placeholder='Insert Max Height (kg)' />
<x-adminlte-input enable-old-support step="0.1" required name="max_crown_width" label="Max Width (m)" type="number"
    placeholder='Insert Max Width (kg)' />
{{-- Minimal --}}
@php
$config = [
    'placeholder' => 'Select Canopy Shape',
];
@endphp
<x-adminlte-select2 required name="canopy_shape_id" id="canopy_shape_id{{isset($edit) ? '_edit' : ''}}" :config="$config" label='Canopy Shape'>
    <option></option>
    @foreach (\App\Models\CanopyShape::all() as $cp)
        <option value="{{ $cp->id }}">{{ $cp->name }}</option>
    @endforeach
</x-adminlte-select2>

<x-adminlte-textarea name="about" label="Story About Tree Species" placeholder="Insert story about tree species" />
