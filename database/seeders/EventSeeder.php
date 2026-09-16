<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Worship Night: Hadirat & Pemulihan',
                'slug' => 'worship-night-hadirat-dan-pemulihan',
                'category' => 'Worship',
                'description' => 'Malam doa, pujian, dan penyembahan bersama seluruh jemaat Ekklesia Surabaya. Mengalami perjumpaan yang mengubahkan bersama Tuhan Yesus Kristus.',
                'schedule_info' => 'Jumat, Minggu ke-4 Tiap Bulan',
                'time_info' => '19:00 WIB',
                'location' => 'Sanctuary Ekklesia Surabaya - Ruko Ngaglik 2 No 15',
                'image_url' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?q=80&w=1200&auto=format&fit=crop',
                'badge' => 'Monthly Highlight',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'My Home: Persekutuan Komunitas Sel',
                'slug' => 'my-home-persekutuan-komunitas-sel',
                'category' => 'Fellowship',
                'description' => 'Keluarga Allah yang bertumbuh bersama dalam firman Tuhan, saling menopang dalam doa, dan mempraktikkan kasih Kristus dalam keseharian hidup.',
                'schedule_info' => 'Setiap Rabu & Kamis Malam',
                'time_info' => '19:00 WIB',
                'location' => 'Multi-lokasi di Area Surabaya (Barat, Timur, Pusat)',
                'image_url' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200&auto=format&fit=crop',
                'badge' => 'Weekly Fellowship',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'EFF (Ekklesia Family Fellowship)',
                'slug' => 'eff-ekklesia-family-fellowship',
                'category' => 'Family',
                'description' => 'Persekutuan khusus keluarga yang mempererat hubungan suami-istri, orang tua dan anak, serta membangun mezbah keluarga yang kokoh.',
                'schedule_info' => 'Minggu ke-2 Tiap Bulan',
                'time_info' => '16:00 WIB',
                'location' => 'Main Hall Ekklesia Surabaya',
                'image_url' => asset('images/EFF3.png'),
                'badge' => 'Family Gathering',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Retreat Pemulihan & Kepemimpinan 2026',
                'slug' => 'retreat-pemulihan-dan-kepemimpinan-2026',
                'category' => 'Retreat',
                'description' => 'Retreat akbar 3 hari 2 malam untuk seluruh pelayan jemaat dan keluarga. Mengambil waktu khusus di kaki Tuhan dalam tema Tahun Pemulihan bagi Kemuliaan Tuhan.',
                'schedule_info' => 'Juni 2026 (Jadwal Segera Diumumkan)',
                'time_info' => '3 Hari 2 Malam',
                'location' => 'Pacet Retreat Center, Mojokerto',
                'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop',
                'badge' => 'Special Event 2026',
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(['slug' => $event['slug']], $event);
        }
    }
}
