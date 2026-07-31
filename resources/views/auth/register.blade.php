<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Signup | Doccure</title>

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
                <div class="col-lg-5 col-md-6">
                    <div class="account-content">
                        <div class="account-info">

                            <div class="login-title">
                                <h3>Patient Signup</h3>
                                <p class="mb-0">Enter your credentials &amp; create your account</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
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
                                    <label class="form-label">Password</label>
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

                                <div class="mb-3 form-check-box terms-check-box">
                                    <div class="form-group-flex">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms">
                                                I have read and agree to Doccure's
                                                <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient btn-xl w-100" type="submit">
                                        Register Now
                                    </button>
                                </div>

                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>

                                <div class="account-signup">
                                    <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                </div>

                                <div class="account-signup">
                                    <p>Are you a doctor? <a href="{{ route('doctor.register') }}">Register as Doctor</a></p>
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