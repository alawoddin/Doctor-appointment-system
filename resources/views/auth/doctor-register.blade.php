<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Register | Doccure</title>

    <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/iconsax.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">
</head>
<body class="login-body">

<div class="main-wrapper">
    <div class="login-content-info">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="account-content">
                        <div class="account-info">

                            <div class="login-title">
                                <h3>Doctor Register</h3>
                                <p>Create your doctor account.</p>
                                <span>Already have an account? <a href="{{ route('login') }}">Sign In</a></span>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('doctor.register.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text"
                                           name="first_name"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}"
                                           required autofocus>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text"
                                           name="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ old('last_name') }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           required autocomplete="username">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text"
                                           name="phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Create Password</label>
                                    <div class="pass-group">
                                        <input type="password"
                                               name="password"
                                               class="form-control pass-input @error('password') is-invalid @enderror"
                                               required autocomplete="new-password">
                                        <span class="feather-eye-off toggle-password"></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password"
                                               name="password_confirmation"
                                               class="form-control pass-input"
                                               required autocomplete="new-password">
                                        <span class="feather-eye-off toggle-password"></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient w-100" type="submit">Sign Up</button>
                                </div>

                                <div class="account-signup">
                                    <p>Already have account? <a href="{{ route('login') }}">Sign In</a></p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
</div>

<script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/feather.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/script.js') }}"></script>
</body>
</html>