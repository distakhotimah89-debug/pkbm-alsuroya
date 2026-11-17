<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Mapel - PKBM Al-Suroya</title>
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
                    <a href="/dashboard"><i class="fa-solid fa-gauge me-2"></i> Dashboard</a>
                    <a href="/data-ppdb"><i class="fa-solid fa-users me-2"></i> Data PPDB</a>
                    <a href="/rombel"><i class="fa-solid fa-layer-group me-2"></i> Data Rombel</a>
                    <a href="/mapel" class="active"><i class="fa-solid fa-book me-2"></i> Modul Mapel</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Pengambilan Paket Modul & Kurikulum</h4>
                        <p class="text-muted small mb-0">Atur pengambilan paket mata pelajaran kesetaraan untuk warga belajar PKBM Al-Suroya</p>
                    </div>
                    <!-- Dropdown Pilihan Tahun Ajaran -->
                    <form action="/ganti-ta" method="POST" class="d-inline">
                        @csrf
                        <select name="tahun_ajaran" onchange="this.form.submit()" class="form-select form-select-sm bg-primary text-white border-0 rounded-pill px-3 py-2 fw-semibold w-auto shadow-sm" style="cursor: pointer;">
                            <option value="2025/2026" {{ session('tahun_ajaran') == '2025/2026' ? 'selected' : '' }}>📅 T.A 2025/2026</option>
                            <option value="2026/2027" {{ session('tahun_ajaran', '2026/2027') == '2026/2027' ? 'selected' : '' }}>📅 T.A 2026/2027</option>
                            <option value="2027/2028" {{ session('tahun_ajaran') == '2027/2028' ? 'selected' : '' }}>📅 T.A 2027/2028</option>
                        </select>
                    </form>
                </div>

                @if(session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>{{ session('sukses') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Form Pengambilan Paket Modul oleh Siswa -->
                <div class="card card-stat bg-white p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-cart-plus me-2 text-primary"></i>Form Pengambilan Paket Mata Pelajaran</h5>
                    <form action="/mapel/ambil" method="POST" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Pilih Warga Belajar (Siswa)</label>
                            <select name="nama_siswa" class="form-select" required>
                                <option value="">-- Pilih Nama Siswa --</option>
                                @foreach($siswas as $s)
                                    <option value="{{ $s->nama_lengkap }} ({{ $s->program }})">{{ $s->nama_lengkap }} - {{ $s->program }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label small fw-semibold">Pilih Paket Modul Mata Pelajaran</label>
                            <select name="paket_modul" class="form-select" required>
                                <option value="">-- Pilih Paket Modul --</option>
                                <option value="Paket Lengkap A (6 Mapel Wajib - 18 SKK)">Paket Lengkap A (6 Mapel Wajib - 18 SKK)</option>
                                <option value="Paket Lengkap B (7 Mapel Wajib - 22 SKK)">Paket Lengkap B (7 Mapel Wajib - 22 SKK)</option>
                                <option value="Paket Lengkap C (7 Mapel Wajib & Peminatan - 24 SKK)">Paket Lengkap C (7 Mapel Wajib & Peminatan - 24 SKK)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                <i class="fa-solid fa-check-circle me-1"></i> Ambil Paket Modul
                            </button>
                        </div>
                    </form>

                    @if(count($riwayatAmbil) > 0)
                    <hr class="my-4">
                    <h6 class="fw-bold text-success mb-3"><i class="fa-solid fa-clipboard-check me-1"></i> Data Paket Modul yang Sudah Diambil Siswa:</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Paket Modul yang Diambil</th>
                                    <th width="140">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($riwayatAmbil as $idx => $r)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td class="fw-semibold">{{ $r['nama_siswa'] }}</td>
                                    <td><span class="badge bg-info text-dark">{{ $r['paket_modul'] }}</span></td>
                                    <td><span class="badge bg-success">Aktif Belajar</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>

                <!-- Tabel Referensi Modul -->
                <div class="card card-stat bg-white p-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-list-ol me-2 text-primary"></i>Daftar Referensi Modul Pembelajaran</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode Mapel</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Kelompok Modul</th>
                                    <th>Tingkat Kesetaraan</th>
                                    <th>Bobot SKK</th>
                                    <th>Status Modul</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mapels as $m)
                                <tr>
                                    <td><span class="badge bg-secondary">{{ $m['kode'] }}</span></td>
                                    <td class="fw-semibold text-dark">{{ $m['nama'] }}</td>
                                    <td>{{ $m['kelompok'] }}</td>
                                    <td><span class="badge bg-info text-dark">{{ $m['tingkat'] }}</span></td>
                                    <td class="fw-bold text-primary">{{ $m['skk'] }} SKK</td>
                                    <td><span class="badge bg-success">Tersedia</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>