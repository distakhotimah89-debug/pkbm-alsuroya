<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumpulan Tugas - PKBM Al-Suroya</title>
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
                    <a href="/presensi"><i class="fa-solid fa-clipboard-user me-2"></i> Daftar Kehadiran</a>
                    <a href="/tugas" class="active"><i class="fa-solid fa-file-circle-check me-2"></i> Pengumpulan Tugas</a>
                    <hr class="border-secondary my-3">
                    <a href="/" class="text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</a>
                </nav>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9 col-lg-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Pengumpulan Tugas Warga Belajar</h4>
                        <p class="text-muted small mb-0">Manajemen pengumpulan tugas berbasis Google Drive / Dokumen Cloud PKBM Al-Suroya</p>
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

                <!-- Form Pengumpulan Tugas -->
                <div class="card card-stat bg-white p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-cloud-arrow-up me-2 text-primary"></i>Form Pengumpulan Tugas Modul</h5>
                        <span class="badge bg-light text-primary border border-primary-subtle px-3 py-2"><i class="fa-brands fa-google-drive me-1 text-success"></i> Link Google Drive</span>
                    </div>
                    
                    <div class="alert alert-info py-2 px-3 small rounded-3 my-3">
                        <i class="fa-solid fa-circle-info me-2"></i><strong>Ketentuan Pengumpulan:</strong> Gunakan link sharing dokumen (seperti Google Drive, Google Docs, atau OneDrive) yang telah diatur izin aksesnya <em>"Anyone with the link can view"</em>. Hindari upload file fisik langsung ke server agar aplikasi ringan dan aman saat di-deploy ke Vercel.
                    </div>

                    <form action="/tugas/store" method="POST" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Nama Siswa</label>
                            <input list="list-siswa" name="nama_siswa" class="form-control" placeholder="Ketik atau pilih nama siswa..." required autocomplete="off">
                            <datalist id="list-siswa">
                                @foreach($siswas as $s)
                                    <option value="{{ $s->nama_lengkap }}">{{ $s->program }}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Mata Pelajaran</label>
                            <select name="mata_pelajaran" class="form-select" required>
                                <option value="">-- Pilih Mata Pelajaran --</option>
                                <option value="Pendidikan Pancasila dan Kewarganegaraan">Pendidikan Pancasila dan Kewarganegaraan</option>
                                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                                <option value="Matematika">Matematika</option>
                                <option value="Ilmu Pengetahuan Alam (IPA)">Ilmu Pengetahuan Alam (IPA)</option>
                                <option value="Ilmu Pengetahuan Sosial (IPS)">Ilmu Pengetahuan Sosial (IPS)</option>
                                <option value="Prakarya dan Kewirausahaan">Prakarya dan Kewirausahaan</option>
                                <option value="Sosiologi & Geografi">Sosiologi & Geografi</option>
                                <option value="Pendidikan Agama dan Budi Pekerti">Pendidikan Agama dan Budi Pekerti</option>
                                <option value="Keterampilan Fungsional">Keterampilan Fungsional</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Judul Tugas / Modul</label>
                            <input type="text" name="judul_tugas" class="form-control" placeholder="Contoh: Tugas Modul 1 - Analisis Teks Laporan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Tautan / Link Google Drive Tugas</label>
                            <input type="url" name="link_tugas" class="form-control" placeholder="https://drive.google.com/file/d/..." required>
                        </div>
                        <div class="col-12 text-end pt-2">
                            <button type="submit" class="btn btn-primary px-4 fw-semibold">
                                <i class="fa-solid fa-paper-plane me-1"></i> Simpan Pengumpulan Tugas
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tabel Daftar Tugas Masuk -->
                <div class="card card-stat bg-white p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-list-check me-2 text-primary"></i>Daftar Tugas Masuk</h5>
                        <span class="badge bg-primary px-3 py-2 rounded-pill">Total: {{ $tugasList->count() }} Tugas</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Waktu Kumpul</th>
                                    <th>Nama Siswa</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Judul Tugas</th>
                                    <th>Tautan Berkas</th>
                                    <th>Status Nilai</th>
                                    <th width="150" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tugasList as $idx => $t)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td><span class="small text-secondary">{{ $t->created_at ? $t->created_at->format('d/m/Y H:i') : '-' }}</span></td>
                                    <td class="fw-bold text-dark">{{ $t->nama_siswa }}</td>
                                    <td><span class="badge bg-light text-dark border">{{ $t->mata_pelajaran }}</span></td>
                                    <td class="fw-semibold">{{ $t->judul_tugas }}</td>
                                    <td>
                                        <a href="{{ $t->link_tugas }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary fw-semibold px-2 py-1">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Buka Link
                                        </a>
                                    </td>
                                    <td>
                                        @if($t->status_nilai == 'Sudah Dinilai')
                                            <span class="badge bg-success"><i class="fa-solid fa-circle-check me-1"></i> Sudah Dinilai</span>
                                        @else
                                            <span class="badge bg-warning text-dark"><i class="fa-solid fa-clock me-1"></i> Belum Dinilai</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            @if($t->status_nilai != 'Sudah Dinilai')
                                            <form action="/tugas/nilai/{{ $t->id }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success fw-semibold" title="Tandai Sudah Dinilai">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <form action="/tugas/delete/{{ $t->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data tugas ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Data">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <i class="fa-regular fa-folder-open fa-2x mb-2 d-block"></i>
                                        Belum ada pengumpulan tugas yang masuk. Siswa dapat mengumpulkan tugas melalui form di atas.
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
