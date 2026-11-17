<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Rombel - PKBM Al-Suroya</title>
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
                    <a href="/dashboard"><i class="fa-solid fa-users me-2"></i> Data PPDB</a>
                    <a href="/rombel" class="active"><i class="fa-solid fa-layer-group me-2"></i> Data Rombel</a>
                    <a href="#mapel"><i class="fa-solid fa-book me-2"></i> Modul Mapel</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Pembagian Rombongan Belajar (Rombel)</h4>
                        <p class="text-muted small mb-0">Manajemen siswa berdasarkan tingkat pendidikan kesetaraan PKBM Al-Suroya</p>
                    </div>
                    <span class="badge bg-primary px-3 py-2 rounded-pill"><i class="fa-solid fa-calendar me-1"></i> T.A 2026/2027</span>
                </div>

                <!-- Tab Menu Rombel -->
                <ul class="nav nav-pills mb-4 gap-2" id="rombelTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active rounded-pill px-4" id="paket-c-tab" data-bs-toggle="tab" data-bs-target="#paket-c" type="button">
                            <i class="fa-solid fa-graduation-cap me-2"></i>Paket C (Setara SMA)
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link rounded-pill px-4" id="paket-b-tab" data-bs-toggle="tab" data-bs-target="#paket-b" type="button">
                            <i class="fa-solid fa-school me-2"></i>Paket B (Setara SMP)
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link rounded-pill px-4" id="paket-a-tab" data-bs-toggle="tab" data-bs-target="#paket-a" type="button">
                            <i class="fa-solid fa-book-open me-2"></i>Paket A (Setara SD)
                        </button>
                    </li>
                </ul>

                <!-- Content Tab -->
                <div class="tab-content" id="rombelTabContent">
                    <!-- Tab Paket C -->
                    <div class="tab-pane fade show active" id="paket-c" role="tabpanel">
                        <div class="card card-stat bg-white p-4">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-users-rectangle me-2 text-primary"></i>Daftar Siswa Paket C</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>NIK</th>
                                            <th>No. WhatsApp</th>
                                            <th>Alamat</th>
                                            <th>Status Rombel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paketC as $index => $item)
                                        <tr>
                                            <td><strong>{{ $index + 1 }}</strong></td>
                                            <td class="fw-semibold text-dark">{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td class="small text-muted">{{ $item->alamat }}</td>
                                            <td><span class="badge bg-success">Terdaftar Rombel C</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Belum ada siswa terdaftar di Paket C.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Paket B -->
                    <div class="tab-pane fade" id="paket-b" role="tabpanel">
                        <div class="card card-stat bg-white p-4">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-users-rectangle me-2 text-primary"></i>Daftar Siswa Paket B</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>NIK</th>
                                            <th>No. WhatsApp</th>
                                            <th>Alamat</th>
                                            <th>Status Rombel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paketB as $index => $item)
                                        <tr>
                                            <td><strong>{{ $index + 1 }}</strong></td>
                                            <td class="fw-semibold text-dark">{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td class="small text-muted">{{ $item->alamat }}</td>
                                            <td><span class="badge bg-success">Terdaftar Rombel B</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Belum ada siswa terdaftar di Paket B.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Paket A -->
                    <div class="tab-pane fade" id="paket-a" role="tabpanel">
                        <div class="card card-stat bg-white p-4">
                            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-users-rectangle me-2 text-primary"></i>Daftar Siswa Paket A</h5>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>NIK</th>
                                            <th>No. WhatsApp</th>
                                            <th>Alamat</th>
                                            <th>Status Rombel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($paketA as $index => $item)
                                        <tr>
                                            <td><strong>{{ $index + 1 }}</strong></td>
                                            <td class="fw-semibold text-dark">{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td class="small text-muted">{{ $item->alamat }}</td>
                                            <td><span class="badge bg-success">Terdaftar Rombel A</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">Belum ada siswa terdaftar di Paket A.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>