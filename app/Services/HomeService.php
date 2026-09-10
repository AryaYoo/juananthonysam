<?php

namespace App\Services;

use App\Repositories\Contracts\EventRepositoryInterface;
use App\Repositories\Contracts\GalleryRepositoryInterface;

class HomeService
{
    public function __construct(
        protected EventRepositoryInterface $eventRepository,
        protected GalleryRepositoryInterface $galleryRepository
    ) {}

    public function getHomeData(): array
    {
        return [
            'schedules' => [
                [
                    'name' => 'Sunday Service',
                    'time' => '09:00 WIB',
                    'day' => 'Setiap Minggu',
                    'target' => 'Umum & Keluarga',
                    'badge' => 'Main Service',
                    'icon' => 'church',
                ],
                [
                    'name' => 'Ekidz',
                    'time' => '09:30 WIB',
                    'day' => 'Setiap Minggu',
                    'target' => 'Anak-anak (Preschool - SD)',
                    'badge' => 'Kids Ministry',
                    'icon' => 'users',
                ],
                [
                    'name' => 'E-Teens',
                    'time' => '11:00 WIB',
                    'day' => 'Setiap Minggu',
                    'target' => 'Remaja & Pemuda (SMP - SMA)',
                    'badge' => 'Youth Ministry',
                    'icon' => 'sparkles',
                ],
                [
                    'name' => 'Doa Senin & Jumat',
                    'time' => '19:00 WIB',
                    'day' => 'Senin & Jumat',
                    'target' => 'Doa Syafaat Bersama',
                    'badge' => 'Prayer Night',
                    'icon' => 'heart',
                ],
            ],
            'theme_2026' => [
                'year' => '2026',
                'title' => 'Tahun Pemulihan bagi Kemuliaan Tuhan',
                'verse' => '"Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan."',
                'reference' => 'Yeremia 29:11',
            ],
            'giving' => [
                'bank_name' => 'Bank Danamon',
                'account_number' => '0036 1234 5678',
                'account_holder' => 'Gereja Ekklesia Surabaya',
                'm3_code' => 'Danamon M3',
                'qris_info' => 'NMID: ID1020038912384',
            ],
            'featured_events' => $this->eventRepository->getFeatured(),
            'recent_galleries' => $this->galleryRepository->getAllOrdered()->take(6),
        ];
    }
}
