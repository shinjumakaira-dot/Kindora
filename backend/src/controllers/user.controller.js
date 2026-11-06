const User = require('../models/user.model');
const bcrypt = require('bcrypt');

// GET /api/user
exports.getProfile = async (req, res) => {
    try {
        const user = await User.findById(req.user.id);

        if (!user) {
            return res.status(404).json({
                success: false,
                message: 'Pengguna tidak ditemukan.'
            });
        }

        return res.status(200).json({
            success: true,
            message: 'Profil berhasil diambil.',
            data: user
        });

    } catch (error) {
        return res.status(500).json({
            success: false,
            message: 'Gagal mengambil profil.'
        });
    }
};

// PUT /api/user
exports.updateProfile = async (req, res) => {
    try {
        const updates = {};

        if (req.body.nama_lengkap !== undefined) {
            updates.nama_lengkap = req.body.nama_lengkap.trim();
        }

        if (req.body.email !== undefined) {
            const email = req.body.email.trim().toLowerCase();

            const existingUser = await User.findByEmail(email);

            if (existingUser && existingUser.id !== req.user.id) {
                return res.status(409).json({
                    success: false,
                    message: 'Email sudah digunakan akun lain.'
                });
            }

            updates.email = email;
        }

        if (req.body.nomor_telepon !== undefined) {
            updates.nomor_telepon = req.body.nomor_telepon.trim() || null;
        }

        if (Object.keys(updates).length === 0) {
            return res.status(400).json({
                success: false,
                message: 'Tidak ada data profil yang diperbarui.'
            });
        }

        const user = await User.update(req.user.id, updates);

        return res.status(200).json({
            success: true,
            message: 'Profil berhasil diperbarui.',
            data: user
        });

    } catch (error) {
        if (error.code === '23505') {
            return res.status(409).json({
                success: false,
                message: 'Email sudah digunakan.'
            });
        }

        return res.status(500).json({
            success: false,
            message: 'Gagal memperbarui profil.'
        });
    }
};

// PUT /api/user/password
exports.updatePassword = async (req, res) => {
    try {
        const { password_lama, password_baru } = req.body;

        // Mengambil hash password pengguna yang sedang login
        const user = await User.findByIdWithPassword(req.user.id);

        if (!user) {
            return res.status(404).json({
                success: false,
                message: 'Pengguna tidak ditemukan.'
            });
        }

        // Memverifikasi password lama
        const passwordValid = await bcrypt.compare(
            password_lama,
            user.password_hash
        );

        if (!passwordValid) {
            return res.status(400).json({
                success: false,
                message: 'Password saat ini salah.'
            });
        }

        // Hash password baru
        const newPasswordHash = await bcrypt.hash(password_baru, 12);

        await User.update(req.user.id, {
            password_hash: newPasswordHash
        });

        return res.status(200).json({
            success: true,
            message: 'Password berhasil diperbarui.'
        });

    } catch (error) {
        return res.status(500).json({
            success: false,
            message: 'Gagal memperbarui password.'
        });
    }
};