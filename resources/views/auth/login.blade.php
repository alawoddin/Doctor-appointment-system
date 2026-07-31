<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Doccure</title>

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
                                <h3>Sign in</h3>
                                <p>Access your Doccure account.</p>
                                <span>New doctor? <a href="{{ route('doctor.register') }}">Register as Doctor</a></span>
                            </div>

                            {{-- Session errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Session status (e.g. password reset link sent) --}}
                            @if (session('status'))
                                <div class="alert alert-success">{{ session('status') }}</div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input type="email"
                                           name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           required autofocus autocomplete="username">
                                </div>

                                <div class="mb-3">
                                    <div class="form-group-flex">
                                        <label class="form-label">Password</label>
                                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                                    </div>
                                    <div class="pass-group">
                                        <input type="password"
                                               name="password"
                                               class="form-control pass-input @error('password') is-invalid @enderror"
                                               required autocomplete="current-password">
                                        <span class="feather-eye-off toggle-password"></span>
                                    </div>
                                </div>

                                <div class="mb-3 form-check-box">
                                    <div class="form-group-flex">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient w-100" type="submit">Sign in</button>
                                </div>

                                <div class="account-signup">
                                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
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