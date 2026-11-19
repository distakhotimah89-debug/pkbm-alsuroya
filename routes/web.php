<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\ProfilLembaga;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Prestasi;
use App\Models\Pendaftaran;
use App\Models\Presensi;
use App\Models\Tugas;

// 1. Route Halaman Utama Landing Page
Route::get('/', function () {
    $profil = ProfilLembaga::first();
    $berita = Berita::latest()->take(3)->get();
    $fasilitas = Fasilitas::all();
    $prestasi = Prestasi::all();

    return view('welcome', compact('profil', 'berita', 'fasilitas', 'prestasi'));
});

// 2. Route Pemroses Form PPDB Online
Route::post('/ppdb/store', function (Request $request) {
    $validated = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'nik'          => 'required|string|max:16',
        'no_hp'        => 'required|string|max:15',
        'program'      => 'required|string',
        'alamat'       => 'required|string',
    ]);

    $pendaftaran = Pendaftaran::create($validated);
    return redirect('/ppdb/sukses/' . $pendaftaran->id);
});

// 3. Route Tampilan Halaman Bukti Pendaftaran Sukses
Route::get('/ppdb/sukses/{id}', function ($id) {
    $data = Pendaftaran::findOrFail($id);
    return view('ppdb_sukses', compact('data'));
});

// 4. Route Halaman Login Form
Route::get('/login', function () {
    return view('login');
})->name('login');

// 5. Route Pemroses Login
Route::post('/login', function (Request $request) {
    return redirect('/dashboard');
});

// 6. Route Tampilan Dashboard Admin (Statistik & Ikhtisar)
Route::get('/dashboard', function () {
    $totalPendaftar = Pendaftaran::count();
    $countA = Pendaftaran::where('program', 'Paket A')->count();
    $countB = Pendaftaran::where('program', 'Paket B')->count();
    $countC = Pendaftaran::where('program', 'Paket C')->count();

    return view('dashboard', compact('totalPendaftar', 'countA', 'countB', 'countC'));
});

// 6B. Route Tampilan Halaman Khusus Data PPDB
Route::get('/data-ppdb', function () {
    $pendaftarans = Pendaftaran::latest()->get();
    return view('ppdb_data', compact('pendaftarans'));
});

// 7. Route Hapus Data Pendaftaran PPDB oleh Admin
Route::delete('/dashboard/pendaftaran/delete/{id}', function ($id) {
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->delete();

    return redirect('/data-ppdb')->with('sukses', 'Data pendaftaran berhasil dihapus.');
});

// 8. Route Tampilan Data Rombel Paket A, B, dan C
Route::get('/rombel', function () {
    $paketA = Pendaftaran::where('program', 'Paket A')->get();
    $paketB = Pendaftaran::where('program', 'Paket B')->get();
    $paketC = Pendaftaran::where('program', 'Paket C')->get();

    return view('rombel', compact('paketA', 'paketB', 'paketC'));
});

// 9. Route Tampilan & Pengambilan Modul Mata Pelajaran Kesetaraan
Route::get('/mapel', function () {
    $siswas = Pendaftaran::all();
    $riwayatAmbil = session('riwayat_ambil_modul', []);

    $mapels = [
        ['kode' => 'MP-01', 'nama' => 'Pendidikan Pancasila dan Kewarganegaraan', 'kelompok' => 'Wajib Umum', 'tingkat' => 'Paket A / B / C', 'skk' => 3],
        ['kode' => 'MP-02', 'nama' => 'Bahasa Indonesia', 'kelompok' => 'Wajib Umum', 'tingkat' => 'Paket A / B / C', 'skk' => 4],
        ['kode' => 'MP-03', 'nama' => 'Bahasa Inggris', 'kelompok' => 'Wajib Umum', 'tingkat' => 'Paket B / C', 'skk' => 3],
        ['kode' => 'MP-04', 'nama' => 'Matematika', 'kelompok' => 'Wajib Umum', 'tingkat' => 'Paket A / B / C', 'skk' => 4],
        ['kode' => 'MP-05', 'nama' => 'Ilmu Pengetahuan Alam (IPA)', 'kelompok' => 'Pemberdayaan', 'tingkat' => 'Paket A / B', 'skk' => 3],
        ['kode' => 'MP-06', 'nama' => 'Ilmu Pengetahuan Sosial (IPS)', 'kelompok' => 'Pemberdayaan', 'tingkat' => 'Paket A / B', 'skk' => 3],
        ['kode' => 'MP-07', 'nama' => 'Prakarya dan Kewirausahaan', 'kelompok' => 'Keterampilan', 'tingkat' => 'Paket C', 'skk' => 4],
        ['kode' => 'MP-08', 'nama' => 'Sosiologi & Geografi', 'kelompok' => 'Peminatan Paket C', 'tingkat' => 'Paket C', 'skk' => 4],
        ['kode' => 'MP-09', 'nama' => 'Pendidikan Agama dan Budi Pekerti', 'kelompok' => 'Wajib Umum', 'tingkat' => 'Paket A / B / C', 'skk' => 2],
    ];

    return view('mapel', compact('mapels', 'siswas', 'riwayatAmbil'));
});

// Proses Simpan Pengambilan Paket Modul
Route::post('/mapel/ambil', function (Request $request) {
    $riwayat = session('riwayat_ambil_modul', []);
    $riwayat[] = [
        'nama_siswa'  => $request->nama_siswa,
        'paket_modul' => $request->paket_modul,
    ];
    session(['riwayat_ambil_modul' => $riwayat]);

    return redirect('/mapel')->with('sukses', 'Paket modul mata pelajaran berhasil diambil untuk siswa tersebut!');
});

// 10. Route Export Data Pendaftaran ke File Excel/CSV
Route::get('/dashboard/export-csv', function () {
    $fileName = 'data_ppdb_pkbm_alsuroya_' . date('Y-m-d') . '.csv';
    $pendaftarans = Pendaftaran::all();

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $columns = array('ID', 'Nama Lengkap', 'NIK', 'No WhatsApp', 'Program', 'Alamat', 'Tanggal Daftar');

    $callback = function() use($pendaftarans, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($pendaftarans as $item) {
            $row['ID']             = $item->id;
            $row['Nama Lengkap']   = $item->nama_lengkap;
            $row['NIK']            = $item->nik;
            $row['No WhatsApp']    = $item->no_hp;
            $row['Program']        = $item->program;
            $row['Alamat']         = $item->alamat;
            $row['Tanggal Daftar'] = $item->created_at->format('Y-m-d H:i:s');

            fputcsv($file, array($row['ID'], $row['Nama Lengkap'], $row['NIK'], $row['No WhatsApp'], $row['Program'], $row['Alamat'], $row['Tanggal Daftar']));
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
});
// Route Ganti Tahun Ajaran Aktif
Route::post('/ganti-ta', function (Request $request) {
    session(['tahun_ajaran' => $request->tahun_ajaran]);
    return back();
});

// 11. Route Tampilan & Input Daftar Kehadiran (Presensi)
Route::get('/presensi', function () {
    $siswas = Pendaftaran::all();
    $presensis = Presensi::orderByDesc('tanggal')->orderByDesc('id')->get();
    return view('presensi', compact('siswas', 'presensis'));
});

// Proses Simpan Presensi Kehadiran
Route::post('/presensi/store', function (Request $request) {
    $validated = $request->validate([
        'nama_siswa' => 'required|string|max:100',
        'paket'      => 'required|string|max:50',
        'tanggal'    => 'required|date',
        'status'     => 'required|in:Hadir,Izin,Sakit,Alpa',
        'keterangan' => 'nullable|string|max:255',
    ]);

    Presensi::create($validated);
    return redirect('/presensi')->with('sukses', 'Data kehadiran berhasil dicatat!');
});

// Hapus Data Presensi
Route::delete('/presensi/delete/{id}', function ($id) {
    $presensi = Presensi::findOrFail($id);
    $presensi->delete();
    return redirect('/presensi')->with('sukses', 'Data kehadiran berhasil dihapus.');
});

// 12. Route Tampilan & Pengumpulan Tugas
Route::get('/tugas', function () {
    $siswas = Pendaftaran::all();
    $tugasList = Tugas::latest()->get();
    return view('tugas', compact('siswas', 'tugasList'));
});

// Proses Simpan Pengumpulan Tugas
Route::post('/tugas/store', function (Request $request) {
    $validated = $request->validate([
        'nama_siswa'     => 'required|string|max:100',
        'mata_pelajaran' => 'required|string|max:100',
        'judul_tugas'    => 'required|string|max:150',
        'link_tugas'     => 'required|url',
    ]);

    $validated['status_nilai'] = 'Belum Dinilai';
    Tugas::create($validated);

    return redirect('/tugas')->with('sukses', 'Tugas berhasil dikumpulkan dan tercatat di sistem!');
});

// Proses Ubah Status Menjadi "Sudah Dinilai"
Route::post('/tugas/nilai/{id}', function ($id) {
    $tugas = Tugas::findOrFail($id);
    $tugas->update([
        'status_nilai' => 'Sudah Dinilai',
    ]);

    return redirect('/tugas')->with('sukses', 'Status tugas berhasil diperbarui menjadi Sudah Dinilai!');
});

// Hapus Data Pengumpulan Tugas
Route::delete('/tugas/delete/{id}', function ($id) {
    $tugas = Tugas::findOrFail($id);
    $tugas->delete();
    return redirect('/tugas')->with('sukses', 'Data pengumpulan tugas berhasil dihapus.');
});
