<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran PPDB - PKBM Al-Suroya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .card-bukti { border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-bukti p-4 p-md-5 bg-white text-center">
                    <div class="text-success mb-3">
                        <i class="fa-solid fa-circle-check fa-4x"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Pendaftaran Berhasil!</h3>
                    <p class="text-muted small">Terima kasih telah mendaftar di PKBM Al-Suroya Metro Timur.</p>

                    <hr class="my-4">

                    <div class="text-start bg-light p-4 rounded-4 mb-4">
                        <h6 class="fw-bold text-primary mb-3"><i class="fa-solid fa-address-card me-2"></i>Data Calon Siswa:</h6>
                        <table class="table table-borderless table-sm mb-0">
                            <tr>
                                <td class="fw-semibold text-secondary" style="width: 40%;">No. Pendaftaran</td>
                                <td>: <strong>PPDB-2026-00{{ $data->id }}</strong></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-secondary">Nama Lengkap</td>
                                <td>: {{ $data->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-secondary">NIK</td>
                                <td>: {{ $data->nik }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-secondary">No. WhatsApp</td>
                                <td>: {{ $data->no_hp }}</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-secondary">Program Pilihan</td>
                                <td>: <span class="badge bg-primary">{{ $data->program }}</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-secondary">Alamat</td>
                                <td>: {{ $data->alamat }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="d-flex gap-2 justify-content-center">
                        <a href="/" class="btn btn-outline-secondary rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Beranda
                        </a>
                        <button onclick="window.print()" class="btn btn-primary rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-print me-2"></i>Cetak Bukti
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>