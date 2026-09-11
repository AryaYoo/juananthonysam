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
        // Hapus semua data dummy lama
        Gallery::truncate();

        $galleries = [
            [
                'title'      => 'Ekklesia Teen',
                'category'   => 'Teen',
                'image_url'  => asset('images/EkklesiaTeen.png'),
                'caption'    => 'Generasi muda Ekklesia bertumbuh dalam iman, persekutuan, dan pelayanan bersama.',
                'sort_order' => 1,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 1',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi1.png'),
                'caption'    => 'Momen ibadah dan pelayanan jemaat Ekklesia Surabaya.',
                'sort_order' => 2,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 2',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi2.png'),
                'caption'    => 'Kebersamaan dan hadirat Tuhan dalam setiap sesi pelayanan jemaat.',
                'sort_order' => 3,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
