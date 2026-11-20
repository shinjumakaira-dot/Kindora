const supabase = require('../config/supabase');

const columns = 'id, id_donasi, id_pemohon, status_pengajuan, tanggal_pengajuan';

const DonationRequest = {
    async create(data) {
        const { data: request, error } = await supabase
            .from('pengajuan_donasi')
            .insert({
                id_donasi: data.id_donasi,
                id_pemohon: data.id_pemohon
            })
            .select(columns)
            .single();

        if (error) throw error;

        return request;
    },

    async findById(id) {
        const { data, error } = await supabase
            .from('pengajuan_donasi')
            .select(columns)
            .eq('id', id)
            .maybeSingle();

        if (error) throw error;

        return data;
    },

    async findByDonation(id_donasi) {
        const { data, error } = await supabase
            .from('pengajuan_donasi')
            .select(columns)
            .eq('id_donasi', id_donasi)
            .order('tanggal_pengajuan', { ascending: false });

        if (error) throw error;

        return data;
    },

    async findByUser(id_pemohon) {
        const { data, error } = await supabase
            .from('pengajuan_donasi')
            .select(columns)
            .eq('id_pemohon', id_pemohon)
            .order('tanggal_pengajuan', { ascending: false });

        if (error) throw error;

        return data;
    },

    async updateStatus(id, status_pengajuan) {
        const { data, error } = await supabase
            .from('pengajuan_donasi')
            .update({ status_pengajuan })
            .eq('id', id)
            .select('id, status_pengajuan')
            .single();

        if (error) throw error;

        return data;
    }
};

module.exports = DonationRequest;
