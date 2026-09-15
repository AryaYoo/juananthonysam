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
                'category'   => 'Ibadah duka',
                'image_url'  => asset('images/Dokumentasi1.png'),
                'caption'    => 'Ibadah duka',
                'sort_order' => 2,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 2',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi2.png'),
                'caption'    => 'Kebersamaan dan hadirat Tuhan dalam setiap sesi pelayanan jemaat.',
                'sort_order' => 3,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 3',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi3.png'),
                'caption'    => 'Suasana khidmat dan semangat kebersamaan dalam pelayanan jemaat.',
                'sort_order' => 4,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 4',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi4.png'),
                'caption'    => 'Moment persekutuan dan pelayanan yang memperlihatkan karya Tuhan di tengah jemaat.',
                'sort_order' => 5,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 5',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi5.png'),
                'caption'    => 'Kebersamaan dan sukacita persekutuan jemaat dalam hadirat Tuhan.',
                'sort_order' => 6,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 6',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi6.png'),
                'caption'    => 'Pelayanan dan dedikasi hamba Tuhan beserta jemaat dalam memuliakan nama-Nya.',
                'sort_order' => 7,
            ],
            [
                'title'      => 'Dokumentasi Pelayanan 7',
                'category'   => 'Ibadah',
                'image_url'  => asset('images/Dokumentasi7.png'),
                'caption'    => 'Kasih dan kebersamaan dalam persekutuan serta pelayanan jemaat Ekklesia.',
                'sort_order' => 8,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
