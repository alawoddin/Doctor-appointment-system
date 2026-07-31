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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($specialities as $speciality)
                                <tr>
                                    <td>#SP{{ str_pad((string) $speciality->id, 3, '0', STR_PAD_LEFT) }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <span class="avatar avatar-sm me-2">
                                                <img class="avatar-img"
                                                    src="{{ $speciality->image ? asset('storage/'.$speciality->image) : asset('backend/assets/img/specialities/specialities-01.svg') }}"
                                                    alt="{{ $speciality->name }}">
                                            </span>
                                            <span>{{ $speciality->name }}</span>
                                        </h2>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a class="btn btn-sm bg-success-light"
                                                href="{{ route('admin.specialities.edit', $speciality) }}">
                                                <i class="fe fe-pencil"></i> Edit
                                            </a>
                                            <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                href="#delete_speciality_{{ $speciality->id }}">
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

@foreach ($specialities as $speciality)
    <!-- Delete Modal -->
    <div class="modal fade" id="delete_speciality_{{ $speciality->id }}" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure you want to delete <strong>{{ $speciality->name }}</strong>?</p>
                        <form action="{{ route('admin.specialities.destroy', $speciality) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->
@endforeach

@endsection
