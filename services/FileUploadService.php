<?php

declare(strict_types=1);

/**
 * GT HOMES — File Upload Service
 *
 * Secure image upload handler for admin-uploaded media.
 * All file validation is server-side — never trusts client input.
 *
 * Security measures:
 *  - MIME type detected via finfo (server-side, not extension)
 *  - Extension whitelist (JPEG, PNG, WebP)
 *  - Unique filenames (prevents overwriting and guessing)
 *  - File size limit enforced
 *  - No executable types allowed
 *  - Path traversal prevented via basename()
 *
 * Step 1: Full skeleton. Upload destinations are registered later.
 */
final class FileUploadService
{
    /** Upload destinations keyed by context. */
    private const DESTINATIONS = [
        'rooms'    => '/uploads/rooms/',
        'dining'   => '/uploads/dining/',
        'gallery'  => '/uploads/gallery/',
        'packages' => '/uploads/packages/',
    ];

    /**
     * Handle a single file upload from a form field.
     *
     * @param  array  $file     Entry from $_FILES['fieldname']
     * @param  string $context  Upload context key (rooms | dining | gallery | packages)
     * @return array{success: bool, filename: string|null, error: string|null}
     */
    public static function upload(array $file, string $context): array
    {
        // 1. Validate upload context
        if (!array_key_exists($context, self::DESTINATIONS)) {
            return self::failure('Invalid upload context.');
        }

        // 2. Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return self::failure('File upload error: ' . self::uploadErrorMessage($file['error']));
        }

        // 3. File size limit
        if ($file['size'] > UPLOAD_MAX_SIZE) {
            $maxMb = UPLOAD_MAX_SIZE / (1024 * 1024);
            return self::failure("File size exceeds the {$maxMb}MB limit.");
        }

        // 4. Detect MIME type using finfo (server-side)
        $finfo    = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, UPLOAD_ALLOWED_TYPES, strict: true)) {
            return self::failure('Invalid file type. Only JPEG, PNG, and WebP are allowed.');
        }

        // 5. Validate extension against MIME type
        $originalExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($originalExt, UPLOAD_ALLOWED_EXTS, strict: true)) {
            return self::failure('Invalid file extension.');
        }

        // 6. Generate a unique, safe filename (no original name trusted)
        $safeFilename = self::generateFilename($mimeType);

        // 7. Build destination path
        $destDir = STORAGE_PATH . self::DESTINATIONS[$context];

        if (!is_dir($destDir) && !@mkdir($destDir, 0775, recursive: true)) {
            LoggerService::error('Upload destination directory could not be created', [
                'dir' => $destDir,
            ]);
            return self::failure('Storage directory is unavailable.');
        }

        $destPath = $destDir . $safeFilename;

        // 8. Move the uploaded file (safe PHP function — validates it was a real upload)
        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            LoggerService::error('move_uploaded_file() failed', ['dest' => $destPath]);
            return self::failure('Failed to save the uploaded file.');
        }

        LoggerService::info('File uploaded successfully', [
            'context'  => $context,
            'filename' => $safeFilename,
        ]);

        return [
            'success'  => true,
            'filename' => $safeFilename,
            'error'    => null,
        ];
    }

    /**
     * Delete a previously uploaded file.
     *
     * @param string $filename  The stored filename (basename only)
     * @param string $context   Upload context key
     */
    public static function delete(string $filename, string $context): bool
    {
        if (!array_key_exists($context, self::DESTINATIONS)) {
            return false;
        }

        // Prevent path traversal
        $safeFilename = basename($filename);
        $path = STORAGE_PATH . self::DESTINATIONS[$context] . $safeFilename;

        if (is_file($path)) {
            return @unlink($path);
        }

        return false;
    }

    // ─────────────────────────────────────────────
    // Private helpers
    // ─────────────────────────────────────────────

    private static function generateFilename(string $mimeType): string
    {
        $ext = match ($mimeType) {
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp',
            default      => 'bin',
        };

        return bin2hex(random_bytes(16)) . '_' . time() . '.' . $ext;
    }

    private static function failure(string $message): array
    {
        return [
            'success'  => false,
            'filename' => null,
            'error'    => $message,
        ];
    }

    private static function uploadErrorMessage(int $code): string
    {
        return match ($code) {
            UPLOAD_ERR_INI_SIZE   => 'File exceeds server size limit.',
            UPLOAD_ERR_FORM_SIZE  => 'File exceeds form size limit.',
            UPLOAD_ERR_PARTIAL    => 'File was only partially uploaded.',
            UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary directory.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION  => 'Upload blocked by server extension.',
            default               => 'Unknown upload error.',
        };
    }
}
