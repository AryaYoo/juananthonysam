<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IbadahController extends Controller
{
    /**
     * Halaman Ibadah: My Home (Komunitas Sel & Rumah ke Rumah)
     */
    public function myHome(): View
    {
        $data = [
            'pageName' => 'My Home',
            'title' => 'My Home — Komunitas Sel & Persekutuan Jemaat Ekklesia Surabaya',
            'metaDescription' => 'Komunitas sel My Home Ekklesia Surabaya: persekutuan keluarga Allah dari rumah ke rumah untuk bertumbuh bersama dalam firman Tuhan, saling menopang dalam doa, dan mempraktikkan kasih Kristus.',
            'marqueeText' => 'MY HOME • PERSEKUTUAN KOMUNITAS SEL EKKLESIA SURABAYA',
            'heroSlides' => [
                [
                    'image' => 'images/MyHome1.png',
                    'alt' => 'Suasana Persekutuan Komunitas Sel My Home',
                ],
                [
                    'image' => 'images/Dokumentasi1.png',
                    'alt' => 'Kebersamaan Jemaat dalam Persekutuan My Home',
                ],
                [
                    'image' => 'images/Dokumentasi5.png',
                    'alt' => 'Kehangatan Kasih Kristus di Komunitas My Home',
                ],
            ],
            'headingLines' => ['MY', 'HOME'],
            'tagline' => 'KOMUNITAS SEL & PERSEKUTUAN RUMAH',
            'descriptionParagraphs' => [
                'Komunitas sel di Ekklesia Surabaya dikenal dengan sebutan My Home. Di tempat inilah setiap jemaat saling mengenal lebih dekat, berakar bersama di dalam firman Tuhan, dan mengalami kehangatan keluarga rohani yang sejati. Kami percaya bahwa pertumbuhan iman yang sehat tidak hanya terjadi di ruang ibadah raya, melainkan terbangun kuat melalui persekutuan intim di mana setiap orang didengarkan, didoakan, dan dikuatkan.',
                'Dalam My Home, Anda tidak berjalan sendirian dalam menghadapi dinamika kehidupan. Teman-teman seiman hadir menjadi sahabat dan keluarga rohani yang saling mendukung, saling mendoakan, serta bersama-sama mempraktikkan kasih Kristus dalam keseharian di kota Surabaya.',
            ],
            'schedule' => [
                'name' => 'My Home (Persekutuan Sel Rumah ke Rumah)',
                'day' => 'Setiap Rabu & Kamis Malam',
                'time' => '19:00 WIB - Selesai',
                'location' => 'Multi-lokasi di Area Surabaya (Barat, Timur, Pusat) / Rumah Jemaat',
                'target' => 'Seluruh Jemaat & Keluarga (Dewasa Muda, Profesional, dan Keluarga)',
                'badge' => 'Weekly Fellowship',
                'whatsappMessage' => 'Halo Pastoral Ekklesia, saya rindu bergabung dan mencari kelompok sel My Home terdekat dari area saya.',
            ],
        ];

        return view('pages.ibadah.detail', $data);
    }

    /**
     * Halaman Ibadah: Ekidz (Pelayanan & Ibadah Anak)
     */
    public function ekidz(): View
    {
        $data = [
            'pageName' => 'Ekidz',
            'title' => 'Ekidz — Ibadah & Pelayanan Anak Gereja Ekklesia Surabaya',
            'metaDescription' => 'Pelayanan anak Ekidz di Ekklesia Surabaya: ibadah yang penuh sukacita, pengajaran Alkitab yang kreatif, dan pembentukan karakter kristiani bagi generasi masa depan.',
            'marqueeText' => 'EKIDZ • IBADAH ANAK & GENERASI BINTANG EKKLESIA SURABAYA',
            'heroSlides' => [
                [
                    'image' => 'images/Dokumentasi7.png',
                    'alt' => 'Sukacita Ibadah Anak Ekidz',
                ],
                [
                    'image' => 'images/EFF1.png',
                    'alt' => 'Kebersamaan Anak dan Keluarga di Ekidz',
                ],
                [
                    'image' => 'images/Dokumentasi3.png',
                    'alt' => 'Aktivitas Rohani & Pembinaan Karakter Ekidz',
                ],
            ],
            'headingLines' => ['E', 'KIDZ'],
            'tagline' => 'KIDS MINISTRY & GENERASI BINTANG',
            'descriptionParagraphs' => [
                'Gereja anak di Ekklesia Surabaya dikenal dengan sebutan Ekidz. Di tempat inilah anak-anak sejak usia dini diperkenalkan kepada kasih Tuhan Yesus yang tak terbatas melalui pujian dan penyembahan yang penuh sukacita, kisah firman Tuhan yang interaktif, serta aktivitas pembentukan karakter kristiani.',
                'Kami percaya bahwa setiap anak adalah benih ilahi berharga yang dipersiapkan Tuhan bagi masa depan yang penuh harapan. Melalui guru-guru sekolah minggu yang penuh kasih dan ruang ibadah yang aman serta nyaman, Ekidz berkomitmen menanamkan nilai-nilai kebenaran Alkitab agar anak-anak bertumbuh menjadi generasi yang takut akan Tuhan, berkarakter unggul, dan menjadi terang di mana pun mereka berada.',
            ],
            'schedule' => [
                'name' => 'Ekidz Sunday Service',
                'day' => 'Setiap Hari Minggu',
                'time' => '09:30 WIB',
                'location' => 'Sanctuary Lt. 1, Gereja Ekklesia Surabaya (Jln Ruko Ngaglik 2 No 15)',
                'target' => 'Anak-anak Usia 3 – 12 Tahun (Preschool hingga Sekolah Dasar)',
                'badge' => 'Kids Ministry',
                'whatsappMessage' => 'Halo Kakak Pembina Ekidz, saya ingin menanyakan informasi mengenai ibadah anak Ekidz untuk putra/putri saya.',
            ],
        ];

        return view('pages.ibadah.detail', $data);
    }

    /**
     * Halaman Ibadah: Ekklesia Teens (Remaja & Pemuda)
     */
    public function teens(): View
    {
        $data = [
            'pageName' => 'Ekklesia Teens',
            'title' => 'Ekklesia Teens — Ibadah Remaja & Pemuda Gereja Ekklesia Surabaya',
            'metaDescription' => 'Komunitas remaja dan pemuda Ekklesia Teens di Ekklesia Surabaya: tempat generasi muda berjumpa secara pribadi dengan Tuhan Yesus, mengalami perubahan hidup, dan memimpin dengan teladan.',
            'marqueeText' => 'EKKLESIA TEENS • YOUTH & TEEN MINISTRY EKKLESIA SURABAYA',
            'heroSlides' => [
                [
                    'image' => 'images/EkklesiaTeen.png',
                    'alt' => 'Ibadah Remaja & Pemuda Ekklesia Teens',
                ],
                [
                    'image' => 'images/WorshipNight3.png',
                    'alt' => 'Penyembahan & Kebersamaan Ekklesia Teens',
                ],
                [
                    'image' => 'images/Dokumentasi4.png',
                    'alt' => 'Komunitas Generasi Muda Ekklesia Teens',
                ],
            ],
            'headingLines' => ['EKKLESIA', 'TEENS'],
            'tagline' => 'YOUTH & TEEN GENERATION',
            'descriptionParagraphs' => [
                'Gereja anak muda dan remaja di Ekklesia Surabaya dikenal dengan sebutan Ekklesia Teens. Di tempat inilah anak-anak muda berjumpa dengan Tuhan dan mengalami pemulihan serta perubahan hidup yang nyata. Kami percaya bahwa Tuhan menjanjikan masa depan yang penuh harapan dan di dalam perjalanan iman, Anda tidak sendiri di rumah ini.',
                'Karena Ekklesia Teens menjadi sahabat dan keluarga rohani yang selalu mendukung, membimbing, dan mendoakan. Bersama-sama, kami rindu memperlengkapi setiap remaja dan pemuda agar memiliki identitas yang kokoh di dalam Kristus, mengasah potensi terbaik, serta menjadi teladan dalam perkataan, tingkah laku, dan iman di tengah sekolah, kampus, maupun masyarakat.',
            ],
            'schedule' => [
                'name' => 'E-Teens Service',
                'day' => 'Setiap Hari Minggu',
                'time' => '11:00 WIB',
                'location' => 'Sanctuary Lt. 3, Gereja Ekklesia Surabaya (Jln Ruko Ngaglik 2 No 15)',
                'target' => 'Remaja & Pemuda (Usia SMP, SMA, hingga Mahasiswa Awal)',
                'badge' => 'Youth Ministry',
                'whatsappMessage' => 'Halo Tim Ekklesia Teens, saya ingin mendapatkan info jadwal dan ingin bergabung dengan ibadah E-Teens.',
            ],
        ];

        return view('pages.ibadah.detail', $data);
    }
}
