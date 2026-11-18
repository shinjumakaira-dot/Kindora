const supabase = require('../config/supabase');

const User = {
    // Membuat pengguna baru
    async create(data) {
        const { data: user, error } = await supabase
            .from('profil_pengguna')
            .insert({
                nama_lengkap: data.nama_lengkap,
                email: data.email,
                password_hash: data.password_hash,
            })
            .select('id, nama_lengkap, email')
            .single();

        if (error) throw error;

        return user;
    },

    // Mencari pengguna berdasarkan email
    async findByEmail(email) {
        const { data, error } = await supabase
            .from('profil_pengguna')
            .select('*')
            .eq('email', email)
            .maybeSingle();

        if (error) throw error;

        return data;
    },

    // Mencari pengguna berdasarkan ID
    async findById(id) {
        const { data, error } = await supabase
            .from('profil_pengguna')
            .select('id, nama_lengkap, email')
            .eq('id', id)
            .maybeSingle();

        if (error) throw error;

        return data;
    },

    // Mencari pengguna beserta hash password
    async findByIdWithPassword(id) {
        const { data, error } = await supabase
            .from('profil_pengguna')
            .select('id, password_hash')
            .eq('id', id)
            .maybeSingle();

        if (error) throw error;

        return data;
    },

    // Memperbarui profil pengguna
    async update(id, updates) {
        const { data, error } = await supabase
            .from('profil_pengguna')
            .update(updates)
            .eq('id', id)
            .select('id, nama_lengkap, email')
            .single();

        if (error) throw error;

        return data;
    }
};

module.exports = User;