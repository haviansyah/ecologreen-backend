@extends('layouts.crud.index')
@section('title', 'Tree Inventory')
@section('route', 'tree-inventory')
@section('input-form', 'admin.tanam-pohon.tree-inventory.input')

@section('css')
    @parent()
    <style>
        .tree-images-row img {
            width: 150px;
            height: 112.5px;
            padding: .2rem;
            object-fit: cover;
            border-radius: 0.5rem!important;
        }

        .tree-images-row .photo {
            position: relative;
        }

        .tree-images-row .photo>.del-photo-button {
            position: absolute;
            border: none;
            font-size: 10px;
            width: 24px;
            height: 24px;
            border-radius: 15px;
            background-color: var(--danger);
            color: white;
            top:0px;
            right: 0px;
        }

        .new-button {
            border: none;
            background: none;
            cursor: pointer;
        }

        .new-button>input {
            display: none;
        }

    </style>
@endsection


@section('js')
    @parent
    <script>
        document.addEventListener('eco.crud.ajax', function (e) {
            treeImagesRow_edit.find('.deletePhotosInput').remove();
            var model_data = e.detail;
            window.photosCache = [];
            if(model_data.images.length > 0){
                model_data.images.forEach(element => {
                    window.photosCache.push(element.file_address);
                });
            }
            renderImageList_edit(treeImagesRow_edit);

         });
    </script>
@endsection

