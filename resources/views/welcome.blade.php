<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKBM Al-Suroya Metro Timur</title>

    <!-- Google Fonts & Bootstrap 5 & FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Plus+Jakarta+Sans:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f8fafc;
            color: #0f172a;
        }
        
        .navbar {
            background: #ffffff !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        }

        .hero-banner-section {
            background: linear-gradient(135deg, #e0f2fe 0%, #ffffff 60%, #fef08a 100%);
            padding: 130px 0 80px 0;
            position: relative;
            overflow: hidden;
            border-bottom: 5px solid #fbbf24;
        }

        .logo-house-icon {
            color: #2563eb;
            font-size: 2.8rem;
            margin-bottom: -10px;
        }

        .pkbm-giant-title {
            font-size: 4.5rem;
            font-weight: 900;
            color: #1e3a8a;
            letter-spacing: -1px;
            text-shadow: 3px 4px 0px #ffffff, 6px 7px 0px rgba(30, 58, 138, 0.2);
            line-height: 1;
            margin-bottom: 12px;
        }

        .ribbon-yellow {
            background: #eab308;
            color: #0f172a;
            font-weight: 900;
            font-size: 1.1rem;
            padding: 8px 24px;
            border-radius: 6px;
            display: inline-block;
            letter-spacing: 1px;
            box-shadow: 0 4px 12px rgba(234, 179, 8, 0.35);
            margin-bottom: 25px;
        }

        .slogan-box {
            background: #1e3a8a;
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 12px;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(30, 58, 138, 0.25);
            border-bottom: 4px solid #eab308;
            margin-bottom: 35px;
        }
        .slogan-text {
            font-family: 'Caveat', cursive;
            font-size: 2.2rem;
            color: #fef08a;
            margin: 0;
            line-height: 1;
        }

        .feature-icon-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            margin: 0 auto 10px auto;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }

        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.1);
        }

        .btn-brand {
            background: #2563eb;
            color: #ffffff !important;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }
        .btn-brand:hover { background: #1d4ed8; }

        .banner-student-img {
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(30, 58, 138, 0.15);
            border: 6px solid #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-extrabold text-dark d-flex align-items-center gap-2" href="#">
                <div class="bg-primary text-white rounded-3 px-2 py-1">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <span class="fs-5">PKBM <span class="text-primary">AL-SUROYA</span></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="#program">Program Paket</a></li>
                    <li class="nav-item"><a class="nav-link text-secondary" href="#ppdb">PPDB Online</a></li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-outline-primary rounded-pill px-4 fw-bold" href="/login">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Login Sistem
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Banner -->
    <header id="beranda" class="hero-banner-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <div class="logo-house-icon"><i class="fa-solid fa-house-chimney-user"></i></div>
                    <h1 class="pkbm-giant-title">PKBM</h1>
                    
                    <div class="ribbon-yellow text-uppercase">
                        PUSAT KEGIATAN BELAJAR MASYARAKAT AL-SUROYA
                    </div>

                    <div>
                        <div class="slogan-box">
                            <p class="slogan-text">Belajar Sepanjang Hayat, Raih Masa Depan Hebat!</p>
                        </div>
                    </div>

                    <div class="row g-3 text-center my-3" style="max-width: 580px;">
                        <div class="col-3">
                            <div class="feature-icon-circle bg-primary">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <span class="fw-bold small d-block text-dark">PENDIDIKAN FLEKSIBEL</span>
                        </div>
                        <div class="col-3">
                            <div class="feature-icon-circle bg-success">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <span class="fw-bold small d-block text-dark">UNTUK SEMUA USIA</span>
                        </div>
                        <div class="col-3">
                            <div class="feature-icon-circle bg-warning text-dark">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <span class="fw-bold small d-block text-dark">TINGKATKAN PENGETAHUAN</span>
                        </div>
                        <div class="col-3">
                            <div class="feature-icon-circle bg-info text-white">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold small d-block text-dark">WUJUDKAN MASA DEPAN</span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mt-4">
                        <a href="#ppdb" class="btn btn-brand btn-lg px-4 py-3">
                            <i class="fa-solid fa-user-plus me-2"></i>Daftar PPDB Online 2026
                        </a>
                    </div>
                </div>

                <div class="col-lg-5 text-center">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Siswa PKBM Al-Suroya" class="img-fluid banner-student-img">
                </div>
            </div>
        </div>
    </header>

    <!-- Profil Section -->
    <section id="profil" class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-bold">TENTANG KAMI</span>
                <h2 class="fw-bold mt-2">Profil PKBM Al-Suroya Metro Timur</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="feature-icon-circle bg-primary mb-3"><i class="fa-solid fa-school"></i></div>
                        <h5 class="fw-bold">NPSN Resmi</h5>
                        <h4 class="text-primary fw-extrabold my-2"><?php echo isset($profil->npsn) ? $profil->npsn : 'P9962841'; ?></h4>
                        <p class="text-muted small mb-0">Terdaftar secara sah di Kemendikbudristek.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="feature-icon-circle bg-success mb-3"><i class="fa-solid fa-location-dot"></i></div>
                        <h5 class="fw-bold">Alamat Lembaga</h5>
                        <p class="fw-semibold text-dark mb-1 small"><?php echo isset($profil->alamat) ? $profil->alamat : 'Jl. Selagai, Gang Parto, No. 11, Iringmulyo'; ?></p>
                        <p class="text-muted small mb-0">Kec. Metro Timur, Kota Metro, Lampung.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-custom p-4 h-100 text-center">
                        <div class="feature-icon-circle bg-warning text-dark mb-3"><i class="fa-solid fa-book-open-reader"></i></div>
                        <h5 class="fw-bold">Kurikulum Modular</h5>
                        <p class="fw-semibold text-dark mb-1 small">Berbasis Standar KKM</p>
                        <p class="text-muted small mb-0">Rekapitulasi Ujian Modul, UTS, dan UAS terukur.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form PPDB Section -->
    <section id="ppdb" class="py-5 bg-light border-top">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-custom p-4 p-md-5 bg-white">
                        <div class="text-center mb-4">
                            <span class="badge bg-primary px-3 py-2 rounded-pill mb-2 fw-bold">FORM PPDB ONLINE 2026</span>
                            <h3 class="fw-bold text-dark">Formulir Pendaftaran Siswa Baru</h3>
                        </div>

                        <form action="/ppdb/store" method="POST">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap Siswa</label>
                                <input type="text" name="nama_lengkap" class="form-control" required placeholder="Sesuai Ijazah / KTP / KK">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">NIK (No. KTP / KK)</label>
                                    <input type="text" name="nik" class="form-control" required placeholder="16 Digit NIK">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">No. WhatsApp Aktif</label>
                                    <input type="text" name="no_hp" class="form-control" required placeholder="08xxxxxxxxxx">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Pilih Program Paket</label>
                                <select name="program" class="form-select" required>
                                    <option value="">-- Pilih Program --</option>
                                    <option value="Paket A">Paket A (Setara SD)</option>
                                    <option value="Paket B">Paket B (Setara SMP)</option>
                                    <option value="Paket C">Paket C (Setara SMA)</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Alamat Rumah Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="3" required placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-brand w-100 fw-bold py-3">
                                <i class="fa-solid fa-paper-plane me-2"></i>Kirim Pendaftaran Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-4 text-center border-top">
        <div class="container">
            <p class="mb-1 fw-bold text-dark">PKBM AL-SUROYA METRO TIMUR</p>
            <p class="small text-muted mb-0">&copy; 2026 Sistem Informasi Akademik & PPDB Online.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>