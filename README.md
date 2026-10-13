# 🍃 Kindora - Sistem Donasi Barang Layak Pakai Berbasis Cloud

> Platform web yang mempertemukan donatur barang layak pakai dengan penerima yang membutuhkan secara efisien dan transparan.

---

## 📌 Anggota Kelompok & Pembagian Tugas

| Nama | Peran | Tanggung Jawab |
| **[Rafa Novtria]** | Frontend & UI/UX | Desain mockup, slicing UI (HTML/CSS/JS), antarmuka pengguna |
| **[Destra Elisya Putri Ambadar]** | Backend & Database | Perancangan Database SQL, Pembuatan API, Logika Bisnis |
| **[Navika Farsabila]** | DevOps & Testing | Git Flow, Deployment, Testing, & Fitur Tambahan |

---

## 💡 Deskripsi Proyek

Kindora hadir untuk menyelesaikan masalah penumpukan barang layak pakai yang tidak terpakai dengan menyalurkannya kepada pihak yang membutuhkan. Sistem ini memfasilitasi 3 jenis pengguna: Donatur, Penerima, dan Admin.

### ✨ Fitur Utama (MVP)
1. **Autentikasi**: Register & Login Pengguna
2. **Katalog Donasi**: Cari dan filter barang donasi berdasarkan kategori
3. **Detail & Ajukan Barang**: Informasi lengkap barang dan form pengajuan penerima
4. **Kelola Donasi**: Donatur dapat menambahkan barang dan mengunggah foto
5. **Tracking Status**: Pelacakan status barang (*Tersedia*, *Dalam proses*, *Sudah didonasikan*)[cite: 3, 6]
6. **Dashboard Admin**: Verifikasi barang masuk dan manajemen pengguna[cite: 5]

---

## 🎨 Aset Visual & UI/UX

Panduan desain dan aset proyek dapat diakses pada folder `docs/`:
- **Logo & Ikon**: `docs/assets/`
- **Kode Warna (Palette)**:
  - Primary (Hijau): `#1F5E43`
  - Secondary (Krem): `#F6F4EB`
  - Accent (Oranye): `#E09F51`
- **Mockup UI/UX**: `docs/mockups/`

---

## 🗄️ Skema Database Sederhana

```sql
User (id, nama, email, password, role)
Donasi (id, user_id, nama_barang, kategori, deskripsi, kondisi, gambar, lokasi, status, tanggal)
Pengajuan (id, donasi_id, user_id, tanggal_pengajuan, status)