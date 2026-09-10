<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Sunday Service & Worship',
                'category' => 'Ibadah',
                'image_url' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Pujian dan penyembahan jemaat dalam ibadah minggu pagi Ekklesia Surabaya.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Khotbah & Pelayanan Firman',
                'category' => 'Ibadah',
                'image_url' => 'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Pemberitaan firman Tuhan penuh urapan dan otoritas rohani.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Ekidz Sunday Class',
                'category' => 'Kidz',
                'image_url' => 'https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Anak-anak Ekidz memuji Tuhan dengan penuh sukacita dan tawa ceria.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Aktivitas Kreatif Ekidz',
                'category' => 'Kidz',
                'image_url' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Belajar firman Tuhan lewat cerita interaktif dan kegiatan mewarnai.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Makan Bersama EFF',
                'category' => 'EFF',
                'image_url' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Persekutuan keluarga Allah dalam kehangatan meja makan dan perbincangan akrab.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Family Bonding & Seminar',
                'category' => 'EFF',
                'image_url' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Sesi pembinaan pernikahan dan parenting keluarga kudus di hadapan Tuhan.',
                'sort_order' => 6,
            ],
            [
                'title' => 'Retreat Fellowship Outdoor',
                'category' => 'Retreat',
                'image_url' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Momen kebersamaan, games kesatuan tubuh Kristus, dan pemulihan rohani.',
                'sort_order' => 7,
            ],
            [
                'title' => 'Api Unggun & Doa Malam Retreat',
                'category' => 'Retreat',
                'image_url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=1200&auto=format&fit=crop',
                'caption' => 'Penyembahan di bawah langit malam dalam kesungguhan hati mencari wajah Allah.',
                'sort_order' => 8,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                $gallery
            );
        }
    }
}
