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
