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
                'location' => 'Main Sanctuary Ekklesia Surabaya (Ruko Ngaglik 2 No 15)',
                'description' => 'Malam hadirat Tuhan dan penyembahan intim tanpa batasan waktu. Terbuka bagi seluruh jemaat dan keluarga.',
                'badge' => 'Monthly Highlight',
            ],
            [
                'name' => 'My Home (Ibadah Rumah ke Rumah / Cabang)',
                'schedule' => 'Setiap Rabu & Kamis Malam',
                'time' => '19:00 WIB',
                'location' => 'Ibadah Rumah ke Rumah & Komunitas Cabang di Berbagai Area Surabaya',
                'description' => 'Persekutuan intim jemaat dari rumah ke rumah untuk bertumbuh bersama dalam firman Tuhan dan saling mendoakan.',
                'badge' => 'Home Fellowship',
            ],
            [
                'name' => 'Ekklesia Family Fellowship (EFF)',
                'schedule' => 'Setiap Bulan Minggu ke-2',
                'time' => '16:00 WIB',
                'location' => 'Fellowship Hall Ekklesia Surabaya',
                'description' => 'Pertemuan akrab keluarga, seminar parenting kristiani, penguatan pernikahan, dan rekreasi bersama jemaat.',
                'badge' => 'Family Ministry',
            ],
            [
                'name' => 'Camp & Annual Retreat',
                'schedule' => 'Tahunan (Tahun 2026)',
                'time' => '3 Hari 2 Malam',
                'location' => 'Retreat Center Jawa Timur',
                'description' => 'Momen perjumpaan pribadi dengan Tuhan, penyegaran rohani, serta kesatuan hati seluruh jemaat Ekklesia Surabaya.',
                'badge' => 'Annual Camp',
            ],
        ];

        return view('pages.events', compact('events', 'featuredEvents', 'recurringPrograms'));
    }
}
