<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('dashboard/stylesheets/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/stylesheets/style.css') }}">

    <style>
        body {
            background: #f3f3f3;
            font-family: "Poppins", sans-serif;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px;
        }

        .auth-card {
            max-width: 950px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.08);
        }

        .auth-row {
            min-height: 560px;
        }

        /* LEFT SIDE – GIF */
        .auth-image {
            position: relative;
            background: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExb3l2Mjg2N2N1YWxwZmJkem9lZHM2aDZydzcwdTZmanU2bWphZWUzdiZlcD12MV9naWZzX3NlYXJjaCZjdD1n/vlYZYUxO3Pt92WEeGw/giphy.gif') center center / cover no-repeat;
        }

        .auth-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.15));
        }

        /* RIGHT SIDE – FORM */
        .auth-form {
            padding: 50px 45px;
        }

        .auth-heading {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 6px;
            letter-spacing: 0.4px;
        }

        .form-note {
            font-size: 14px;
            color: #777;
            margin-bottom: 30px;
        }

        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #444;
        }

        .form-control {
            height: 46px;
            font-size: 14px;
            border-radius: 6px;
        }

        .form-control:focus {
            border-color: #e91e63;
            box-shadow: none;
        }

        /* PREMIUM BUTTON */
        .btn-primary {
            background: linear-gradient(135deg, #e91e63, #c2185b);
            border: none;
            padding: 12px 34px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: #fff;
            transition: all 0.35s ease;
            box-shadow: 0 6px 18px rgba(233, 30, 99, 0.35);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #c2185b, #e91e63);
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(233, 30, 99, 0.45);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .auth-link {
            font-size: 13px;
            color: #555;
        }

        .auth-link:hover {
            color: #e91e63;
        }

        @media (max-width: 767px) {
            .auth-image {
                display: none;
            }

            .auth-form {
                padding: 35px 25px;
            }
        }

        /* Remember Me Checkbox */
        .remember-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-wrap .form-check-input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            border: 1.5px solid #bbb;
        }

        .remember-wrap .form-check-input:checked {
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .remember-wrap .form-check-label {
            font-size: 13px;
            color: #555;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="auth-card">
            <div class="row g-0 auth-row">

                <!-- LEFT -->
                <div class="col-md-6 auth-image d-none d-md-block"></div>

                <!-- RIGHT -->
                <div class="col-md-6">
                    <div class="auth-form">
                        <h3 class="auth-heading">Welcome Back</h3>
                        <p class="form-note">
                            Login to explore the latest fashion drops
                        </p>

                        <form method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check remember-wrap">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <a href="#" class="auth-link text-decoration-none">
                                    Forgot password?
                                </a>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="" class="auth-link text-decoration-none">
                                    Create an account
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Login →
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>