const User = require('../models/user.model');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const crypto = require('crypto');
const supabase = require('../config/supabase');

// Membuat token JWT
function createToken(user) {
    return jwt.sign(
        {},
        process.env.JWT_SECRET,
        {
            subject: user.id,
            expiresIn: process.env.JWT_EXPIRES_IN || '1d'
        }
    );
}

// REGISTRASI
exports.register = async (req, res) => {
    try {
        const nama_lengkap = req.body.nama_lengkap.trim();
        const email = req.body.email.trim().toLowerCase();
        const password = req.body.password;

        // Memeriksa email yang sudah digunakan
        const existingUser = await User.findByEmail(email);

        if (existingUser) {
            return res.status(409).json({
                success: false,
                message: 'Email sudah digunakan.'
            });
        }

        // Hash password
        const password_hash = await bcrypt.hash(password, 12);

        // Menyimpan pengguna
        const user = await User.create({
            nama_lengkap,
            email,
            password_hash
        });

        return res.status(201).json({
            success: true,
            message: 'Registrasi berhasil.',
            data: user
        });

    } catch (error) {
        // Menangani email duplikat jika ada request bersamaan
        if (error.code === '23505') {
            return res.status(409).json({
                success: false,
                message: 'Email sudah digunakan.'
            });
        }

        return res.status(500).json({
            success: false,
            message: 'Terjadi kesalahan pada server.'
        });
    }
};

// LOGIN
exports.login = async (req, res) => {
    try {
        const email = req.body.email.trim().toLowerCase();
        const password = req.body.password;

        // Mencari pengguna
        const user = await User.findByEmail(email);

        if (!user) {
            return res.status(401).json({
                success: false,
                message: 'Email atau password salah.'
            });
        }

        // Memverifikasi password
        const passwordValid = await bcrypt.compare(
            password,
            user.password_hash
        );

        if (!passwordValid) {
            return res.status(401).json({
                success: false,
                message: 'Email atau password salah.'
            });
        }

        // Membuat JWT
        const token = createToken(user);

        return res.status(200).json({
            success: true,
            message: 'Login berhasil.',
            data: {
                user: {
                    id: user.id,
                    nama_lengkap: user.nama_lengkap,
                    email: user.email
                },
                token
            }
        });

    } catch (error) {
        return res.status(500).json({
            success: false,
            message: 'Terjadi kesalahan pada server.'
        });
    }
};

// LOGOUT
exports.logout = async (req, res) => {
    try {
        // Hash token sebelum disimpan
        const tokenHash = crypto
            .createHash('sha256')
            .update(req.token)
            .digest('hex');

        // Mengambil waktu kedaluwarsa dari JWT
        const decoded = jwt.decode(req.token);

        const expiresAt = new Date(decoded.exp * 1000).toISOString();

        // Memasukkan token ke daftar blokir
        const { error } = await supabase
            .from('token_diblokir')
            .insert({
                token_hash: tokenHash,
                expires_at: expiresAt
            });

        if (error) throw error;

        return res.status(200).json({
            success: true,
            message: 'Logout berhasil.'
        });

    } catch (error) {
        return res.status(500).json({
            success: false,
            message: 'Logout gagal. Silakan coba kembali.'
        });
    }
};