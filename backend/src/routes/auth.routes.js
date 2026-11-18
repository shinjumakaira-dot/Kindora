const express = require('express');
const { body, validationResult } = require('express-validator');

const authController = require('../controllers/auth.controller');
const authenticate = require('../middleware/auth.middleware');

const router = express.Router();

// Memeriksa hasil validasi
const validateRequest = (req, res, next) => {
    const errors = validationResult(req);

    if (!errors.isEmpty()) {
        return res.status(422).json({
            success: false,
            message: 'Validasi gagal.',
            errors: errors.array().map(error => ({
                field: error.path,
                message: error.msg
            }))
        });
    }

    next();
};

// POST /api/auth/register
router.post(
    '/register',
    [
        body('nama_lengkap')
            .trim()
            .notEmpty()
            .withMessage('Nama lengkap wajib diisi.')
            .isLength({ max: 100 })
            .withMessage('Nama maksimal 100 karakter.'),

        body('email')
            .trim()
            .isEmail()
            .withMessage('Format email tidak valid.')
            .normalizeEmail(),

        body('password')
            .isString()
            .isLength({ min: 8 })
            .withMessage('Password minimal 8 karakter.')
            .custom(value => Buffer.byteLength(value, 'utf8') <= 72)
            .withMessage('Password maksimal 72 byte.')
    ],
    validateRequest,
    authController.register
);

// POST /api/auth/login
router.post(
    '/login',
    [
        body('email')
            .trim()
            .isEmail()
            .withMessage('Format email tidak valid.')
            .normalizeEmail(),

        body('password')
            .notEmpty()
            .withMessage('Password wajib diisi.')
    ],
    validateRequest,
    authController.login
);

// POST /api/auth/logout
router.post(
    '/logout',
    authenticate,
    authController.logout
);

module.exports = router;