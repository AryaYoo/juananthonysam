<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profileData = [
            'pastors' => [
                [
                    'name' => 'Pastor Juan Anthony Sam',
                    'role' => 'Lead Pastor',
                    'quote' => 'Membangun gereja keluarga yang berakar dalam Firman, hidup dalam kasih Kristus, dan membawa dampak nyata bagi kota Surabaya.',
                    'bio' => 'Memimpin Ekklesia Surabaya dengan visi menghadirkan keluarga Allah yang sehat, berintegritas, dan memuridkan generasi masa depan.',
                ],
                [
                    'name' => 'Ps Samuel',
                    'role' => 'Associate Pastor',
                    'quote' => 'Pelayanan sejati berawal dari hati yang menyembah dan dedikasi untuk memperlengkapi setiap jemaat bertumbuh dewasa dalam iman.',
                    'bio' => 'Melayani dalam pembinaan jemaat, pengajaran Alkitab, dan penguatan generasi muda serta keluarga di Ekklesia Surabaya.',
                ],
            ],
            'divisions' => [
                [
                    'name' => 'Creative & Media',
                    'desc' => 'Tim produksi visual, live streaming, videografi, audio visual, dan media sosial gereja.',
                    'icon' => 'camera',
                ],
                [
                    'name' => 'Usher & Hospitality',
                    'desc' => 'Menyambut setiap jemaat dan tamu dengan kehangatan kasih Kristus sejak langkah pertama memasuki ruang ibadah.',
                    'icon' => 'heart-handshake',
                ],
                [
                    'name' => 'Worship & Praise',
                    'desc' => 'Memimpin jemaat masuk ke dalam hadirat Tuhan melalui pujian, penyembahan, dan musik yang intim.',
                    'icon' => 'music',
                ],
                [
                    'name' => 'Volunteer General',
                    'desc' => 'Pelayanan operasional, perlengkapan, koordinasi acara, dan dukungan logistik seluruh kegiatan ibadah.',
                    'icon' => 'hands',
                ],
            ],
            'location' => [
                'name' => 'Ekklesia Surabaya',
                'address' => 'Jln Ruko Ngaglik 2 No 15, Surabaya, Jawa Timur',
                'google_maps_url' => 'https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya',
                'whatsapp' => env('WHATSAPP_NUMBER', '+6281234567890'),
            ],
        ];

        return view('pages.profile', $profileData);
    }
}
