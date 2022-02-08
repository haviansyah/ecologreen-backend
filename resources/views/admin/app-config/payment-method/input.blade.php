<div class="row mb-4 no-gutters images-row" id="images-row{{ isset($edit) ? '_edit' : '' }}">
  

</div>

@section('js')
    @parent()
    <script>
        const imagesRow{{ isset($edit) ? '_edit' : '' }} = $("#images-row{{ isset($edit) ? '_edit' : '' }}");

        function buildLabel{{ isset($edit) ? '_edit' : '' }}(){
            return `
            <div class="col-12">
                <label>Icon</label>
            </div>`;
        }

        function buildInputFile{{ isset($edit) ? '_edit' : '' }}() {
            return `<label for="file{{ isset($edit) ? '_edit' : '' }}" class="new-button">
                    <img class="img-fluid" src="{{ asset('images/add-new-photo-button.svg') }}" alt="">
                    <input accept="image/*" type="file" name="file" id="file{{ isset($edit) ? '_edit' : '' }}">
                </label>`;
        }

        function buildImage{{ isset($edit) ? '_edit' : '' }}(index, imageUrl) {
            return ` <div class="photo">
                    <button type="button" data-id="${index}" class="del-photo-button"><i class="fas fa-times"></i></button>
                    <img class="img-fluid" src="${imageUrl}">
                    <input type="hidden" name="photo" value="${imageUrl}">
                </div>`;
        }

        function buildDeleteInput{{ isset($edit) ? '_edit' : '' }}(imageUrl) {
            var element = `<input type="hidden" class="deletePhotoInput" name="deletes[]" value="${imageUrl}">`;
            imagesRow{{ isset($edit) ? '_edit' : '' }}.append(element);
        }

        function renderImageList{{ isset($edit) ? '_edit' : '' }}(rowElement) {
            var imageElements = buildLabel();

            if (window.photoCache.length == 0) {
                imageElements += buildInputFile{{ isset($edit) ? '_edit' : '' }}();
            } else {
                window.photoCache.forEach((element, index) => {
                    imageElements += buildImage{{ isset($edit) ? '_edit' : '' }}(index, element);
                });
            }

            rowElement.html('');
            rowElement.html(imageElements);
        }

        function addPhoto{{ isset($edit) ? '_edit' : '' }}(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    window.photoCache.push(e.target.result);
                    renderImageList{{ isset($edit) ? '_edit' : '' }}(imagesRow{{ isset($edit) ? '_edit' : '' }});
                }
                reader.readAsDataURL(input.files[0]);

            }
        }

        function removePhoto{{ isset($edit) ? '_edit' : '' }}(index) {
            if (index > -1) {
                console.log(index);
                console.log(window.photoCache);
                var newArr = window.photoCache.filter((el, idx) => idx !== index);
                window.photoCache = newArr;
                renderImageList{{ isset($edit) ? '_edit' : '' }}(imagesRow{{ isset($edit) ? '_edit' : '' }});
            }
        }

        $(function() {
            window.photoCache = [];
            renderImageList{{ isset($edit) ? '_edit' : '' }}(imagesRow{{ isset($edit) ? '_edit' : '' }});
            imagesRow{{ isset($edit) ? '_edit' : '' }}.on('change', '.new-button>input[type=file]',function(e) {
                addPhoto{{ isset($edit) ? '_edit' : '' }}(this);
            })

            $(document).on('click', '#images-row{{ isset($edit) ? '_edit' : '' }} .del-photo-button', function(e) {
                removePhoto{{ isset($edit) ? '_edit' : '' }}($(this).data('id'));
            })
        });
    </script>
@endsection

<x-adminlte-input enable-old-support required name="name" label="Payment Method Name"
    placeholder="Payment Method Name" />

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
