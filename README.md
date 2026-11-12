# 🍃 Kindora - Sistem Donasi Barang Layak Pakai Berbasis Cloud

> Platform web yang mempertemukan donatur barang layak pakai dengan penerima yang membutuhkan secara efisien dan transparan.

---

## 📌 Anggota Kelompok & Pembagian Tugas

| **[Rafa Novtria]** | Frontend & UI/UX | Desain mockup, slicing UI (HTML/CSS/JS), antarmuka pengguna | <br>
| **[Destra Elisya Putri Ambadar]** | Backend & Database | Perancangan Database SQL, Pembuatan API, Logika Bisnis | <br>
| **[Navika Farsabila]** | DevOps & Testing | Git Flow, Deployment, Testing, & Fitur Tambahan |

---

## 💡 Deskripsi Proyek

Kindora hadir untuk menyelesaikan masalah penumpukan barang layak pakai yang tidak terpakai dengan menyalurkannya kepada pihak yang membutuhkan. Sistem ini memfasilitasi 2 jenis pengguna: Donatur dan Penerima, tanpa Admin. Kalau barang masih tersedia, penerima chat donatur lalu COD langsung tanpa persetujuan admin.

### ✨ Fitur Utama (MVP)
1. **Autentikasi**: Register & Login Pengguna
2. **Beranda**: Halaman utama berisi ringkasan donasi terbaru, banner informasi, dan kategori populer.
3. **Katalog Donasi**: Cari dan filter barang donasi berdasarkan kategori
4. **Detail & Ajukan Barang**: Informasi lengkap barang dan form pengajuan penerima
5. **Kelola Donasi**: Donatur dapat menambahkan barang dan mengunggah foto
6. **Tracking Status**: Pelacakan status barang (*Tersedia*, *Dalam proses*, *Sudah didonasikan*)
7. **Chat dan COD**: Penerima chat donatur kalau barang masih tersedia, lalu COD langsung tanpa persetujuan admin
8. **Profil**: Informasi akun pengguna serta riwayat "Pengajuan Saya" (untuk memantau status pengajuan yang sudah dikirim).

---

## 🎨 Aset Visual & UI/UX

Panduan desain dan aset proyek dapat diakses pada folder `docs/`:
- **Logo & Ikon**: `docs/logo/`
- **Kode Warna (Palette)**:
  - Primary (Hijau): `#1F5E43`
  - Secondary (Krem): `#F6F4EB`
  - Accent (Oranye): `#E09F51`
- **Mockup UI/UX**: `docs/mockup/`

---

## 🗄️ Skema Database Sederhana

```sql
User (id, nama, email, password)
Donasi (id, user_id, nama_barang, kategori, deskripsi, kondisi, gambar, lokasi, status, tanggal)
Pengajuan (id, donasi_id, user_id, tanggal_pengajuan, status)