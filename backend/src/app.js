require('dotenv').config();

const express = require('express');
const cors = require('cors');

const authRoutes = require('./routes/auth.routes');
const userRoutes = require('./routes/user.routes');

const app = express();

// Middleware utama
app.use(cors());
app.use(express.json());

// Halaman utama API
app.get('/', (req, res) => {
    res.json({
        success: true,
        message: 'API Sistem Donasi Kindora berjalan.'
    });
});

// Endpoint pemeriksaan API
app.get('/api/health', (req, res) => {
    res.json({
        success: true,
        status: 'healthy'
    });
});

// Route autentikasi
app.use('/api/auth', authRoutes);

// Route pengguna
app.use('/api/user', userRoutes);

// Menangani endpoint yang tidak ditemukan
app.use((req, res) => {
    res.status(404).json({
        success: false,
        message: 'Endpoint tidak ditemukan.'
    });
});

const PORT = process.env.PORT || 3000;

if (require.main === module) {
    app.listen(PORT, () => {
        console.log(`Server Kindora berjalan di http://localhost:${PORT}`);
    });
}

module.exports = app;