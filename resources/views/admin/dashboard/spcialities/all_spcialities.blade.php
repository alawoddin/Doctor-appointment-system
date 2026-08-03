@extends('admin.admin_master')
@section('admin')
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Specialities</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Specialities</li>
            </ul>
        </div>
        <div class="col-sm-5 col">
            <a href="{{ route('admin.specialities.create') }}" class="btn btn-primary float-end mt-2">Add</a>
        </div>
    </div>
</div>
<!-- /Page Header -->

@include('admin.partials.alerts')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Specialities</th>
                                <th>image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($specialities as $speciality)
                                <tr>
                                    <td>#SP{{ str_pad((string) $speciality->id, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td>{{ $speciality->name }}</td>
                                    <td>
                                        <img src="{{ asset($speciality->image) }}" alt="{{ $speciality->name }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{ route('admin.specialities.edit', $speciality) }}">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a class="btn btn-sm bg-danger-light" 
                                                href="{{ route('admin.specialities.delete' , $speciality->id) }}">
                                                <i class="fe fe-trash"></i> Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No specialities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@endsection
