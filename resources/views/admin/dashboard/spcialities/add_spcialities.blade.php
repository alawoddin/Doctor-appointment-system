@extends('admin.admin_master')
@section('admin')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<div class="content container-fluid">

<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Add Speciality</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.specialities.all') }}">Specialities</a></li>
                <li class="breadcrumb-item active">Add Speciality</li>
            </ul>
        </div>
        <div class="col-sm-5 col">
            <a href="{{ route('admin.specialities.all') }}" class="btn btn-secondary float-end mt-2">Back</a>
        </div>
    </div>
</div>

@include('admin.partials.alerts')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form id="myForm" action="{{ route('admin.specialities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="mb-3 form-group">
                                <label class="mb-2">Speciality Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <div class="mb-3 form-group" >
                                <label class="mb-2">Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>

                         <div class="col-12 col-md-6 ">
                            <div class="mb-3 form-group" >
                                <label for="validationDefault02" class="form-label"> </label>
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xl img-thumbnail float-start" alt="image profile">
                            </div>
                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Speciality</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

   <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                   

                },
                messages: {
                    name: {
                        required: 'Please Enter Speciality name',
                    },
                    image: {
                        required: 'Please Upload an image',
                    },
                 

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>


@endsection
