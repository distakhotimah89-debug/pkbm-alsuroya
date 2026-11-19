<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kehadiran - PKBM Al-Suroya</title>
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
                    <a href="/mapel"><i class="fa-solid fa-book me-2"></i> Modul Mapel</a>
                    <a href="/presensi" class="active"><i class="fa-solid fa-clipboard-user me-2"></i> Daftar Kehadiran</a>
                    <a href="/tugas"><i class="fa-solid fa-file-circle-check me-2"></i> Pengumpulan Tugas</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Daftar Kehadiran Warga Belajar</h4>
                        <p class="text-muted small mb-0">Catat dan pantau riwayat presensi tutorial tatap muka warga belajar PKBM Al-Suroya</p>
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

                <!-- Form Input Kehadiran -->
                <div class="card card-stat bg-white p-4 mb-4">
                    <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check me-2 text-primary"></i>Form Input Kehadiran Siswa</h5>
                    <form action="/presensi/store" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Nama Siswa</label>
                            <input list="list-siswa" name="nama_siswa" class="form-control" placeholder="Ketik atau pilih nama siswa..." required autocomplete="off">
                            <datalist id="list-siswa">
                                @foreach($siswas as $s)
                                    <option value="{{ $s->nama_lengkap }}">{{ $s->program }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Paket Kesetaraan</label>
                            <select name="paket" class="form-select" required>
                                <option value="">-- Pilih Paket --</option>
                                <option value="Paket A">Paket A (Setara SD)</option>
                                <option value="Paket B">Paket B (Setara SMP)</option>
                                <option value="Paket C">Paket C (Setara SMA)</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small fw-semibold">Tanggal Pertemuan</label>
                            <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label small fw-semibold">Status Kehadiran</label>
                            <select name="status" class="form-select" required>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Alpa">Alpa</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label class="form-label small fw-semibold">Keterangan (Opsional)</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Mengikuti sesi tutorial tatap muka modul 2 / Surat izin terlampir">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                <i class="fa-solid fa-check-circle me-1"></i> Simpan Kehadiran
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tabel Riwayat Kehadiran -->
                <div class="card card-stat bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-list-check me-2 text-primary"></i>Daftar Riwayat Kehadiran</h5>
                        <span class="badge bg-primary px-3 py-2 rounded-pill">Total: {{ $presensis->count() }} Data</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Siswa</th>
                                    <th>Paket</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th width="100" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($presensis as $idx => $p)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td><span class="fw-semibold text-secondary">{{ \Carbon\Carbon::parse($p->tanggal)->translatedFormat('d M Y') }}</span></td>
                                    <td class="fw-bold text-dark">{{ $p->nama_siswa }}</td>
                                    <td><span class="badge bg-info text-dark">{{ $p->paket }}</span></td>
                                    <td>
                                        @if($p->status == 'Hadir')
                                            <span class="badge bg-success"><i class="fa-solid fa-circle-check me-1"></i> Hadir</span>
                                        @elseif($p->status == 'Izin')
                                            <span class="badge bg-info text-dark"><i class="fa-solid fa-circle-info me-1"></i> Izin</span>
                                        @elseif($p->status == 'Sakit')
                                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-bed-pulse me-1"></i> Sakit</span>
                                        @else
                                            <span class="badge bg-danger"><i class="fa-solid fa-circle-xmark me-1"></i> Alpa</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->keterangan ?: '-' }}</td>
                                    <td class="text-center">
                                        <form action="/presensi/delete/{{ $p->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kehadiran ini?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <i class="fa-regular fa-folder-open fa-2x mb-2 d-block"></i>
                                        Belum ada data riwayat kehadiran yang dicatat. Silakan masukkan data pada form di atas.
                                    </td>
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
