@extends('layouts.crud.index')
@section('title', 'Bank Account')
@section('route', 'bank-account')
@section('input-form', 'admin.app-config.bank-account.input')

@section('css')
    @parent()
    <style>
        .images-row img {
            width: 150px;
            height: 112.5px;
            padding: .2rem;
            object-fit: cover;
            border-radius: 0.5rem !important;
        }

        .images-row .photo {
            position: relative;
        }

        .images-row .photo>.del-photo-button {
            position: absolute;
            border: none;
            font-size: 10px;
            width: 24px;
            height: 24px;
            border-radius: 15px;
            background-color: var(--danger);
            color: white;
            top: 0px;
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
        document.addEventListener('eco.crud.ajax', function(e) {
            var model_data = e.detail;
            window.photoCache = [];
            console.log(model_data);
            if (model_data.image != null) {
                window.photoCache.push(model_data.image.file_address);
            }
            renderImageList_edit(imagesRow_edit);
        });
    </script>
@endsection
