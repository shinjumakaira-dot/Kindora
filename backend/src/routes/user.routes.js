const express = require('express');
const { body, validationResult } = require('express-validator');

const userController = require('../controllers/user.controller');
const authenticate = require('../middleware/auth.middleware');

const router = express.Router();

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

// Semua endpoint di file ini wajib login
router.use(authenticate);

// GET /api/user
router.get('/', userController.getProfile);

// PUT /api/user
router.put(
    '/',
    [
        body('nama_lengkap')
            .optional()
            .trim()
            .notEmpty()
            .withMessage('Nama tidak boleh kosong.')
            .isLength({ max: 100 })
            .withMessage('Nama maksimal 100 karakter.'),

        body('email')
            .optional()
            .trim()
            .isEmail()
            .withMessage('Format email tidak valid.')
            .normalizeEmail()
    ],
    validateRequest,
    userController.updateProfile
);

// PUT /api/user/password
router.put(
    '/password',
    [
        body('password_lama')
            .notEmpty()
            .withMessage('Password saat ini wajib diisi.'),

        body('password_baru')
            .isString()
            .isLength({ min: 8 })
            .withMessage('Password baru minimal 8 karakter.')
            .custom(value => Buffer.byteLength(value, 'utf8') <= 72)
            .withMessage('Password baru maksimal 72 byte.')
    ],
    validateRequest,
    userController.updatePassword
);

module.exports = router;