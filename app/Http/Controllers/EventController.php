<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct(
        protected EventService $eventService
    ) {}

    public function index(): View
    {
        $events = $this->eventService->getAllEvents();
        $featuredEvents = $this->eventService->getFeaturedEvents();

        $recurringPrograms = [
            [
                'name' => 'Worship Night',
                'schedule' => 'Setiap Jumat Minggu ke-4',
                'time' => '19:00 WIB - Selesai',
                'location' => 'Main Sanctuary Ekklesia Surabaya',
                'description' => 'Malam hadirat Tuhan dan penyembahan intim tanpa batasan waktu. Terbuka bagi seluruh jemaat dan keluarga.',
                'badge' => 'Monthly Highlight',
            ],
            [
                'name' => 'My Home (Komunitas Sel)',
                'schedule' => 'Setiap Rabu & Kamis Malam',
                'time' => '19:00 WIB',
                'location' => 'Rumah-rumah Jemaat di Berbagai Wilayah Surabaya',
                'description' => 'Gereja dalam komunitas kecil tempat bertumbuh, saling mendoakan, dan berbagi berkat kehidupan.',
                'badge' => 'Family Fellowship',
            ],
            [
                'name' => 'EFF (Ekklesia Family Fellowship)',
                'schedule' => 'Setiap Bulan Minggu ke-2',
                'time' => '16:00 WIB',
                'location' => 'Fellowship Hall & Outdoor Venue',
                'description' => 'Pertemuan akrab keluarga, seminar parenting kristiani, penguatan pernikahan, dan rekreasi bersama.',
                'badge' => 'Family Ministry',
            ],
            [
                'name' => 'Camp & Annual Retreat',
                'schedule' => 'Tahunan (Mid-Year / End-Year)',
                'time' => '3 Hari 2 Malam',
                'location' => 'Retreat Center Jawa Timur',
                'description' => 'Momen perjumpaan pribadi dengan Tuhan, penyegaran rohani, serta kesatuan hati seluruh jemaat Ekklesia.',
                'badge' => 'Annual Camp',
            ],
        ];

        return view('pages.events', compact('events', 'featuredEvents', 'recurringPrograms'));
    }
}
