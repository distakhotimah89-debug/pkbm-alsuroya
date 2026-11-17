# ANALISIS EVALUASI DAN KELEMAHAN DESAIN DATABASE (ERD/CLASS DIAGRAM) PENELITIAN SEBELUMNYA

Berdasarkan peninjauan dokumen halaman 55 sampai 59 (Class Diagram & Kamus Data Tabel 14-17), ditemukan sejumlah kelemahan kritis baik dari aspek **logika database**, **kesesuaian dengan studi kasus PKBM**, **kaidah Laravel & UML**, maupun **validasi data di lapangan**.

---

## 1. Kelemahan Fatal Tipe Data (Potential Crash / Data Overflow)

### a. Penggunaan `INT(11)` untuk NIK dan Nomor KK (Tabel `data_murids`)
- **Kondisi Saat Ini**: Kolom `nik` dan `no_kk` menggunakan tipe data `INT(11)`.
- **Kelemahan Fatal**:
  - Di Indonesia, NIK dan No. KK memiliki panjang **16 digit angka**.
  - Nilai maksimum untuk `INT(11)` bertanda (*signed*) pada MySQL adalah **2.147.483.647** (maksimal hanya 10 digit).
  - Ketika calon siswa menginput 16 digit NIK (misal: `187105...`), MySQL akan mengalami **Out of Range / Numeric Overflow Error** atau nilai akan dipotong menjadi `2147483647`. Akibatnya, pendaftaran pasti gagal atau data identitas kependudukan menjadi korup.
- **Solusi/Perbaikan**: Ubah tipe data menjadi `VARCHAR(16)`. Nomor identitas tidak digunakan untuk operasi matematika, dan penyimpanan sebagai teks menjaga keutuhan angka jika berawalan 0.

### b. Tipe Data Jenis Kelamin (`jk`) Menggunakan `INT(11)`
- **Kondisi Saat Ini**: Kolom `jk` bertipe `INT(11)`.
- **Kelemahan**: Sangat tidak efisien dan tidak semantik. Menyimpan jenis kelamin (Laki-laki / Perempuan) dengan alokasi integer 11 digit adalah pemborosan memori dan membingungkan pengembang lain (apakah 1 = Pria atau Wanita?).
- **Solusi/Perbaikan**: Gunakan `ENUM('Laki-laki', 'Perempuan')` atau `ENUM('L', 'P')`.

---

## 2. Ketidaksesuaian dengan Kebutuhan PKBM Al Suroya (Business Logic Gap)

### a. Tidak Ada Pilihan Program Kesetaraan (Paket A, B, C)
- **Kondisi Saat Ini**: Di tabel `data_murids`, terdapat kolom `jenis_kursus` dan `asal_sekolah`.
- **Kelemahan**:
  - Pada BAB 1 ditegaskan bahwa PKBM Al Suroya menyediakan **Paket A (setara SD), Paket B (setara SMP), dan Paket C (setara SMA)**.
  - Namun di database **tidak ada field pilihan jenjang paket** yang didaftar oleh calon siswa.
  - Munculnya field `jenis_kursus` mengindikasikan bahwa tabel ini kemungkinan hasil salinan (*copy-paste*) dari sistem kursus/pelatihan lain, bukan sistem PKBM Kesetaraan.
- **Solusi/Perbaikan**: Hapus/ganti `jenis_kursus` dengan `program_paket` bertipe `ENUM('Paket A', 'Paket B', 'Paket C')`.

### b. Tidak Ada Tabel untuk Fitur Profil Website (*Content Management*)
- **Kondisi Saat Ini**: Database hanya memiliki 4 tabel: `users`, `data_murids`, `berkas_murids`, `data_orang_tuas`.
- **Kelemahan**:
  - Di BAB 1 & Batasan Masalah dijanjikan bahwa sistem memiliki sisi *Front-end* untuk profil lembaga, visi & misi, fasilitas, prestasi, dan berita/informasi kegiatan yang dikelola oleh admin.
  - Tanpa tabel konten (misal: tabel `berita`/`artikel`, `fasilitas`, `prestasi`), semua data di halaman profil akan bersifat statis (*hardcoded* di blade template). Admin tidak akan bisa menambah berita atau mengubah profil tanpa mengedit kode sumber program.
- **Solusi/Perbaikan**: Tambahkan tabel pendukung konten website, minimal:
  - `artikels` / `beritas` (id, judul, slug, konten, gambar, penulis_id, created_at, dll.)
  - `fasilitas` / `prestasis` atau tabel pengaturan umum.

---

## 3. Masalah Fleksibilitas & Aturan `NOT NULL` (Form Validation Trap)

### a. Kewajiban Seluruh Berkas `Null: No` (Tabel `berkas_murids`)
- **Kondisi Saat Ini**: Semua kolom berkas (`kartu_keluarga`, `akte_kelahiran`, `foto`, `ijazah`, `ktp`) berstatus `Null: No` (*mandatory*).
- **Kelemahan**:
  - Calon siswa Paket A (setara SD) adalah anak-anak di bawah 17 tahun yang **belum memiliki KTP**.
  - Siswa yang belum pernah bersekolah sama sekali tidak memiliki **Ijazah**.
  - Jika seluruh kolom ini disetel `Null: No`, calon siswa Paket A atau yang belum ber-KTP tidak akan pernah bisa mengirim formulir pendaftaran.
- **Solusi/Perbaikan**: Jadikan kolom `ktp` dan `ijazah` bersifat `nullable()` (opsional tergantung jenjang yang dipilih).

### b. Data Orang Tua Memaksa Ayah dan Ibu Harus Lengkap (Tabel `data_orang_tuas`)
- **Kondisi Saat Ini**: Seluruh atribut ayah (`nama_ayah`, `tgl_ayah`, `pendidikan_ayah`, `telp_ayah`, `pekerjaan_ayah`, `alamat_ayah`) dan atribut ibu berstatus `Null: No`.
- **Kelemahan**:
  - Sistem tidak mengakomodasi calon siswa yang berstatus **yatim, piatu, atau yatim-piatu**.
  - Sistem juga tidak menyediakan atribut untuk **Wali** bagi siswa yang tinggal bersama paman/kakek/wali lainnya.
- **Solusi/Perbaikan**: Jadikan data orang tua lebih fleksibel (`nullable`) dan sediakan opsi data wali (*guardian*).

### c. Kolom Autentikasi Bawaan Laravel yang Diberi `NOT NULL` (Tabel `users`)
- **Kondisi Saat Ini**:
  - `foto_profile`: `Null: No`
  - `email_verified_at`: `Null: No`
  - `remember_token`: `Null: No`
- **Kelemahan**:
  - Pada standar Laravel, saat pengguna baru registrasi, `email_verified_at` bernilai `NULL` sampai diverifikasi.
  - `remember_token` juga bernilai `NULL` saat akun baru dibuat.
  - Jika diberi `Null: No` tanpa nilai default, fitur registrasi bawaan Laravel (`Auth::routes()` / Breeze / Fortify) akan melempar SQL Error *Integrity constraint violation*.
- **Solusi/Perbaikan**: Atur `foto_profile`, `email_verified_at`, dan `remember_token` menjadi `nullable()`.

---

## 4. Kelemahan Struktur Kardinalitas & Relasi Database

### a. Kesalahan Kardinalitas (*One-to-Many* vs *One-to-One*)
- **Kondisi Saat Ini**: Di Class Diagram digambarkan relasi dari `users` (1) ke `data_murids` (N), `berkas_murids` (N), dan `data_orang_tuas` (N).
- **Kelemahan**:
  - Satu akun siswa (`users`) dalam sistem PPDB hanya memiliki **1 data profil murid**, **1 paket berkas pendaftaran**, dan **1 entitas data orang tua**.
  - Menggambarkan kardinalitas 1 ke N menyiratkan satu akun user bisa memiliki banyak data diri murid yang berbeda, yang secara logika pendaftaran tidak valid.
- **Solusi/Perbaikan**: Hubungan yang benar adalah **One-to-One (1 : 1)**.

### b. Normalisasi Relasi yang Kurang Tepat
- **Kondisi Saat Ini**: Ketiga tabel anak (`data_murids`, `berkas_murids`, `data_orang_tuas`) semuanya memegang `user_id` secara terpisah.
- **Kelemahan**:
  - Berkas pendaftaran dan data orang tua sebenarnya melekat pada **Data Siswa/Pendaftaran**, bukan langsung ke entitas akun `users`.
  - Jika kelak ada tabel `pendaftarans` (transaksi pendaftaran dengan status: *draft, pending, diverifikasi, diterima, ditolak*), relasi ke berkas seharusnya menginduk ke ID pendaftaran/siswa.

---

## 5. Kerancuan Konseptual Diagram & Kaidah Notasi

1. **Pencampuran ERD Database dan Class Diagram UML**:
   - Di dokumen diberi judul **Class Diagram**, tetapi isinya adalah representasi tabel database fisik (memiliki tipe data MySQL, Primary Key, Foreign Key).
   - Namun di bagian metode hanya ada 3 method seragam di semua kelas: `+ create()`, `- delete()`, `- update()`, yang tidak merefleksikan *behavior* / *method* OOP sebenarnya pada Controller/Model Laravel.
2. **Keterangan Istilah Kurang Standar**:
   - Tertulis `Ket: * Primary key, ** Secondary key`.
   - Istilah baku dalam basis data maupun UML adalah **Foreign Key (FK)**, bukan *Secondary Key*.
3. **Ketidaksesuaian Nomor Gambar**:
   - Judul gambar tertulis **Gambar 25. Class Diagram**, namun pada teks paragraf penjelas di bawahnya tertulis: *"Berdasarkan gambar 24. Class Diagram..."*.
4. **Tipe Data `ENUM` Tanpa Nilai Spesifik di Dokumen**:
   - Tipe data `Enum` dicantumkan pada kolom `role`, `status`, `agama`, `pendidikan_ayah`, `pekerjaan_ayah`, dan `proses`, tetapi daftar nilai pilihannya (*allowed values*) tidak dijelaskan sama sekali di tabel rancangan basis data.

