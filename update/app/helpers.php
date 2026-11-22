<?php

if (! function_exists('asset_v')) {
    /**
     * Generate an asset path for the application with automatic cache-busting timestamp.
     */
    function asset_v(?string $path): string
    {
        if (! $path) {
            return '';
        }

        $cleanPath = ltrim($path, '/\\');
        $realPath = public_path($cleanPath);
        $version = file_exists($realPath) ? filemtime($realPath) : null;

        return asset($cleanPath) . ($version ? '?v=' . $version : '');
    }
}

if (! function_exists('whatsapp_url')) {
    /**
     * Generate WhatsApp chat link with default message.
     */
    function whatsapp_url(?string $text = null, ?string $number = null): string
    {
        $num = $number ?: env('WHATSAPP_NUMBER', '6281213131060');
        $cleanNumber = preg_replace('/[^0-9]/', '', $num);
        $message = $text ?: 'Halo Pastor, salam dalam kasih kristus';

        return 'https://wa.me/' . $cleanNumber . '?text=' . rawurlencode($message);
    }
}
