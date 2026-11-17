<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data PPDB - PKBM Al-Suroya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { min-height: 100vh; background-color: #0f172a; color: white; }
        .sidebar a { color: #94a3b8; text-decoration: none; padding: 12px 20px; display: block; font-weight: 500; border-radius: 8px; margin-bottom: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #1e293b; color: #38bdf8; }
        .card-stat { border: none; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }

        @media print {
            .sidebar, .no-print { display: none !important; }
            .col-md-9 { width: 100% !important; }
            body { background-color: white; }
        }
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
                    <a href="/data-ppdb" class="active"><i class="fa-solid fa-users me-2"></i> Data PPDB</a>
                    <a href="/rombel"><i class="fa-solid fa-layer-group me-2"></i> Data Rombel</a>
                    <a href="/mapel"><i class="fa-solid fa-book me-2"></i> Modul Mapel</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Manajemen Data Pendaftaran PPDB</h4>
                        <p class="text-muted small mb-0">Kelola berkas calon warga belajar baru PKBM Al-Suroya Metro Timur</p>
                    </div>
                    <div class="d-flex gap-2 no-print">
                        <a href="/dashboard/export-csv" class="btn btn-success rounded-pill px-3">
                            <i class="fa-solid fa-file-excel me-1"></i> Export CSV/Excel
                        </a>
                        <button onclick="window.print()" class="btn btn-outline-primary rounded-pill px-3">
                            <i class="fa-solid fa-print me-1"></i> Cetak Laporan PDF
                        </button>
                    </div>
                </div>

                @if(session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4 no-print" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>{{ session('sukses') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Tabel Data Pendaftaran PPDB -->
                <div class="card card-stat bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-list-check me-2 text-primary"></i>Daftar Seluruh Pendaftar PPDB ({{ $pendaftarans->count() }} Orang)</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>No. WhatsApp</th>
                                    <th>Program</th>
                                    <th>Alamat</th>
                                    <th>Tgl Daftar</th>
                                    <th class="text-center no-print">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pendaftarans as $index => $item)
                                <tr>
                                    <td><strong>{{ $index + 1 }}</strong></td>
                                    <td class="fw-semibold text-dark">{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td><span class="badge bg-primary">{{ $item->program }}</span></td>
                                    <td class="small text-muted">{{ Str::limit($item->alamat, 30) }}</td>
                                    <td class="small">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-center no-print">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="/ppdb/sukses/{{ $item->id }}" target="_blank" class="btn btn-sm btn-outline-info rounded-circle" title="Lihat Bukti">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <form action="/dashboard/pendaftaran/delete/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Hapus Data">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">Belum ada data pendaftaran.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>