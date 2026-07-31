@extends('admin.admin_master')
@section('admin')
<div class="content container-fluid">
				
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col-sm-7 col-auto">
            <h3 class="page-title">Specialities</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Specialities</li>
            </ul>
        </div>
        <div class="col-sm-5 col">
            <a href="#Add_Specialities_details" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
        </div>
    </div>
</div>
<!-- /Page Header -->
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
                            <tr>
                                <td>#SP001</td>
                                
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="assets/img/specialities/specialities-01.png" alt="Speciality">
                                        </a>
                                        <a href="profile.html">Urology</a>
                                    </h2>
                                </td>
                            
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#SP002</td>
                                
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="assets/img/specialities/specialities-02.png" alt="Speciality">
                                        </a>
                                        <a href="profile.html">Neurology</a>
                                    </h2>
                                </td>
                            
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>	
                            <tr>
                                <td>#SP003</td>
                                
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="assets/img/specialities/specialities-03.png" alt="Speciality">
                                        </a>
                                        <a href="profile.html">Orthopedic</a>
                                    </h2>
                                </td>
                            
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#SP004</td>
                                
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="assets/img/specialities/specialities-04.png" alt="Speciality">
                                        </a>
                                        <a href="profile.html">Cardiologist</a>
                                    </h2>
                                </td>
                            
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>#SP005</td>
                                
                                <td>
                                    <h2 class="table-avatar">
                                        <a href="profile.html" class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="assets/img/specialities/specialities-05.png" alt="Speciality">
                                        </a>
                                        <a href="profile.html">Dentist</a>
                                    </h2>
                                </td>
                            
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                            <i class="fe fe-pencil"></i> Edit
                                        </a>
                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                            <i class="fe fe-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>			
</div>
</div>	





<!-- Add Modal -->
<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Specialities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="mb-2">Specialities</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="mb-2">Image</label>
                                <input type="file"  class="form-control">
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_specialities_details" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Specialities</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="mb-2">Specialities</label>
                                <input type="text" class="form-control" value="Cardiology">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="mb-3">
                                <label class="mb-2">Image</label>
                                <input type="file"  class="form-control">
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-content p-2">
                    <h4 class="modal-title">Delete</h4>
                    <p class="mb-4">Are you sure want to delete?</p>
                    <button type="button" class="btn btn-primary">Save </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->


@endsection