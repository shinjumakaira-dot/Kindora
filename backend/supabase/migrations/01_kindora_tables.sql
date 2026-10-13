-- Tabel utama untuk sistem donasi Kindora

-- 1. Tabel profil pengguna
create table public.profil_pengguna (
  id uuid primary key references auth.users(id) on delete cascade,
  nama_lengkap text not null,
  peran text not null default 'penerima'
    check (peran in ('donatur', 'penerima', 'admin')),
  tanggal_dibuat timestamptz not null default now()
);

-- 2. Tabel kategori barang
create table public.kategori_barang (
  id bigint generated always as identity primary key,
  nama_kategori text not null unique,
  keterangan text,
  tanggal_dibuat timestamptz not null default now()
);

-- 3. Tabel barang donasi
create table public.donasi_barang (
  id bigint generated always as identity primary key,
  id_donatur uuid not null
    references public.profil_pengguna(id) on delete restrict,
  id_kategori bigint not null
    references public.kategori_barang(id) on delete restrict,
  nama_barang text not null,
  deskripsi_barang text,
  kondisi_barang text not null
    check (
      kondisi_barang in (
        'baru',
        'baik',
        'layak_pakai'
      )
    ),
  gambar_barang text,
  lokasi_barang text not null,
  status_donasi text not null default 'tersedia'
    check (
      status_donasi in (
        'tersedia',
        'dalam_proses',
        'sudah_didonasi'
      )
    ),
  tanggal_dibuat timestamptz not null default now()
);

-- 4. Tabel pengajuan penerimaan donasi
create table public.pengajuan_donasi (
  id bigint generated always as identity primary key,
  id_donasi bigint not null
    references public.donasi_barang(id) on delete restrict,
  id_pemohon uuid not null
    references public.profil_pengguna(id) on delete restrict,
  status_pengajuan text not null default 'menunggu'
    check (
      status_pengajuan in (
        'menunggu',
        'disetujui',
        'ditolak'
      )
    ),
  tanggal_pengajuan timestamptz not null default now(),
  constraint unik_pengajuan_donasi
    unique (id_donasi, id_pemohon)
);

-- Indeks untuk membantu pencarian data
create index idx_donasi_id_donatur
  on public.donasi_barang(id_donatur);

create index idx_donasi_id_kategori
  on public.donasi_barang(id_kategori);

create index idx_donasi_status
  on public.donasi_barang(status_donasi);

create index idx_pengajuan_id_donasi
  on public.pengajuan_donasi(id_donasi);

create index idx_pengajuan_id_pemohon
  on public.pengajuan_donasi(id_pemohon);

-- Mengaktifkan perlindungan akses pada setiap tabel
alter table public.profil_pengguna enable row level security;
alter table public.kategori_barang enable row level security;
alter table public.donasi_barang enable row level security;
alter table public.pengajuan_donasi enable row level security;

-- Memasukkan kategori barang awal
insert into public.kategori_barang (nama_kategori, keterangan)
values
  ('Pakaian', 'Pakaian yang masih layak digunakan'),
  ('Buku', 'Buku pelajaran dan buku bacaan'),
  ('Tas', 'Tas sekolah dan tas sehari-hari'),
  ('Sepatu', 'Sepatu yang masih layak digunakan'),
  ('Peralatan Rumah Tangga', 'Peralatan rumah yang masih bisa digunakan')
on conflict (nama_kategori) do nothing;