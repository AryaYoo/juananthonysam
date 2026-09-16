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
                    'target' => 'Ibadah Umum & Keluarga',
                    'badge' => 'Main Service',
                    'location' => 'Sanctuary Lt. 2',
                ],
                [
                    'name' => 'Ekidz',
                    'time' => '09:30 WIB',
                    'day' => 'Setiap Minggu',
                    'target' => 'Anak-anak (Preschool - SD)',
                    'badge' => 'Kids Ministry',
                    'location' => 'Sanctuary Lt. 1',
                ],
                [
                    'name' => 'E-Teens',
                    'time' => '11:00 WIB',
                    'day' => 'Setiap Minggu',
                    'target' => 'Remaja & Pemuda (SMP - SMA)',
                    'badge' => 'Youth Ministry',
                    'location' => 'Sanctuary Lt. 3',
                ],
                [
                    'name' => 'Doa Senin',
                    'time' => '19:00 WIB',
                    'day' => 'Setiap Senin Malam',
                    'target' => 'Doa Syafaat & Pengurapan',
                    'badge' => 'Monday Prayer',
                    'location' => 'Zoom Meeting',
                    'is_online' => true,
                ],
                [
                    'name' => 'Doa Jumat',
                    'time' => '19:00 WIB',
                    'day' => 'Setiap Jumat Malam',
                    'target' => 'Mezbah Doa & Hadirat Tuhan',
                    'badge' => 'Friday Prayer',
                    'location' => 'Sanctuary Lt. 2',
                ],
            ],
            'theme_2026' => [
                'year' => '2026',
                'title' => 'Tahun Pemulihan bagi Kemuliaan Tuhan',
                'slogan' => 'Welcome Home',
                'verse' => '"Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan."',
                'reference' => 'Yeremia 29:11',
            ],
            'pastoral_services' => [
                [
                    'title' => 'Layanan Baptisan',
                    'desc' => 'Komitmen iman dan baptisan selam sebagai langkah ketaatan mengikut Kristus.',
                    'whatsapp_text' => 'Halo Pastoral Ekklesia Surabaya, saya rindu mendaftar Layanan Baptisan Selam.',
                    'icon' => 'droplets',
                ],
                [
                    'title' => 'Pemberkatan Pernikahan',
                    'desc' => 'Bimbingan pranikah dan ibadah pemberkatan nikah kudus berlandaskan firman Tuhan.',
                    'whatsapp_text' => 'Halo Pastoral Ekklesia Surabaya, saya ingin berkonsultasi mengenai Layanan Pernikahan Kudus.',
                    'icon' => 'heart',
                ],
                [
                    'title' => 'Penyerahan Anak',
                    'desc' => 'Penyerahan buah hati ke dalam perlindungan dan berkat pemeliharaan Tuhan Yesus.',
                    'whatsapp_text' => 'Halo Pastoral Ekklesia Surabaya, saya ingin mendaftarkan buah hati untuk Layanan Penyerahan Anak.',
                    'icon' => 'baby',
                ],
                [
                    'title' => 'Penghiburan & Dukacita',
                    'desc' => 'Pendampingan pastoral, ibadah penghiburan, dan pelayanan kedukaan bagi keluarga.',
                    'whatsapp_text' => 'Halo Pastoral Ekklesia Surabaya, kami membutuhkan Layanan Doa Penghiburan / Dukacita.',
                    'icon' => 'shield',
                ],
            ],
            'giving' => [
                'bank_name' => 'Bank Danamon',
                'account_number' => '3620.989.776',
                'account_number_raw' => '3620989776',
                'account_holder' => 'GKRI JEMAAT EKKLESIA',
                'm3_code' => 'Persembahan M3',
                'purpose' => 'Untuk lahan/bangunan, gedung, dan sarana',
                'qris_info' => 'NMID: ID1020038912384',
            ],
            'featured_events' => $this->eventRepository->getFeatured(),
            'recent_galleries' => $this->galleryRepository->getAllOrdered()->take(6),
        ];
    }
}
