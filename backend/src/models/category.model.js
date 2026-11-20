const supabase = require('../config/supabase');

const Category = {
    async create(data) {
        const { data: category, error } = await supabase
            .from('kategori_barang')
            .insert({
                nama_kategori: data.nama_kategori,
                keterangan: data.keterangan || null
            })
            .select('id, nama_kategori, keterangan')
            .single();

        if (error) throw error;

        return category;
    },

    async findAll() {
        const { data, error } = await supabase
            .from('kategori_barang')
            .select('id, nama_kategori, keterangan')
            .order('nama_kategori');

        if (error) throw error;

        return data;
    },

    async findById(id) {
        const { data, error } = await supabase
            .from('kategori_barang')
            .select('id, nama_kategori, keterangan')
            .eq('id', id)
            .maybeSingle();

        if (error) throw error;

        return data;
    }
};

module.exports = Category;
