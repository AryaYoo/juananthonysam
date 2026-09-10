<?php

namespace App\Http\Controllers;

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
        $galleries = $this->galleryService->getGalleries($selectedCategory);
        $categories = $this->galleryService->getCategories();

        $channels = [
            [
                'name' => 'Ekklesia Ministry',
                'description' => 'Khotbah mingguan, renungan firman, dan pesan pastoral dari Pastor Juan Anthony Sam & Ps Samuel.',
                'subscribers' => 'Channel Resmi',
                'handle' => '@ekklesiaministry',
                'featured_video_id' => 'dQw4w9WgXcQ', // Clean embedded video placeholder
                'link' => 'https://youtube.com',
                'badge' => 'Sermon & Word',
            ],
            [
                'name' => 'Ekklesia Worship',
                'description' => 'Pujian, penyembahan, cover lagu rohani, dan atmosfer hadirat Tuhan dari tim Ekklesia Praise & Worship.',
                'subscribers' => 'Channel Musik',
                'handle' => '@ekklesiaworship',
                'featured_video_id' => 'dQw4w9WgXcQ',
                'link' => 'https://youtube.com',
                'badge' => 'Live Worship',
            ],
            [
                'name' => 'Ekklesia World',
                'description' => 'Dokumenter misi, jangkauan komunitas sosial, kesaksian hidup jemaat, dan dampak bagi bangsa-bangsa.',
                'subscribers' => 'Channel Misi',
                'handle' => '@ekklesiaworld',
                'featured_video_id' => 'dQw4w9WgXcQ',
                'link' => 'https://youtube.com',
                'badge' => 'Global & Mission',
            ],
        ];

        return view('pages.media', compact('galleries', 'categories', 'selectedCategory', 'channels'));
    }
}
