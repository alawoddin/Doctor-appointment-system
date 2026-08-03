@extends('admin.admin_master')
@section('admin')
@php
    $profilePhoto = $admin->profile_photo
        ? asset($admin->profile_photo)
        : asset('admin/assets/img/profiles/avatar-01.jpg');

    $location = collect([$admin->city, $admin->country])->filter()->implode(', ');
@endphp
<div class="content container-fluid">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Profile</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- /Page Header -->

<div class="row">
    <div class="col-md-12">
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-auto profile-image">
                    <a href="#">
                        <img class="rounded-circle" alt="User Image" src="{{ $profilePhoto }}">
                    </a>
                </div>
                <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0">{{ $admin->full_name }}</h4>
                    <h6 class="text-muted">{{ $admin->email }}</h6>
                    @if ($location)
                        <div class="user-Location"><i class="fa-solid fa-location-dot"></i> {{ $location }}</div>
                    @endif
                    @if ($admin->about)
                        <div class="about-text">{{ $admin->about }}</div>
                    @endif
                </div>
                <div class="col-auto profile-btn">
                    <a href="#edit_personal_details" class="btn btn-primary" data-bs-toggle="modal">
                        Edit
                    </a>
                </div>
            </div>
        </div>
        <div class="profile-menu">
            <ul class="nav nav-tabs nav-tabs-solid">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                </li>
            </ul>
        </div>
        <div class="tab-content profile-tab-cont">

            <!-- Personal Details Tab -->
            <div class="tab-pane fade show active" id="per_details_tab">

                <!-- Personal Details -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between">
                                    <span>Personal Details</span>
                                    <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Edit</a>
                                </h5>
                                <div class="row">
                                    <p class="col-sm-2 text-muted">Name</p>
                                    <p class="col-sm-10">{{ $admin->full_name }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted">Date of Birth</p>
                                    <p class="col-sm-10">{{ $admin->date_of_birth?->format('d M Y') ?? 'N/A' }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted">Email ID</p>
                                    <p class="col-sm-10">{{ $admin->email }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted">Mobile</p>
                                    <p class="col-sm-10">{{ $admin->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted">Address</p>
                                    <p class="col-sm-10 mb-0">
                                        @if ($admin->address)
                                            {{ $admin->address }}<br>
                                        @endif
                                        @if ($admin->city)
                                            {{ $admin->city }}<br>
                                        @endif
                                        @if ($admin->state || $admin->zip_code)
                                            {{ trim($admin->state.' - '.$admin->zip_code, ' -') }}<br>
                                        @endif
                                        @if ($admin->country)
                                            {{ $admin->country }}.
                                        @endif
                                        @if (! $admin->address && ! $admin->city && ! $admin->state && ! $admin->zip_code && ! $admin->country)
                                            N/A
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Details Modal -->
                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Personal Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">First Name</label>
                                                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $admin->first_name) }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Last Name</label>
                                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $admin->last_name) }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Date of Birth</label>
                                                        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $admin->date_of_birth?->format('Y-m-d')) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Email ID</label>
                                                        <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Mobile</label>
                                                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $admin->phone) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">About</label>
                                                        <textarea name="about" class="form-control" rows="3">{{ old('about', $admin->about) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Profile Photo</label>
                                                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="form-title"><span>Address</span></h5>
                                                </div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Address</label>
                                                        <input type="text" name="address" class="form-control" value="{{ old('address', $admin->address) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">City</label>
                                                        <input type="text" name="city" class="form-control" value="{{ old('city', $admin->city) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">State</label>
                                                        <input type="text" name="state" class="form-control" value="{{ old('state', $admin->state) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Zip Code</label>
                                                        <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code', $admin->zip_code) }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="mb-2">Country</label>
                                                        <input type="text" name="country" class="form-control" value="{{ old('country', $admin->country) }}">
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

                    </div>
                </div>
                <!-- /Personal Details -->

            </div>
            <!-- /Personal Details Tab -->

            <!-- Change Password Tab -->
            <div id="password_tab" class="tab-pane fade">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <form action="{{ route('admin.profile.password') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="mb-2">Old Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">New Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Change Password Tab -->

        </div>
    </div>
</div>

</div>
@endsection
