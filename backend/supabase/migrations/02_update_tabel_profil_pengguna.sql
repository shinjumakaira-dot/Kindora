BEGIN;

ALTER TABLE public.profil_pengguna
DROP CONSTRAINT IF EXISTS profil_pengguna_id_fkey;

ALTER TABLE public.profil_pengguna
DROP COLUMN IF EXISTS peran;

ALTER TABLE public.profil_pengguna
ALTER COLUMN nama_lengkap TYPE VARCHAR(100);

ALTER TABLE public.profil_pengguna
ALTER COLUMN id SET DEFAULT gen_random_uuid();

ALTER TABLE public.profil_pengguna
ADD COLUMN email VARCHAR(255) NOT NULL UNIQUE;

ALTER TABLE public.profil_pengguna
ADD COLUMN password_hash TEXT NOT NULL;

ALTER TABLE public.profil_pengguna
DROP COLUMN IF EXISTS tanggal_dibuat;

COMMIT;