<div class="row mb-4 no-gutters tree-images-row" id="tree-images-row{{ isset($edit) ? '_edit' : '' }}">
    <div class="col-12">
        <label>Photos</label>
    </div>
    <label for="file{{ isset($edit) ? '_edit' : '' }}" class="new-button">
        <img class="img-fluid" src="{{ asset('images/add-new-photo-button.svg') }}" alt="">
        <input accept="image/*" type="file" name="file" id="file{{ isset($edit) ? '_edit' : '' }}">
    </label>
   
</div>

@section('js')
    @parent()
    <script>
        const treeImagesRow{{ isset($edit) ? '_edit' : '' }} = $("#tree-images-row{{ isset($edit) ? '_edit' : '' }}");

        function buildImage{{ isset($edit) ? '_edit' : '' }}(index, imageUrl) {
            return ` <div class="photo">
                    <button type="button" data-id="${index}" class="del-photo-button"><i class="fas fa-times"></i></button>
                    <img class="img-fluid" src="${imageUrl}">
                    <input type="hidden" name="photos[]" value="${imageUrl}">
                </div>`;
        }

        function buildDeleteInput{{ isset($edit) ? '_edit' : '' }}(imageUrl){
            var element = `<input type="hidden" class="deletePhotosInput" name="deletes[]" value="${imageUrl}">`;
            treeImagesRow{{ isset($edit) ? '_edit' : '' }}.append(element);
        }

        function renderImageList{{ isset($edit) ? '_edit' : '' }}(rowElement) {
            var imageElements = '';
            window.photosCache.forEach((element, index) => {
                imageElements += buildImage{{ isset($edit) ? '_edit' : '' }}(index, element);
            });
            console.log(rowElement);
            rowElement.find('.photo').remove();
            rowElement.find('.col-12').after(imageElements);
        }

        function addPhoto{{ isset($edit) ? '_edit' : '' }}(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    window.photosCache.push(e.target.result);
                    renderImageList{{ isset($edit) ? '_edit' : '' }}(treeImagesRow{{ isset($edit) ? '_edit' : '' }});
                }
                reader.readAsDataURL(input.files[0]);

            }
        }

        function removePhoto{{ isset($edit) ? '_edit' : '' }}(index) {
            if (index > -1) {
                console.log(index);
                console.log(window.photosCache);
                @isset($edit)
                    buildDeleteInput{{ isset($edit) ? '_edit' : '' }}(window.photosCache[index]);
                @endisset
                var newArr = window.photosCache.filter((el,idx) => idx !== index); 
                window.photosCache = newArr;
                renderImageList{{ isset($edit) ? '_edit' : '' }}(treeImagesRow{{ isset($edit) ? '_edit' : '' }});
            }
        }

        $(function() {
            window.photosCache = [];
            treeImagesRow{{ isset($edit) ? '_edit' : '' }}.find('.new-button>input[type=file]').off('change').on('change', function(e) {
                addPhoto{{ isset($edit) ? '_edit' : '' }}(this);
            })

            $(document).on('click','#tree-images-row{{ isset($edit) ? '_edit' : '' }} .del-photo-button', function(e){
                removePhoto{{ isset($edit) ? '_edit' : '' }}($(this).data('id'));
            })
        });
    </script>
@endsection

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


<x-adminlte-input data-rupiah enable-old-support required name="price" label="Price" placeholder="Insert Price" />


@include('components.form-group',[
"name" => "status",
"title" => "Status",
"type" => "radio",
"options" => [
(object) [ "id" => "PUBLISH" , "name" => "PUBLISH"],
(object) [ "id" => "DRAFT" , "name" => "DRAFT"],
],
"select_id" => "id",
"select_name" => "name",
'required' => true,
])
