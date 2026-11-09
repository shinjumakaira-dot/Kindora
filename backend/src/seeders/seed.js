require('dotenv').config();

const bcrypt = require('bcrypt');
const supabase = require('../config/supabase');
const User = require('../models/user.model');

const categories = [
    { nama_kategori: 'Pakaian', keterangan: 'Pakaian yang masih layak digunakan' },
    { nama_kategori: 'Buku', keterangan: 'Buku pelajaran dan buku bacaan' },
    { nama_kategori: 'Tas', keterangan: 'Tas sekolah dan tas sehari-hari' },
    { nama_kategori: 'Sepatu', keterangan: 'Sepatu yang masih layak digunakan' },
    { nama_kategori: 'Peralatan Rumah Tangga', keterangan: 'Peralatan rumah yang masih bisa digunakan' }
];

async function seedCategories() {
    const { error } = await supabase
        .from('kategori_barang')
        .upsert(categories, { onConflict: 'nama_kategori' });

    if (error) throw error;

    console.log('Kategori sudah di-seed.');
}

async function seedAdmin() {
    const email = process.env.ADMIN_EMAIL || 'admin@kindora.dev';
    const password = process.env.ADMIN_PASSWORD;

    if (!password) {
        console.log('ADMIN_PASSWORD belum diisi di .env, akun admin dilewati.');
        return;
    }

    const existing = await User.findByEmail(email);

    if (existing) {
        console.log('Akun admin sudah ada, dilewati.');
        return;
    }

    const password_hash = await bcrypt.hash(password, 12);

    await User.create({
        nama_lengkap: 'Admin Kindora',
        email,
        password_hash
    });

    console.log('Akun admin dev sudah dibuat:', email);
}

async function seed() {
    await seedCategories();
    await seedAdmin();
    console.log('Seed selesai.');
}

if (require.main === module) {
    seed().catch((error) => {
        console.error('Seed gagal:', error.message);
        process.exit(1);
    });
}

module.exports = seed;
