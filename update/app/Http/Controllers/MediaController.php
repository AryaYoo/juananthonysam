<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use App\Services\GalleryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService
    ) {}

    public function index(Request $request): View
    {
        $selectedCategory = $request->query('category', 'all');

        try {
            $galleries = $this->galleryService->getGalleries($selectedCategory);
            if ($galleries->isEmpty()) {
                $all = CmsService::getGalleries();
                if ($selectedCategory !== 'all') {
                    $all = array_filter($all, fn($g) => strcasecmp($g['category'] ?? '', $selectedCategory) === 0);
                }
                $galleries = collect(array_map(fn($g) => (object) $g, $all));
            }
        } catch (\Throwable $e) {
            $all = CmsService::getGalleries();
            if ($selectedCategory !== 'all') {
                $all = array_filter($all, fn($g) => strcasecmp($g['category'] ?? '', $selectedCategory) === 0);
            }
            $galleries = collect(array_map(fn($g) => (object) $g, $all));
        }

        $categories = $this->galleryService->getCategories();
        $channels = CmsService::getChannels();

        return view('pages.media', compact('galleries', 'categories', 'selectedCategory', 'channels'));
    }
}
