# Kindora - Deployment Guide

Dokumentasi ini menjelaskan cara menjalankan aplikasi Kindora menggunakan Docker dan Docker Compose.

## 1. Persyaratan

Pastikan perangkat sudah memiliki:
- Docker Desktop
- Docker Compose
- Git

## 2. Struktur Docker

Kindora menggunakan dua container utama:

| Container | Teknologi | Port |
|---|---|---|
| Frontend | PHP 8.3 + Apache | 8080 |
| Backend | Node.js 22 | 3000 |

Supabase digunakan sebagai layanan database eksternal.

## 3. Konfigurasi Environment

Sebelum menjalankan backend, buat file `.env` di dalam folder `backend`.

Salin konfigurasi dari `backend/.env.example`, kemudian isi:

```env
PORT=3000
SUPABASE_URL=elisyadestra@gmail.com
SUPABASE_SERVICE_ROLE_KEY=Elisya.yaa4a
```

Ganti nilai tersebut menggunakan kredensial Supabase milik project Kindora.

**Penting:** Jangan mengunggah file `backend/.env` ke GitHub karena berisi kredensial rahasia.

## 4. Build Docker

Buka terminal pada folder utama project Kindora, kemudian jalankan:

```bash
docker compose build
```

Perintah ini membangun image frontend dan backend.

## 5. Menjalankan Aplikasi

Jalankan:

```bash
docker compose up -d
```

Perintah tersebut menjalankan container di background.

## 6. Mengakses Aplikasi

Frontend:
http://localhost:8080/frontend/docs/login/login.php

Backend:
http://localhost:3000

Backend Health Check:
http://localhost:3000/api/health

## 7. Memeriksa Container

Melihat status container:

```bash
docker compose ps
```

Melihat log seluruh container:

```bash
docker compose logs
```

Melihat log backend:

```bash
docker compose logs backend
```

Melihat log frontend:

```bash
docker compose logs frontend
```

## 8. Menghentikan Aplikasi

Untuk menghentikan container:

```bash
docker compose down
```

## 9. Menjalankan Ulang Setelah Perubahan

Jika terdapat perubahan kode atau konfigurasi, bangun ulang image:

```bash
docker compose up -d --build
```

## 10. Keamanan

- Jangan mengunggah file `.env` ke repository.
- Simpan kredensial Supabase secara aman.
- Gunakan `.env.example` sebagai template konfigurasi.
- Jangan membagikan Supabase Secret Key kepada pihak lain.