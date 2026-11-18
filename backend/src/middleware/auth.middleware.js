const jwt = require('jsonwebtoken');
const crypto = require('crypto');
const supabase = require('../config/supabase');

const authenticate = async (req, res, next) => {
    try {
        const authHeader = req.headers.authorization;

        if (!authHeader || !authHeader.startsWith('Bearer ')) {
            return res.status(401).json({
                success: false,
                message: 'Token autentikasi tidak ditemukan.'
            });
        }

        const token = authHeader.split(' ')[1];

        // Memverifikasi JWT
        const decoded = jwt.verify(
            token,
            process.env.JWT_SECRET
        );

        // Menghitung hash token
        const tokenHash = crypto
            .createHash('sha256')
            .update(token)
            .digest('hex');

        // Memeriksa apakah token sudah diblokir
        const { data, error } = await supabase
            .from('token_diblokir')
            .select('id')
            .eq('token_hash', tokenHash)
            .maybeSingle();

        if (error) {
            return res.status(500).json({
                success: false,
                message: 'Gagal memeriksa sesi autentikasi.'
            });
        }

        if (data) {
            return res.status(401).json({
                success: false,
                message: 'Token sudah tidak berlaku. Silakan login kembali.'
            });
        }

        // Identitas berasal dari JWT, bukan request body
        req.user = {
            id: decoded.sub
        };

        req.token = token;

        next();

    } catch (error) {
        return res.status(401).json({
            success: false,
            message: 'Token tidak valid atau sudah kedaluwarsa.'
        });
    }
};

module.exports = authenticate;