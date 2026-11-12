require('dotenv').config();

const supabase = require('../config/supabase');

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

async function seed() {
    await seedCategories();
    console.log('Seed selesai.');
}

if (require.main === module) {
    seed().catch((error) => {
        console.error('Seed gagal:', error.message);
        process.exit(1);
    });
}

module.exports = seed;
