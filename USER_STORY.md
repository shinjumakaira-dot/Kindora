# USER STORY --- KINDORA

**Platform Donasi Barang Layak Pakai Berbasis Cloud untuk Masyarakat**

## 1. Gambaran Umum Pengguna

Kindora merupakan platform berbagi barang layak pakai secara
peer-to-peer. Setiap pengguna hanya memiliki satu akun yang dapat
digunakan untuk dua aktivitas, yaitu memberikan donasi barang kepada
pengguna lain dan mengajukan barang donasi yang tersedia di platform.

Pengguna tidak perlu memilih atau mendaftarkan diri sebagai Donatur
maupun Penerima. Ketika seseorang ingin memberikan barang, ia dapat
menggunakan akun yang sama untuk mengunggah barang donasi. Ketika
membutuhkan barang milik pengguna lain, ia dapat menggunakan akun
tersebut untuk mengajukan barang.

Seluruh aktivitas dilakukan melalui aplikasi Kindora tanpa perantara
Admin. Pemilik barang dapat melihat, menerima, atau menolak pengajuan
secara langsung.

<div>

------------------------------------------------------------------------

</div>

# 2. USER STORY BERDASARKAN PERJALANAN PENGGUNA

## US-01 --- Membuka Aplikasi dan Mengenali Kindora

Pengguna menemukan ikon aplikasi Kindora pada perangkatnya. Ketika
mengeklik ikon tersebut atau membuka alamat website Kindora, aplikasi
mulai dimuat dan menampilkan halaman awal.

Pada halaman awal, pengguna melihat logo Kindora, nama aplikasi, serta
tampilan visual yang menggambarkan platform berbagi barang layak pakai.
Pengguna dapat mengenali identitas aplikasi melalui warna, ilustrasi,
tipografi, dan elemen visual yang konsisten.

Selanjutnya, pengguna melihat pilihan untuk masuk ke akun atau membuat
akun baru. Jika pengguna belum memiliki akun, ia dapat memilih tombol
Daftar. Jika sudah memiliki akun, pengguna dapat memilih tombol Login.

**Proses Frontend:**

-   Menampilkan halaman awal dan identitas visual Kindora.

-   Menampilkan tombol Login dan Daftar.

-   Menyediakan navigasi menuju halaman autentikasi.

-   Menampilkan layout yang menyesuaikan perangkat pengguna.

**Proses Backend:**

-   Menyediakan layanan backend yang dapat diakses oleh frontend.

-   Menyiapkan endpoint autentikasi yang akan digunakan pada proses
    login dan registrasi.

-   Tidak memerlukan penyimpanan data pengguna sebelum pengguna
    melakukan registrasi.

## US-02 --- Mendaftarkan Akun Baru

Ketika pengguna belum memiliki akun, pengguna memilih tombol Daftar pada
halaman awal. Aplikasi kemudian menampilkan halaman registrasi yang
berisi formulir pembuatan akun.

Pengguna diminta mengisi nama lengkap, alamat email, dan password. Tidak
terdapat pilihan role Donatur maupun Penerima karena setiap akun Kindora
dapat melakukan kedua aktivitas tersebut.

Setelah seluruh data diisi, pengguna mengeklik tombol Daftar. Aplikasi
memeriksa kelengkapan dan format input sebelum mengirimkan data
registrasi ke backend.

Backend menerima data tersebut dan melakukan validasi kembali. Sistem
memeriksa apakah nama dan email telah diisi, apakah format email benar,
serta apakah email belum digunakan oleh akun lain. Password diproses
menggunakan mekanisme hashing Laravel sebelum disimpan ke database.

Jika seluruh data valid, backend menyimpan akun baru dan mengirimkan
respons keberhasilan. Aplikasi kemudian menampilkan pemberitahuan bahwa
registrasi berhasil dan mengarahkan pengguna ke halaman Login atau
melanjutkan ke proses autentikasi sesuai alur yang diterapkan.

Jika registrasi gagal, misalnya karena email sudah digunakan atau
password tidak memenuhi ketentuan, aplikasi menampilkan pesan kesalahan
pada formulir agar pengguna dapat memperbaiki datanya.

**Proses Frontend:**

-   Menampilkan halaman dan formulir registrasi.

-   Menyediakan input nama, email, dan password.

-   Menyediakan tombol Daftar.

-   Memeriksa input sebelum dikirim.

-   Menampilkan pesan keberhasilan atau kesalahan dari backend.

-   Mengarahkan pengguna setelah registrasi berhasil.

**Proses Backend:**

-   Menyediakan API registrasi.

-   Memvalidasi nama, email, dan password.

-   Memeriksa keunikan email.

-   Melakukan hashing password.

-   Menyimpan data akun ke tabel users.

-   Mengirimkan respons JSON sesuai hasil registrasi.

## US-03 --- Login ke Aplikasi Kindora

Setelah memiliki akun, pengguna membuka halaman Login. Pada halaman
tersebut, pengguna melihat formulir yang meminta alamat email dan
password.

Pengguna memasukkan email dan password yang telah didaftarkan, kemudian
mengeklik tombol Login. Frontend memvalidasi kelengkapan input dan
mengirimkan kredensial ke API backend.

Backend memeriksa apakah email terdaftar dan mencocokkan password
menggunakan mekanisme verifikasi yang aman. Jika data sesuai, backend
mengautentikasi pengguna dan memberikan respons autentikasi sesuai
mekanisme yang digunakan, misalnya Laravel Sanctum.

Frontend menyimpan status autentikasi sesuai mekanisme tersebut dan
mengarahkan pengguna ke halaman Beranda.

Jika email atau password salah, aplikasi menampilkan pesan bahwa proses
login gagal. Pengguna dapat memperbaiki data dan mencoba kembali.

Jika pengguna belum memiliki akun, tersedia tautan menuju halaman
registrasi. Jika pengguna lupa password, tersedia pilihan Lupa Password
apabila fitur tersebut masuk cakupan MVP.

**Proses Frontend:**

-   Menampilkan formulir Login.

-   Menyediakan input email dan password.

-   Menampilkan tombol Login.

-   Menampilkan pesan ketika login gagal atau berhasil.

-   Mengelola status autentikasi.

-   Mengarahkan pengguna yang berhasil login ke Beranda.

**Proses Backend:**

-   Menyediakan API login.

-   Memvalidasi kredensial pengguna.

-   Memverifikasi password terhadap password yang tersimpan dalam bentuk
    hash.

-   Membuat autentikasi menggunakan mekanisme yang dipilih.

-   Mengirimkan respons autentikasi.

-   Menangani kredensial yang tidak valid.

## US-04 --- Mengakses Beranda Kindora

Setelah berhasil login, pengguna diarahkan ke halaman Beranda. Pada
bagian atas halaman, pengguna melihat sapaan yang disesuaikan dengan
nama akun yang sedang digunakan.

Pengguna juga melihat banner ajakan berdonasi yang menginformasikan
bahwa barang layak pakai dapat diberikan kepada orang lain yang
membutuhkan. Ketika mengeklik banner tersebut, pengguna diarahkan menuju
halaman atau formulir Donasi.

Di bawah banner, pengguna melihat kategori pilihan, seperti pakaian,
buku, perlengkapan sekolah, mainan, dan peralatan rumah tangga. Pengguna
dapat memilih salah satu kategori untuk melihat barang yang sesuai.

Selanjutnya, halaman menampilkan daftar donasi terbaru dalam bentuk
card. Setiap card memperlihatkan foto barang, nama barang, kategori,
kondisi, lokasi, dan informasi status sesuai data yang tersedia.

Pengguna juga dapat menggunakan search bar untuk mencari barang
berdasarkan kata kunci. Ketika pengguna memilih salah satu card,
aplikasi mengarahkan pengguna ke halaman Detail Barang.

Seluruh informasi pada halaman Beranda diambil dari backend sehingga
data yang ditampilkan merupakan data aktual dari database, bukan sekadar
data contoh.

**Proses Frontend:**

-   Menampilkan sapaan berdasarkan nama pengguna.

-   Menampilkan banner ajakan berdonasi.

-   Menampilkan kategori barang.

-   Menampilkan daftar donasi terbaru dalam bentuk card.

-   Menyediakan search bar.

-   Mengarahkan pengguna dari banner, kategori, dan card ke halaman
    terkait.

-   Menampilkan kondisi loading, data kosong, dan kegagalan memuat data.

**Proses Backend:**

-   Menyediakan API ringkasan Beranda.

-   Mengambil informasi pengguna yang sedang login.

-   Menyediakan API kategori barang.

-   Mengambil daftar donasi terbaru.

-   Mengirimkan data barang yang sesuai untuk ditampilkan frontend.

-   Menangani permintaan pencarian berdasarkan kata kunci.

## US-05 --- Melihat Katalog dan Mencari Barang Donasi

Ketika pengguna memilih menu Katalog pada navigasi utama, aplikasi
menampilkan halaman katalog yang berisi daftar barang donasi.

Pengguna dapat melihat barang dalam bentuk grid atau list. Setiap barang
ditampilkan melalui card yang berisi foto, nama barang, kategori,
kondisi, lokasi, dan status ketersediaan.

Jika pengguna ingin mencari barang tertentu, pengguna dapat mengetikkan
nama atau kata kunci pada kolom pencarian. Setelah pencarian dilakukan,
aplikasi mengirimkan kata kunci ke backend dan menampilkan barang yang
sesuai dengan hasil pencarian.

Pengguna juga dapat menggunakan fitur filter kategori untuk mempersempit
daftar barang, misalnya hanya menampilkan pakaian atau buku. Selain itu,
pengguna dapat mengurutkan barang berdasarkan tanggal terbaru.

Jika pengguna memilih salah satu barang, aplikasi membuka halaman detail
barang tersebut.

Apabila tidak terdapat barang yang sesuai dengan pencarian atau filter,
aplikasi menampilkan pemberitahuan bahwa barang tidak ditemukan. Jika
katalog sedang memuat data atau terjadi kegagalan koneksi, aplikasi
menampilkan indikator loading atau pesan kesalahan.

Barang yang sudah tidak tersedia atau tidak dapat diajukan tidak
ditampilkan sebagai barang yang tersedia untuk diajukan.

**Proses Frontend:**

-   Menampilkan halaman katalog.

-   Menampilkan daftar barang dalam bentuk grid atau list.

-   Menyediakan pencarian barang.

-   Menyediakan filter kategori.

-   Menyediakan pengurutan berdasarkan tanggal terbaru.

-   Menampilkan status barang.

-   Menampilkan kondisi loading, kosong, dan error.

**Proses Backend:**

-   Menyediakan API katalog.

-   Mengambil data barang yang dapat ditampilkan kepada pengguna.

-   Menyediakan pencarian berdasarkan nama atau kata kunci.

-   Memproses filter kategori.

-   Mengurutkan data berdasarkan tanggal terbaru.

-   Memvalidasi parameter pencarian dan filter.

-   Mengirimkan data katalog dalam format JSON.

## US-06 --- Melihat Detail Barang Donasi

Ketika pengguna menemukan barang yang menarik pada halaman Beranda atau
Katalog, pengguna mengeklik card barang tersebut.

Aplikasi kemudian menampilkan halaman Detail Barang. Pada halaman ini,
pengguna melihat foto barang, nama barang, kategori, kondisi, berat jika
tersedia, lokasi, deskripsi, serta informasi singkat pemilik barang.

Pengguna dapat membaca deskripsi untuk memahami kondisi dan informasi
tambahan mengenai barang yang akan diajukan.

Jika barang masih tersedia, aplikasi menampilkan tombol Ajukan Barang.
Ketika pengguna mengeklik tombol tersebut, aplikasi mengarahkan pengguna
ke formulir pengajuan yang telah memuat ringkasan barang yang dipilih.

Jika barang sudah tidak tersedia atau statusnya berubah ketika pengguna
membuka detail, aplikasi menampilkan status terbaru dan tidak
mengizinkan pengajuan terhadap barang tersebut.

**Proses Frontend:**

-   Menampilkan detail barang.

-   Menampilkan foto dan informasi barang.

-   Menampilkan profil singkat pemilik barang.

-   Menampilkan status ketersediaan.

-   Menyediakan tombol Ajukan Barang jika barang dapat diajukan.

-   Mengarahkan pengguna menuju formulir pengajuan.

**Proses Backend:**

-   Menyediakan API detail barang.

-   Mengambil informasi barang berdasarkan identitas barang.

-   Mengambil informasi pemilik barang yang berkaitan.

-   Memastikan data status barang yang dikirimkan merupakan status
    terbaru.

-   Mengirimkan detail barang dalam respons API.

## US-07 --- Memberikan Donasi Barang

Pengguna yang ingin memberikan barang layak pakai membuka menu Donasi
melalui bottom navigation. Aplikasi menampilkan halaman pengelolaan
donasi milik pengguna.

Pada halaman tersebut, pengguna dapat melihat daftar barang yang pernah
didonasikan beserta foto, nama barang, kategori, tanggal pengunggahan,
dan status barang.

Untuk menambahkan donasi baru, pengguna mengeklik tombol Tambah Barang
Donasi. Aplikasi menampilkan formulir yang berisi input foto, nama
barang, kategori, kondisi, deskripsi, dan lokasi donasi.

Pengguna mengisi informasi barang sesuai kondisi sebenarnya. Ketika
memilih foto, aplikasi menampilkan pratinjau gambar agar pengguna dapat
memastikan foto yang akan diunggah sudah benar.

Setelah semua informasi terisi, pengguna mengeklik tombol Simpan atau
Tambahkan Donasi. Frontend memvalidasi formulir dan mengirimkan data
beserta gambar ke backend.

Backend memvalidasi data yang diterima, termasuk kelengkapan informasi,
kategori, kondisi, lokasi, serta jenis dan ukuran file gambar. Jika data
valid, backend menyimpan informasi barang dan file gambar menggunakan
mekanisme penyimpanan yang dipilih.

Setelah penyimpanan berhasil, backend mengirimkan respons keberhasilan.
Frontend menampilkan pemberitahuan bahwa barang berhasil didonasikan dan
memperbarui daftar donasi milik pengguna.

Jika terjadi kesalahan, aplikasi menampilkan pesan yang sesuai agar
pengguna dapat memperbaiki data atau mengulangi proses.

**Proses Frontend:**

-   Menampilkan halaman Donasi.

-   Menampilkan daftar donasi milik pengguna.

-   Menyediakan tombol Tambah Barang Donasi.

-   Menampilkan formulir tambah barang.

-   Menyediakan unggah foto dan pratinjau gambar.

-   Melakukan validasi input.

-   Menampilkan notifikasi keberhasilan atau kegagalan.

-   Memperbarui daftar donasi setelah berhasil disimpan.

**Proses Backend:**

-   Menyediakan API daftar donasi milik pengguna.

-   Menyediakan API tambah barang donasi.

-   Memvalidasi data barang.

-   Memvalidasi dan menyimpan gambar.

-   Menyimpan informasi barang ke database.

-   Menghubungkan barang dengan pemiliknya melalui user_id.

-   Mengatur status awal barang sesuai aturan sistem.

-   Mengirimkan respons hasil penyimpanan.

## US-08 --- Mengedit dan Menghapus Barang Donasi

Pengguna membuka menu Donasi untuk melihat daftar barang yang pernah
diunggah. Jika pengguna ingin memperbarui informasi salah satu barang,
pengguna memilih barang tersebut dan mengeklik tombol Edit.

Aplikasi menampilkan formulir edit yang sudah terisi dengan informasi
barang sebelumnya, seperti foto, nama, kategori, kondisi, deskripsi, dan
lokasi.

Pengguna dapat mengubah informasi yang diperlukan. Jika pengguna
mengganti foto, aplikasi menampilkan pratinjau foto yang baru.

Setelah selesai, pengguna mengeklik tombol Simpan Perubahan. Frontend
mengirimkan data terbaru ke backend. Backend memeriksa validitas data
dan memastikan bahwa barang tersebut benar-benar milik pengguna yang
sedang login serta masih dapat diubah berdasarkan statusnya.

Jika berhasil, backend memperbarui data barang pada database dan
frontend menampilkan informasi terbaru.

Jika pengguna ingin menghapus barang, pengguna memilih tombol Hapus.
Aplikasi menampilkan konfirmasi agar pengguna tidak menghapus barang
secara tidak sengaja. Setelah pengguna menyetujui penghapusan, frontend
mengirimkan permintaan ke backend.

Backend memeriksa kepemilikan barang dan aturan penghapusan berdasarkan
status serta pengajuan yang sedang berjalan. Jika penghapusan
diperbolehkan, backend menghapus atau menonaktifkan data sesuai
kebijakan sistem dan mengirimkan respons kepada frontend.

**Proses Frontend:**

-   Menampilkan daftar donasi milik pengguna.

-   Menyediakan tombol Edit dan Hapus.

-   Menampilkan formulir edit dengan data sebelumnya.

-   Menyediakan pratinjau gambar baru.

-   Menampilkan konfirmasi sebelum menghapus.

-   Memperbarui daftar setelah proses berhasil.

-   Menampilkan pesan keberhasilan atau kegagalan.

**Proses Backend:**

-   Menyediakan API detail barang milik pengguna.

-   Menyediakan API pembaruan barang.

-   Menyediakan API penghapusan barang.

-   Memvalidasi data perubahan.

-   Memeriksa kepemilikan barang.

-   Memeriksa status barang dan pengajuan terkait.

-   Menangani perubahan data dan gambar.

-   Mencegah perubahan atau penghapusan yang tidak sesuai aturan sistem.

## US-09 --- Mengajukan Barang Donasi

Ketika pengguna menemukan barang yang dibutuhkan, pengguna membuka
halaman Detail Barang dan mengeklik tombol Ajukan Barang.

Aplikasi menampilkan formulir pengajuan yang memuat ringkasan barang
yang dipilih agar pengguna dapat memastikan barang yang diajukan sudah
benar.

Selanjutnya, pengguna diminta mengisi alasan membutuhkan barang.
Pengguna juga mengisi informasi penerima dan alamat tujuan, meliputi
nama, nomor HP, alamat lengkap, RT/RW, desa atau kelurahan, kecamatan,
kota atau kabupaten, dan kode pos.

Setelah seluruh informasi diisi, pengguna mengeklik tombol Kirim
Pengajuan. Frontend memvalidasi formulir dan mengirimkan data pengajuan
ke backend.

Backend memeriksa apakah barang masih tersedia, apakah pengguna sudah
login, apakah pengguna mengajukan barang miliknya sendiri, serta apakah
data pengajuan telah memenuhi ketentuan.

Jika pengajuan valid, backend menyimpan data pengajuan dengan status
awal Menunggu Respons dan menghubungkannya dengan barang serta akun
pengguna yang mengajukan.

Frontend kemudian menampilkan pemberitahuan bahwa pengajuan berhasil
dikirim. Pengguna dapat membuka halaman riwayat pengajuan untuk melihat
barang yang telah diajukan dan status masing-masing pengajuan.

Jika barang tidak lagi tersedia, data tidak valid, atau pengguna mencoba
mengajukan barang miliknya sendiri, sistem menolak pengajuan dan
menampilkan pesan yang sesuai.

**Proses Frontend:**

-   Menampilkan formulir pengajuan.

-   Menampilkan ringkasan barang yang dipilih.

-   Menyediakan input alasan membutuhkan barang.

-   Menyediakan formulir informasi penerima dan alamat.

-   Melakukan validasi formulir.

-   Menampilkan notifikasi hasil pengajuan.

-   Menyediakan halaman riwayat pengajuan.

-   Menampilkan status pengajuan.

**Proses Backend:**

-   Menyediakan API pengajuan barang.

-   Memvalidasi barang yang diajukan.

-   Memvalidasi alasan kebutuhan dan informasi alamat.

-   Memastikan barang masih tersedia.

-   Mencegah pengajuan terhadap barang milik sendiri.

-   Menyimpan data pengajuan dan relasinya.

-   Menentukan status awal pengajuan.

-   Menyediakan API riwayat pengajuan milik pengguna.

## US-10 --- Melihat dan Merespons Pengajuan Barang

Pengguna yang memiliki barang donasi membuka menu Donasi dan melihat
daftar barang yang telah diunggah. Jika terdapat pengguna lain yang
mengajukan salah satu barang miliknya, aplikasi menampilkan informasi
atau pemberitahuan bahwa terdapat pengajuan baru.

Pemilik barang memilih pengajuan tersebut untuk melihat detailnya.
Aplikasi menampilkan informasi barang yang diajukan, alasan pengguna
membutuhkan barang, nama pemohon, nomor HP, serta alamat tujuan yang
telah diberikan.

Setelah membaca informasi tersebut, pemilik barang dapat menentukan
apakah pengajuan akan diterima atau ditolak.

Jika pemilik barang memilih tombol Terima, aplikasi meminta konfirmasi
keputusan. Setelah dikonfirmasi, frontend mengirimkan permintaan ke
backend untuk memperbarui status pengajuan.

Backend memeriksa apakah pemilik yang memberikan respons benar-benar
pemilik barang, apakah pengajuan masih menunggu respons, dan apakah
barang masih tersedia. Jika seluruh kondisi terpenuhi, backend
memperbarui status pengajuan menjadi Diterima dan mengubah status barang
sesuai aturan sistem.

Jika pemilik memilih tombol Tolak, backend memperbarui status pengajuan
menjadi Ditolak. Barang dapat tetap tersedia untuk diajukan pengguna
lain sesuai aturan sistem.

Frontend kemudian menampilkan hasil keputusan tersebut. Pengguna yang
mengajukan barang juga dapat melihat perubahan status melalui riwayat
pengajuan.

Tidak terdapat proses persetujuan Admin. Keputusan diberikan langsung
oleh pemilik barang melalui aplikasi.

**Proses Frontend:**

-   Menampilkan daftar pengajuan yang berkaitan dengan barang milik
    pengguna.

-   Menampilkan detail informasi pengajuan.

-   Menyediakan tombol Terima dan Tolak.

-   Menampilkan konfirmasi keputusan.

-   Menampilkan status terbaru pengajuan dan barang.

-   Memperbarui informasi setelah pemilik memberikan respons.

**Proses Backend:**

-   Menyediakan API daftar pengajuan yang diterima oleh pemilik barang.

-   Menyediakan API detail pengajuan.

-   Menyediakan API penerimaan dan penolakan pengajuan.

-   Memeriksa kepemilikan barang.

-   Memeriksa status pengajuan dan ketersediaan barang.

-   Memperbarui status pengajuan dan barang.

-   Mencegah satu barang dialokasikan kepada lebih dari satu penerima
    secara bersamaan.

-   Memastikan pengguna hanya dapat mengakses pengajuan yang berkaitan
    dengan akunnya.

## US-11 --- Melihat Riwayat Pengajuan Barang

Setelah mengajukan barang, pengguna dapat membuka halaman riwayat
pengajuan untuk mengetahui perkembangan permintaan yang telah
dikirimkan.

Pada halaman tersebut, pengguna melihat daftar barang yang pernah
diajukan beserta nama barang, foto, tanggal pengajuan, dan status
terbaru.

Jika status pengajuan masih Menunggu Respons, pengguna mengetahui bahwa
pemilik barang belum memberikan keputusan. Jika status berubah menjadi
Diterima atau Ditolak, aplikasi menampilkan status tersebut pada daftar
pengajuan.

Ketika pengguna memilih salah satu pengajuan, aplikasi menampilkan
detail pengajuan dan informasi barang yang berkaitan.

Data riwayat diambil dari backend berdasarkan akun yang sedang login.
Dengan demikian, pengguna hanya melihat riwayat pengajuan miliknya
sendiri.

**Proses Frontend:**

-   Menampilkan daftar riwayat pengajuan.

-   Menampilkan foto dan nama barang.

-   Menampilkan tanggal pengajuan.

-   Menampilkan status pengajuan.

-   Menampilkan detail pengajuan ketika dipilih.

-   Menangani kondisi riwayat kosong dan kegagalan memuat data.

**Proses Backend:**

-   Menyediakan API riwayat pengajuan.

-   Mengambil data pengajuan berdasarkan user_id pengguna yang login.

-   Mengambil informasi barang yang berkaitan.

-   Mengirimkan status terbaru pengajuan.

-   Membatasi akses agar pengguna tidak dapat melihat riwayat milik akun
    lain.

## US-12 --- Mengakses Halaman Profil

Pengguna memilih menu Profil pada bottom navigation. Aplikasi
menampilkan halaman profil yang berisi foto profil, nama pengguna, nomor
telepon, dan alamat email.

Pengguna dapat melihat informasi akun yang sedang digunakan. Jika ingin
memperbarui data, pengguna memilih tombol Edit Profil dan diarahkan ke
formulir pengubahan informasi akun.

Pengguna dapat mengubah nama, nomor telepon, email, atau foto profil
sesuai data yang diizinkan oleh sistem. Setelah perubahan dilakukan,
pengguna mengeklik tombol Simpan.

Frontend mengirimkan data perubahan ke backend. Backend memvalidasi data
dan memeriksa agar email baru tidak digunakan oleh akun lain. Jika
perubahan berhasil, database diperbarui dan aplikasi menampilkan
informasi profil terbaru.

Jika pengguna ingin mengganti password, pengguna memilih menu Ubah Kata
Sandi dan mengisi password lama serta password baru sesuai ketentuan
yang ditetapkan.

Backend memverifikasi password lama, melakukan hashing pada password
baru, dan menyimpan perubahan secara aman. Frontend kemudian menampilkan
pemberitahuan bahwa password berhasil diperbarui.

**Proses Frontend:**

-   Menampilkan halaman Profil.

-   Menampilkan foto profil, nama, nomor HP, dan email.

-   Menyediakan tombol Edit Profil.

-   Menyediakan formulir pembaruan informasi akun.

-   Menyediakan formulir ubah password.

-   Menampilkan notifikasi keberhasilan atau kegagalan.

**Proses Backend:**

-   Menyediakan API profil pengguna.

-   Menyediakan API pembaruan informasi akun.

-   Menyediakan API pembaruan password.

-   Memvalidasi data profil.

-   Memastikan email tetap unik.

-   Memverifikasi password lama sesuai kebijakan keamanan.

-   Melakukan hashing pada password baru.

-   Memastikan pengguna hanya dapat mengubah akun miliknya sendiri.

## US-13 --- Menggunakan Fitur Lupa Kata Sandi (Opsional MVP)

Ketika pengguna ingin login tetapi lupa password, pengguna memilih
tautan Lupa Password pada halaman Login.

Aplikasi menampilkan formulir yang meminta alamat email yang terdaftar.
Pengguna memasukkan email kemudian mengeklik tombol Kirim.

Frontend mengirimkan permintaan pemulihan password ke backend. Backend
memeriksa permintaan dan menjalankan mekanisme pemulihan password
Laravel yang telah dikonfigurasi, misalnya mengirimkan tautan reset
melalui email.

Pengguna membuka email dan mengikuti tautan pemulihan yang diterima.
Aplikasi menampilkan formulir untuk memasukkan password baru dan
konfirmasi password baru.

Setelah pengguna mengirimkan formulir, backend memverifikasi token reset
dan masa berlakunya. Jika valid, backend menyimpan password baru dalam
bentuk hash dan menyelesaikan proses pemulihan.

Aplikasi menampilkan pemberitahuan bahwa password berhasil diubah
sehingga pengguna dapat kembali login menggunakan password baru.

**Proses Frontend:**

-   Menampilkan tautan Lupa Password.

-   Menampilkan formulir email pemulihan.

-   Menampilkan formulir password baru dan konfirmasi password.

-   Menampilkan pesan keberhasilan atau kegagalan.

**Proses Backend:**

-   Menyediakan API permintaan reset password.

-   Mengintegrasikan mekanisme reset password Laravel.

-   Mengelola token reset password dan masa berlakunya.

-   Memverifikasi token reset.

-   Melakukan hashing password baru.

-   Mengirimkan respons hasil pemulihan.

Catatan: fitur ini dikerjakan apabila layanan email dan mekanisme reset
password masuk dalam cakupan MVP.

## US-14 --- Menggunakan Halaman Bantuan dan FAQ

Ketika pengguna mengalami kesulitan menggunakan Kindora, pengguna
membuka menu Profil dan memilih halaman Bantuan atau FAQ.

Aplikasi menampilkan daftar pertanyaan umum beserta penjelasan mengenai
penggunaan platform, cara memberikan donasi, cara mengajukan barang,
cara mengelola donasi, dan informasi penggunaan akun.

Pengguna memilih salah satu pertanyaan untuk melihat jawabannya.
Aplikasi menampilkan penjelasan yang sesuai sehingga pengguna dapat
memahami langkah yang perlu dilakukan.

Informasi bantuan ditampilkan secara terstruktur dan mudah dibaca.

**Proses Frontend:**

-   Menampilkan halaman Bantuan dan FAQ.

-   Menampilkan daftar pertanyaan umum.

-   Menampilkan jawaban ketika pertanyaan dipilih.

-   Menyediakan navigasi kembali ke halaman Profil.

**Proses Backend:**

-   Menyediakan data FAQ apabila konten dikelola secara dinamis.

-   Jika FAQ bersifat statis, konten dapat disimpan langsung pada
    frontend tanpa API khusus.

## US-15 --- Menggunakan Fitur Pesan atau Chat (Pengembangan Lanjutan)

Pengguna membuka menu Pesan melalui bottom navigation. Aplikasi
menampilkan daftar percakapan yang pernah dilakukan dengan pengguna
lain.

Sesuai rancangan tampilan, pengguna dapat melihat tab Semua, Pesan
Donatur, dan Pesan Penerima apabila pengelompokan tersebut tetap
digunakan. Tab tersebut berfungsi sebagai pengelompokan percakapan
berdasarkan konteks interaksi, bukan sebagai pemisahan role akun.

Setiap percakapan menampilkan informasi lawan bicara dan ringkasan pesan
terakhir. Pengguna memilih salah satu percakapan untuk membuka ruang
chat.

Pada halaman chat, pengguna dapat membaca riwayat pesan dan mengetik
pesan baru untuk berkomunikasi dengan pengguna lain mengenai koordinasi
donasi.

Ketika pengguna mengirim pesan, frontend meneruskan isi pesan ke
backend. Backend menyimpan pesan dan memastikan percakapan hanya dapat
diakses oleh pengguna yang terlibat.

Setelah berhasil dikirim, pesan ditampilkan pada ruang chat. Mekanisme
pembaruan pesan dapat menggunakan polling atau WebSocket sesuai
kemampuan implementasi tim.

**Proses Frontend:**

-   Menampilkan halaman Pesan.

-   Menampilkan daftar percakapan.

-   Menampilkan tab pengelompokan percakapan jika digunakan.

-   Menampilkan ruang chat.

-   Menyediakan input dan tombol kirim pesan.

-   Menampilkan riwayat pesan.

**Proses Backend:**

-   Menyediakan struktur data percakapan dan pesan.

-   Menyediakan API daftar percakapan.

-   Menyediakan API riwayat pesan.

-   Menyediakan API pengiriman pesan.

-   Membatasi akses percakapan hanya kepada pengguna yang terlibat.

-   Menentukan mekanisme pembaruan pesan.

Catatan: fitur chat merupakan pengembangan lanjutan dan dapat
dikeluarkan dari cakupan MVP jika waktu dan kapasitas tim terbatas.

## US-16 --- Melakukan Logout

Ketika pengguna selesai menggunakan Kindora, pengguna membuka halaman
Profil dan memilih tombol Logout.

Aplikasi menampilkan konfirmasi apabila mekanisme tersebut diterapkan.
Setelah pengguna menyetujui logout, frontend mengirimkan permintaan
logout ke backend.

Backend mengakhiri autentikasi pengguna sesuai mekanisme yang digunakan,
misalnya mencabut token akses Sanctum atau mengakhiri sesi autentikasi.

Setelah backend mengonfirmasi bahwa logout berhasil, frontend menghapus
status autentikasi lokal dan mengarahkan pengguna kembali ke halaman
Login atau halaman awal.

Jika pengguna mencoba membuka halaman yang membutuhkan autentikasi
setelah logout, aplikasi akan mengarahkannya kembali ke halaman Login.

**Proses Frontend:**

-   Menyediakan tombol Logout pada halaman Profil.

-   Menampilkan konfirmasi logout jika digunakan.

-   Mengirimkan permintaan logout.

-   Menghapus status autentikasi setelah logout berhasil.

-   Mengarahkan pengguna ke halaman Login.

-   Mencegah akses ke halaman privat setelah logout.

**Proses Backend:**

-   Menyediakan API logout.

-   Mengakhiri sesi atau mencabut token autentikasi.

-   Memastikan token atau sesi yang telah diakhiri tidak dapat digunakan
    kembali.

-   Mengirimkan respons hasil logout.

## US-17 --- Mengakses Aplikasi Melalui Berbagai Perangkat

Pengguna membuka Kindora melalui smartphone, tablet, maupun desktop.
Aplikasi menyesuaikan tata letak dengan ukuran layar perangkat yang
digunakan.

Pada smartphone, pengguna melihat navigasi utama dalam bentuk bottom
navigation. Card barang ditampilkan dalam susunan yang sesuai dengan
layar kecil. Formulir dibuat agar mudah diisi menggunakan keyboard dan
layar sentuh.

Pada tablet dan desktop, aplikasi menyesuaikan lebar konten, susunan
card, navigasi, dan elemen halaman agar informasi dapat ditampilkan
dengan lebih optimal.

Pengguna tetap dapat melakukan registrasi, login, melihat katalog,
mengunggah donasi, mengajukan barang, dan mengakses profil tanpa
kehilangan fungsi utama aplikasi akibat perbedaan perangkat.

**Proses Frontend:**

-   Menyesuaikan layout berdasarkan ukuran layar.

-   Menyesuaikan navigasi desktop, tablet, dan mobile.

-   Menyesuaikan grid dan card barang.

-   Menyesuaikan formulir dan elemen interaktif.

-   Menguji tampilan dan interaksi pada berbagai ukuran layar.

**Proses Backend:**

-   Menyediakan REST API yang dapat digunakan frontend pada berbagai
    perangkat.

-   Mengirimkan struktur data dan respons yang konsisten.

-   Memastikan autentikasi dan pengelolaan data tetap berjalan sesuai
    mekanisme yang sama.

<div>

------------------------------------------------------------------------

</div>

# 3. USER STORY PENDUKUNG --- KEAMANAN DAN INTEGRASI SISTEM

## US-18 --- Mengakses Halaman yang Memerlukan Login

Ketika pengguna membuka halaman atau mencoba menjalankan fitur yang
membutuhkan autentikasi, aplikasi memeriksa apakah pengguna sudah login.

Jika pengguna belum login, aplikasi mengarahkannya ke halaman Login.
Setelah pengguna berhasil login, aplikasi dapat mengarahkan pengguna
kembali ke halaman yang sebelumnya ingin diakses jika alur tersebut
diterapkan.

Jika pengguna sudah login, aplikasi mengizinkan akses sesuai kepemilikan
dan ketentuan fitur.

Backend juga memeriksa autentikasi pada setiap endpoint privat. Dengan
demikian, pengguna tidak dapat mengakses data privat hanya dengan
memanggil endpoint secara langsung tanpa autentikasi yang valid.

**Proses Frontend:**

-   Mengelola status autentikasi.

-   Melindungi halaman yang membutuhkan login.

-   Mengarahkan pengguna yang belum login ke halaman Login.

-   Menangani respons 401 Unauthorized.

**Proses Backend:**

-   Menggunakan middleware autentikasi Laravel.

-   Melindungi endpoint privat.

-   Memeriksa identitas pengguna pada setiap request.

-   Mengembalikan respons 401 untuk request tanpa autentikasi valid.

## US-19 --- Menjaga Kepemilikan dan Keamanan Data Pengguna

Ketika pengguna mengakses data donasi, pengajuan, atau informasi akun,
aplikasi hanya menampilkan dan mengizinkan tindakan terhadap data yang
berkaitan dengan akun pengguna tersebut sesuai kewenangannya.

Sebagai contoh, pengguna hanya dapat mengedit atau menghapus barang
donasi miliknya sendiri. Pengguna yang mengajukan barang dapat melihat
riwayat pengajuannya sendiri. Pemilik barang dapat melihat dan merespons
pengajuan yang berkaitan dengan barang miliknya.

Jika pengguna mencoba mengakses atau mengubah data milik orang lain
melalui permintaan API yang tidak sah, backend menolak permintaan
tersebut dan mengembalikan respons yang sesuai.

**Proses Frontend:**

-   Menampilkan data sesuai konteks akun pengguna.

-   Menampilkan tombol tindakan sesuai hak akses pada data.

-   Menampilkan pesan ketika tindakan tidak dapat dilakukan.

**Proses Backend:**

-   Memeriksa kepemilikan data berdasarkan user_id.

-   Memastikan pengguna hanya dapat mengubah data miliknya.

-   Membatasi akses terhadap pengajuan sesuai keterlibatan pengguna.

-   Memvalidasi setiap request yang mengubah data.

-   Menolak akses tidak sah.

## US-20 --- Mendapatkan Respons Aplikasi pada Setiap Interaksi

Ketika pengguna melakukan suatu tindakan, seperti login, mencari barang,
mengunggah donasi, mengajukan barang, mengubah profil, atau merespons
pengajuan, aplikasi memberikan respons yang sesuai.

Saat data sedang diproses, aplikasi menampilkan indikator loading agar
pengguna mengetahui bahwa permintaan sedang berjalan.

Jika proses berhasil, aplikasi menampilkan pemberitahuan keberhasilan
dan memperbarui informasi yang ditampilkan. Jika proses gagal, aplikasi
menampilkan pesan kesalahan yang dapat dipahami pengguna.

Jika data belum tersedia, aplikasi menampilkan kondisi kosong. Jika
koneksi atau server mengalami kendala, aplikasi menampilkan informasi
kegagalan dan menyediakan kesempatan untuk mencoba kembali jika sesuai.

**Proses Frontend:**

-   Mengelola loading state.

-   Menampilkan pesan keberhasilan.

-   Menampilkan pesan validasi dan kesalahan.

-   Menampilkan kondisi data kosong.

-   Memperbarui tampilan setelah data berubah.

**Proses Backend:**

-   Mengembalikan respons JSON yang konsisten.

-   Menggunakan status HTTP yang sesuai.

-   Mengirimkan pesan validasi dan kesalahan.

-   Menangani kegagalan proses tanpa merusak konsistensi data.

<div>

------------------------------------------------------------------------

</div>

# 4. RINGKASAN HUBUNGAN FRONTEND DAN BACKEND

Alur pengguna \| Frontend \| Backend \-- \| \-- \| \-- Membuka Kindora
\| Halaman awal dan navigasi \| Menyediakan layanan aplikasi Registrasi
\| Formulir registrasi \| API registrasi, validasi, hashing, penyimpanan
Login \| Formulir login dan status autentikasi \| Verifikasi kredensial
dan autentikasi Beranda \| Banner, kategori, pencarian, card terbaru \|
API ringkasan, kategori, dan donasi terbaru Katalog \| Grid/list,
pencarian, filter, urutkan \| API katalog, pencarian, filter, dan
pengurutan Detail barang \| Tampilan detail dan tombol ajukan \| API
detail barang dan pemilik Tambah donasi \| Formulir dan unggah gambar \|
API tambah barang dan penyimpanan gambar Edit/hapus donasi \| Formulir
edit dan konfirmasi hapus \| API perubahan data dan pemeriksaan
kepemilikan Pengajuan barang \| Formulir pengajuan dan riwayat \| API
pengajuan dan pengelolaan status Respons pengajuan \| Detail pengajuan
dan tombol terima/tolak \| API keputusan dan perubahan status Profil \|
Tampilan profil dan formulir pengaturan \| API profil dan pembaruan akun
Lupa password \| Formulir pemulihan \| API reset password Pesan/chat \|
Daftar percakapan dan ruang chat \| API percakapan dan pesan Logout \|
Tombol logout dan pengalihan halaman \| API logout dan pengakhiran
autentikasi Keamanan \| Proteksi halaman dan respons UI \| Middleware,
validasi, dan kepemilikan data

<div>

------------------------------------------------------------------------

</div>

# 5. CATATAN ALUR SISTEM KINDORA

1.  Setiap pengguna hanya memiliki satu akun. Tidak ada pilihan role
    Donatur dan Penerima saat registrasi.

2.  Pengguna dapat menjadi pemberi donasi pada satu aktivitas dan
    menjadi pengaju barang pada aktivitas lainnya.

3.  Tidak terdapat Admin dalam alur penerimaan maupun penolakan
    pengajuan.

4.  Pemilik barang bertanggung jawab memberikan respons terhadap
    pengajuan barang miliknya.

5.  Barang yang sudah tidak tersedia tidak boleh diajukan kembali.

6.  Status barang dan status pengajuan harus saling konsisten.

7.  Pengguna hanya dapat mengelola data yang menjadi haknya.

8.  Fitur chat dan lupa password bersifat opsional sesuai kesepakatan
    cakupan MVP.

9.  Frontend menggunakan REST API Backend untuk mengambil dan
    mengirimkan data.

10. Seluruh data utama ditampilkan secara dinamis dari backend, bukan
    hanya menggunakan data dummy.

**Akhir perjalanan pengguna:** pengguna dapat membuat akun, masuk ke
Kindora, menemukan barang yang dibutuhkan, mengajukan barang, memberikan
donasi, mengelola barang miliknya, merespons pengajuan dari pengguna
lain, dan mengelola profil menggunakan satu akun yang sama.