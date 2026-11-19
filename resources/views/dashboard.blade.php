<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PKBM Al-Suroya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #0f172a; color: white; }
        .sidebar a { color: #94a3b8; text-decoration: none; padding: 12px 20px; display: block; font-weight: 500; border-radius: 8px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #1e293b; color: #38bdf8; }
        .card-stat { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-md-3 col-lg-2 sidebar p-3 d-none d-md-block">
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <i class="fa-solid fa-graduation-cap fa-2x text-primary"></i>
                    <div>
                        <h6 class="fw-bold mb-0 text-white">PKBM AL-SUROYA</h6>
                        <small class="text-muted" style="font-size: 11px;">Panel Admin</small>
                    </div>
                </div>
                <hr class="border-secondary">
                <nav class="mt-3">
                    <a href="/dashboard" class="active"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
                    <a href="/data-ppdb"><i class="fa-solid fa-users me-2"></i> Data PPDB</a>
                    <a href="/rombel"><i class="fa-solid fa-layer-group me-2"></i> Data Rombel</a>
                    <a href="/mapel"><i class="fa-solid fa-book me-2"></i> Modul Mapel</a>
                    <a href="/presensi"><i class="fa-solid fa-clipboard-user me-2"></i> Daftar Kehadiran</a>
                    <a href="/tugas"><i class="fa-solid fa-file-circle-check me-2"></i> Pengumpulan Tugas</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Selamat Datang, Admin PKBM</h4>
                        <p class="text-muted small mb-0">Ikhtisar Statistik Penerimaan & Akademik PKBM Al-Suroya Metro Timur</p>
                    </div>
                    <span class="badge bg-primary px-3 py-2 rounded-pill"><i class="fa-solid fa-calendar me-1"></i> T.A 2026/2027</span>
                </div>

                <!-- Cards Statistik Rincian Paket -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="card card-stat p-3 bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small fw-semibold">Total Semua Pendaftar</span>
                                    <h3 class="fw-bold text-primary mb-0 mt-1">{{ $totalPendaftar }}</h3>
                                </div>
                                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-circle">
                                    <i class="fa-solid fa-users fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stat p-3 bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small fw-semibold">Siswa Paket A (SD)</span>
                                    <h3 class="fw-bold text-success mb-0 mt-1">{{ $countA }}</h3>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success p-3 rounded-circle">
                                    <i class="fa-solid fa-book-open fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stat p-3 bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small fw-semibold">Siswa Paket B (SMP)</span>
                                    <h3 class="fw-bold text-warning mb-0 mt-1">{{ $countB }}</h3>
                                </div>
                                <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-circle">
                                    <i class="fa-solid fa-school fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-stat p-3 bg-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="text-muted small fw-semibold">Siswa Paket C (SMA)</span>
                                    <h3 class="fw-bold text-info mb-0 mt-1">{{ $countC }}</h3>
                                </div>
                                <div class="bg-info bg-opacity-10 text-info p-3 rounded-circle">
                                    <i class="fa-solid fa-graduation-cap fa-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informasi Sistem & Akses Cepat -->
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="card card-stat bg-white p-4 h-100">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-info me-2 text-primary"></i>Informasi Lembaga & Sistem</h5>
                            <table class="table table-borderless small mb-0">
                                <tr>
                                    <td class="text-muted" width="35%">Nama Lembaga</td>
                                    <td class="fw-semibold">: PKBM Al-Suroya Metro Timur</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Alamat</td>
                                    <td class="fw-semibold">: Jl. Ki Hajar Dewantara, Iringmulyo, Kota Metro, Lampung</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status Gelombang PPDB</td>
                                    <td>: <span class="badge bg-success">Dibuka (Gelombang 1)</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Sistem Database</td>
                                    <td class="fw-semibold">: MySQL / MariaDB Terhubung</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card card-stat bg-white p-4 h-100">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bolt me-2 text-warning"></i>Akses Cepat Admin</h5>
                            <div class="d-grid gap-2">
                                <a href="/data-ppdb" class="btn btn-outline-primary text-start rounded-3 p-2">
                                    <i class="fa-solid fa-users me-2"></i> Kelola & Verifikasi Data Pendaftar
                                </a>
                                <a href="/rombel" class="btn btn-outline-success text-start rounded-3 p-2">
                                    <i class="fa-solid fa-layer-group me-2"></i> Cek Pembagian Rombel Paket
                                </a>
                                <a href="/mapel" class="btn btn-outline-info text-start rounded-3 p-2">
                                    <i class="fa-solid fa-book me-2"></i> Atur Paket Modul Mata Pelajaran
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>