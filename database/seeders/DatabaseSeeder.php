<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ProfilLembaga;
use App\Models\TahunAjaran;
use App\Models\Tutor;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Prestasi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        $admin = User::create([
            'name' => 'Administrator PKBM',
            'username' => 'admin',
            'email' => 'admin@pkbm-alsuroya.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        // 2. Profil Lembaga Resmi PKBM Al Suroya (Sesuai Bab I)
        ProfilLembaga::create([
            'nama_lembaga' => 'Pusat Kegiatan Belajar Masyarakat (PKBM) Al Suroya',
            'npsn' => 'P9962841',
            'sejarah' => 'PKBM Al Suroya didirikan di Kota Metro untuk memberikan kesempatan layanan pendidikan kesetaraan bagi masyarakat yang membutuhkan akses pendidikan fleksibel, mencakup Paket A, Paket B, dan Paket C.',
            'visi' => 'Terwujudnya pusat kegiatan belajar masyarakat yang unggul, berakhlak mulia, mandiri, dan berdaya saing.',
            'misi' => "1. Menyelenggarakan pendidikan kesetaraan Paket A, B, dan C yang berkualitas.\n2. Mengembangkan keterampilan fungsional dan kewirausahaan warga belajar.\n3. Meningkatkan motivasi dan kesadaran masyarakat akan pentingnya pendidikan sepanjang hayat.",
            'alamat' => 'Jl. Selagai, Gang Parto, No. 11, Iringmulyo, Kec. Metro Timur, Kota Metro, Lampung',
            'no_telp' => '081272000000',
            'email' => 'info@pkbm-alsuroya.sch.id',
            'link_maps' => 'https://maps.google.com',
        ]);

        // 3. Tahun Ajaran Aktif
        $ta = TahunAjaran::create([
            'tahun_ajaran' => '2025/2026',
            'semester' => 'Ganjil',
            'is_aktif' => true,
        ]);

        // 4. Akun dan Data Tutor (Termasuk narasumber Bab 1: Bapak Rizki)
        $userTutor1 = User::create([
            'name' => 'Rizki, S.Pd.',
            'username' => 'rizki_tutor',
            'email' => 'rizki@pkbm-alsuroya.sch.id',
            'password' => Hash::make('password'),
            'role' => 'tutor',
            'status' => 'aktif',
        ]);

        $tutor1 = Tutor::create([
            'user_id' => $userTutor1->id,
            'nip_nuptk' => '198501012020121001',
            'nama_lengkap' => 'Rizki, S.Pd.',
            'jenis_kelamin' => 'Laki-laki',
            'pendidikan_terakhir' => 'S1 Pendidikan',
            'no_telp' => '081273000001',
            'alamat' => 'Iringmulyo, Metro Timur',
            'status_tutor' => 'Aktif',
        ]);

        $userTutor2 = User::create([
            'name' => 'Siti Aminah, S.Pd.',
            'username' => 'siti_tutor',
            'email' => 'siti@pkbm-alsuroya.sch.id',
            'password' => Hash::make('password'),
            'role' => 'tutor',
            'status' => 'aktif',
        ]);

        $tutor2 = Tutor::create([
            'user_id' => $userTutor2->id,
            'nip_nuptk' => '198902022021122002',
            'nama_lengkap' => 'Siti Aminah, S.Pd.',
            'jenis_kelamin' => 'Perempuan',
            'pendidikan_terakhir' => 'S1 Pendidikan Bahasa',
            'no_telp' => '081273000002',
            'alamat' => 'Yosodadi, Metro Timur',
            'status_tutor' => 'Aktif',
        ]);

        // 5. Rombongan Belajar (Kelas) Paket A, B, C
        $kelasA = Kelas::create([
            'tahun_ajaran_id' => $ta->id,
            'tutor_id' => $tutor1->id,
            'nama_kelas' => 'Kelas Paket A (Setara SD)',
            'program_paket' => 'Paket A',
        ]);

        $kelasB = Kelas::create([
            'tahun_ajaran_id' => $ta->id,
            'tutor_id' => $tutor2->id,
            'nama_kelas' => 'Kelas Paket B (Setara SMP)',
            'program_paket' => 'Paket B',
        ]);

        $kelasC = Kelas::create([
            'tahun_ajaran_id' => $ta->id,
            'tutor_id' => $tutor1->id,
            'nama_kelas' => 'Kelas Paket C (Setara SMA)',
            'program_paket' => 'Paket C',
        ]);

        // 6. Kurikulum Modul Mata Pelajaran Kesetaraan
        $mapels = [
            ['kode' => 'MAP-BIN', 'nama' => 'Bahasa Indonesia', 'paket' => 'Semua', 'kkm' => 70.00],
            ['kode' => 'MAP-MAT', 'nama' => 'Matematika Terapan', 'paket' => 'Semua', 'kkm' => 70.00],
            ['kode' => 'MAP-PKN', 'nama' => 'Pendidikan Kewarganegaraan', 'paket' => 'Semua', 'kkm' => 75.00],
            ['kode' => 'MAP-PAI', 'nama' => 'Pendidikan Agama Islam', 'paket' => 'Semua', 'kkm' => 75.00],
            ['kode' => 'MAP-IPA', 'nama' => 'Ilmu Pengetahuan Alam', 'paket' => 'Paket B', 'kkm' => 70.00],
            ['kode' => 'MAP-IPS', 'nama' => 'Ilmu Pengetahuan Sosial', 'paket' => 'Paket B', 'kkm' => 70.00],
            ['kode' => 'MAP-BIG', 'nama' => 'Bahasa Inggris', 'paket' => 'Paket C', 'kkm' => 70.00],
            ['kode' => 'MAP-KTR', 'nama' => 'Keterampilan Fungsional & Kewirausahaan', 'paket' => 'Semua', 'kkm' => 75.00],
            ['kode' => 'MAP-PBD', 'nama' => 'Pemberdayaan Masyarakat', 'paket' => 'Paket C', 'kkm' => 75.00],
        ];

        foreach ($mapels as $m) {
            MataPelajaran::create([
                'kode_mapel' => $m['kode'],
                'nama_mapel' => $m['nama'],
                'program_paket' => $m['paket'],
                'kkm' => $m['kkm'],
            ]);
        }

        // 7. Berita Awal / Pengumuman PPDB
        Berita::create([
            'user_id' => $admin->id,
            'judul' => 'Penerimaan Peserta Didik Baru (PPDB) Online PKBM Al Suroya Telah Dibuka',
            'slug' => 'penerimaan-peserta-didik-baru-ppdb-online-pkbm-al-suroya-telah-dibuka',
            'kategori' => 'Pengumuman',
            'ringkasan' => 'PKBM Al Suroya Metro Timur membuka pendaftaran calon warga belajar baru untuk Program Paket A, Paket B, dan Paket C secara daring melalui website.',
            'konten' => '<p>Kabar gembira bagi masyarakat Kota Metro dan sekitarnya. Kini pendaftaran peserta didik baru di PKBM Al Suroya dapat dilakukan secara online langsung melalui website resmi tanpa perlu datang langsung di tahap awal.</p><p>Program yang tersedia mencakup:</p><ul><li>Paket A (Setara SD)</li><li>Paket B (Setara SMP)</li><li>Paket C (Setara SMA)</li></ul><p>Silakan akses menu Pendaftaran untuk melengkapi formulir identitas dan mengunggah berkas persyaratan.</p>',
            'thumbnail' => null,
            'is_published' => true,
        ]);

        // 8. Sarana & Fasilitas PKBM
        Fasilitas::create([
            'nama_fasilitas' => 'Ruang Belajar & Tutorial Nyaman',
            'deskripsi' => 'Ruang kelas representatif berpendingin udara untuk kenyamanan proses tatap muka dan pembelajaran tutorial kelompok.',
            'gambar' => 'fasilitas_kelas.jpg',
        ]);
        Fasilitas::create([
            'nama_fasilitas' => 'Laboratorium Komputer & Internet',
            'deskripsi' => 'Dilengkapi unit komputer terkoneksi internet cepat untuk menunjang pembelajaran TIK, ANBK, dan pelatihan keterampilan digital.',
            'gambar' => 'fasilitas_lab.jpg',
        ]);
        Fasilitas::create([
            'nama_fasilitas' => 'Perpustakaan & Pojok Baca Modul',
            'deskripsi' => 'Koleksi lengkap modul kesetaraan Kemendikbudristek dan buku-buku keterampilan praktis.',
            'gambar' => 'fasilitas_perpus.jpg',
        ]);

        // 9. Prestasi Lembaga & Siswa
        Prestasi::create([
            'nama_prestasi' => 'Juara I Lomba Apresiasi Vokasi Warga Belajar Kesetaraan',
            'peraih' => 'Warga Belajar Paket C PKBM Al Suroya',
            'tingkat' => 'Kota',
            'tahun' => 2024,
            'deskripsi' => 'Prestasi dalam bidang inovasi produk wirausaha olahan pangan lokal.',
            'gambar' => null,
        ]);
    }
}
