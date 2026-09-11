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
                'subscribers' => 'Official Ministry Channel',
                'handle' => '@ekklesiaministrysurabaya174',
                'link' => 'https://youtube.com/@ekklesiaministrysurabaya174?si=86xQ7dVvr-20WdTj',
                'badge' => 'Sermon & Word',
            ],
            [
                'name' => 'Ekklesia Worship',
                'description' => 'Pujian, penyembahan, cover lagu rohani, dan atmosfer hadirat Tuhan dari tim musik Ekklesia.',
                'subscribers' => 'Official Worship Channel',
                'handle' => '@ekklesiaworship92',
                'link' => 'https://youtube.com/@ekklesiaworship92?si=Shxy7Z3c8AMA4Eeq',
                'badge' => 'Live Worship',
            ],
            [
                'name' => 'Ekklesia World',
                'description' => 'Dokumenter misi, jangkauan komunitas sosial, kesaksian jemaat, dan dampak bagi bangsa-bangsa.',
                'subscribers' => 'Official Mission Channel',
                'handle' => '@ekklesiaworld',
                'link' => 'https://youtube.com/@ekklesiaworld?si=aRE0kFO2YaNY2VSY',
                'badge' => 'Global & Mission',
            ],
        ];

        return view('pages.media', compact('galleries', 'categories', 'selectedCategory', 'channels'));
    }
}
