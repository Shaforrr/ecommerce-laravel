<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Merch Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>

        body{
            background:#f4f6f9;
        }

        .login-card{
            border:none;
            border-radius:15px;
            overflow:hidden;
        }

        .left-side{
            background:linear-gradient(135deg,#0d6efd,#6610f2);
            color:white;
            padding:60px 40px;
            height:100%;
        }

        .left-side h2{
            font-weight:bold;
        }

        .left-side p{
            margin-top:20px;
            margin-bottom:30px;
        }

        .right-side{
            padding:50px;
        }

        .btn-login{
            height:48px;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-lg-10">

            <div class="card shadow-lg login-card">

                <div class="row g-0">

                    <div class="col-md-5">

                        <div class="left-side">

                            <h2>Merch Store</h2>

                            <h5 class="mt-4">
                                Belum punya akun?
                            </h5>

                            <p>
                                Daftarkan akun sekarang dan nikmati pengalaman
                                berbelanja dengan mudah.
                            </p>

                            <a href="{{ route('register') }}"
                               class="btn btn-light btn-lg">

                                <i class="fas fa-user-plus"></i>

                                Create Account

                            </a>

                        </div>

                    </div>

                    <div class="col-md-7">

                        <div class="right-side">

                            <h2 class="text-center mb-4">

                                <i class="fas fa-user-circle text-primary"></i>

                                Login

                            </h2>

                            @include('sweetalert::alert')

                            <form action="{{ route('post.login') }}" method="POST">

                                @csrf

                                <div class="mb-3">

                                    <label>Email</label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Masukkan Email"
                                        required>

                                </div>

                                <div class="mb-4">

                                    <label>Password</label>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Masukkan Password"
                                        required>

                                </div>

                                <button
                                    type="submit"
                                    class="btn btn-primary w-100 btn-login">

                                    <i class="fas fa-sign-in-alt"></i>

                                    Login

                                </button>

                            </form>

                            <hr>

                            <div class="text-center">

                                Belum punya akun?

                                <br>

                                <a href="{{ route('register') }}"
                                   class="fw-bold text-decoration-none">

                                    Daftar Sekarang

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="text-center mt-3 text-muted">

                © {{ date('Y') }} Merch Store

            </div>

        </div>

    </div>

</div>

</body>
</html>