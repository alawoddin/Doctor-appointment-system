@extends('admin.admin_master')
@section('admin')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



<div class="content container-fluid">

<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Edit Speciality</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.specialities.all') }}">Specialities</a></li>
                <li class="breadcrumb-item active">Edit Speciality</li>
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
                <form action="{{ route('admin.specialities.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $speciality->id }}">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="mb-2">Speciality Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{  $speciality->name }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="mb-2">Image</label>
                                  <input type="file" class="form-control" name="image" id="image">  
                                 
                            </div>
                        </div>

                          <div class="col-12 col-md-6 ">
                            <div class="mb-3 form-group" >
                                <label for="validationDefault02" class="form-label"> </label>
                                    <img id="showImage" src="{{ asset($speciality->image) }}"
                                        class="rounded-circle avatar-xl img-thumbnail float-start" alt="image profile">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update Speciality</button>
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


@endsection
