<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem - PKBM Al-Suroya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .login-card { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .btn-primary-custom { background-color: #0d6efd; border: none; padding: 12px; border-radius: 10px; font-weight: 600; }
        .btn-primary-custom:hover { background-color: #0b5ed7; }
        .form-control { border-radius: 10px; padding: 12px 15px; }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card p-4 p-md-5 bg-white">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-graduation-cap fa-2x"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-1">PKBM AL-SUROYA</h4>
                        <p class="text-muted small">Silakan masuk ke Sistem Akademik</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger rounded-3 small p-2 mb-3 text-center">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small">Email / Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control border-start-0" value="admin@alsuroya.sch.id" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary small">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 rounded-start-3 text-muted"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" class="form-control border-start-0" value="password" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-primary-custom w-100 mb-3">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Masuk Sistem
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/" class="text-decoration-none small text-secondary">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>