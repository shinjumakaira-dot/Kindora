const supabase = require('../config/supabase');

const columns = 'id, id_donatur, id_kategori, nama_barang, deskripsi_barang, kondisi_barang, gambar_barang, lokasi_barang, status_donasi, tanggal_dibuat';

const Donation = {
    async create(data) {
        const { data: donation, error } = await supabase
            .from('donasi_barang')
            .insert({
                id_donatur: data.id_donatur,
                id_kategori: data.id_kategori,
                nama_barang: data.nama_barang,
                deskripsi_barang: data.deskripsi_barang || null,
                kondisi_barang: data.kondisi_barang,
                gambar_barang: data.gambar_barang || null,
                lokasi_barang: data.lokasi_barang
            })
            .select('id, nama_barang, status_donasi')
            .single();

        if (error) throw error;

        return donation;
    },

    async findById(id) {
        const { data, error } = await supabase
            .from('donasi_barang')
            .select(columns)
            .eq('id', id)
            .maybeSingle();

        if (error) throw error;

        return data;
    },

    async findAvailable() {
        const { data, error } = await supabase
            .from('donasi_barang')
            .select(columns)
            .eq('status_donasi', 'tersedia')
            .order('tanggal_dibuat', { ascending: false });

        if (error) throw error;

        return data;
    },

    async findByDonor(id_donatur) {
        const { data, error } = await supabase
            .from('donasi_barang')
            .select(columns)
            .eq('id_donatur', id_donatur)
            .order('tanggal_dibuat', { ascending: false });

        if (error) throw error;

        return data;
    },

    async updateStatus(id, status_donasi) {
        const { data, error } = await supabase
            .from('donasi_barang')
            .update({ status_donasi })
            .eq('id', id)
            .select('id, status_donasi')
            .single();

        if (error) throw error;

        return data;
    }
};

module.exports = Donation;
