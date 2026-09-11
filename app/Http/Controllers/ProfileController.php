<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profileData = [
            'vision' => 'Menjadi Gereja Keluarga yang sehat dan memuridkan dalam Yesus Kristus.',
            'mission' => 'Menjadi pribadi-pribadi yang unggul dan profesional, membangun setiap generasi di segala usia, serta membangun keluarga yang kuat, sehat, dan berpusat pada Kristus.',
            'pastors' => [
                [
                    'name' => 'Ps Samuel',
                    'role' => 'Lead Pastor',
                    'quote' => 'Pelayanan sejati berawal dari hati yang menyembah dan dedikasi untuk memperlengkapi setiap jemaat bertumbuh dewasa dalam iman.',
                    'bio' => 'Memimpin Ekklesia Surabaya dengan visi menghadirkan keluarga Allah yang sehat, berintegritas, dan memuridkan generasi masa depan.',
                ],
                [
                    'name' => 'Pastor Juan Anthony Sam',
                    'role' => 'Associate Pastor',
                    'quote' => 'Membangun gereja keluarga yang berakar dalam Firman, hidup dalam kasih Kristus, dan membawa dampak nyata bagi kota Surabaya.',
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
                    'name' => 'Volunteer Pelayanan',
                    'desc' => 'Pelayanan operasional, perlengkapan, koordinasi acara, dan dukungan logistik seluruh kegiatan ibadah jemaat.',
                    'icon' => 'hands',
                ],
            ],
            'location' => [
                'name' => 'Ekklesia Surabaya',
                'address' => 'Jln Ruko Ngaglik 2 No 15, Surabaya, Jawa Timur',
                'google_maps_url' => 'https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya',
                'whatsapp' => env('WHATSAPP_NUMBER', '+6281213131060'),
            ],
        ];

        return view('pages.profile', $profileData);
    }

    public function juan(): View
    {
        $pastor = [
            'name' => 'Pastor Juan Anthony Sam',
            'role' => 'Associate Pastor of Ekklesia Surabaya',
            'title_display' => "Pastor Juan Anthony Sam's Profile",
            'quote' => 'Membangun gereja keluarga yang berakar dalam Firman, hidup dalam kasih Kristus, dan membawa dampak nyata bagi kota Surabaya.',
            'overview' => [
                'Pastor Juan Anthony Sam lahir dan melayani dengan panggilan mendalam bagi generasi dan keluarga di kota Surabaya. Bertumbuh dalam hadirat Tuhan dan keteladanan hamba-hamba Tuhan yang setia, beliau menyerahkan seluruh hidupnya untuk pekerjaan Kerajaan Allah.',
                'Sebagai Associate Pastor Ekklesia Surabaya (GKRI Jemaat Ekklesia), beliau melayani jemaat dengan visi melahirkan pribadi-pribadi yang unggul, berintegritas tinggi, dan profesional di berbagai bidang kehidupan. Pelayanannya menekankan pengajaran Firman yang murni, pemuridan otentik, dan kehadiran Roh Kudus yang memulihkan setiap hati.',
                'Beliau percaya bahwa transformasi sebuah bangsa dan kota berawal dari mezbah keluarga yang kokoh. Bersama Lead Pastor Ps Samuel, seluruh tim pastoral, dan jemaat, Pastor Juan terus memperluas pelayanan misi, pembinaan generasi muda, dan kepedulian sosial di Surabaya dan sekitarnya.',
            ],
            'spiritual_journey' => [
                'Perjumpaan pribadi dengan kasih karunia Yesus Kristus mengubah arah seluruh tujuan hidup Pastor Juan. Di tengah perjalanan mencari arti kehidupan sejati, jamahan Roh Kudus menyadarkannya akan panggilan ilahi untuk menggembalakan dan membangkitkan generasi pemenang.',
                'Panggilan tersebut diteguhkan melalui masa-masa penyerahan diri dalam doa, perenungan firman, dan bimbingan rohani. Dari saat teduh yang intim di hadapan Tuhan, lahirlah kerinduan yang membara untuk mendirikan sebuah rumah rohani di mana setiap orang—tanpa memandang latar belakang—dapat merasakan kehangatan keluarga Allah dan dipulihkan seutuhnya.',
            ],
            'background' => [
                'Pastor Juan menempuh pendidikan dan pembinaan teologis serta kepemimpinan Kristen dengan tekun. Latar belakang kedisiplinan dan kecintaan pada pembelajaran firman membentuk karakter kepemimpinannya yang rendah hati, berwibawa, dan dapat dipercaya.',
                'Keluarga merupakan prioritas utama dalam kehidupan dan pelayanannya. Beliau bersama keluarga senantiasa menjadi teladan dalam membangun mezbah doa rumah tangga, hidup dalam kesederhanaan, dan memancarkan kasih Kristus kepada sesama.',
            ],
            'ministry' => [
                'Pelayanan Pastor Juan berpusat pada penggembalaan jemaat Ekklesia Surabaya, pembinaan khotbah mingguan, pemuridan generasi muda (E-Teens), dan penjangkauan keluarga melalui komunitas sel My Home.',
                'Melalui ibadah doa Senin & Jumat serta Worship Night bulanan, pelayanan beliau senantiasa menghadirkan atmosfer doa dan pujian penyembahan yang sarat dengan hadirat dan pengurapan Roh Kudus. Banyak kesaksian hidup jemaat yang dipulihkan, pernikahan yang disembuhkan, dan anak-anak muda yang menemukan panggilan hidupnya melalui bimbingan pastoral beliau.',
            ],
            'vision_mission' => [
                'Visi Pastor Juan berakar teguh pada amanat agung: "Menjadi Gereja Keluarga yang sehat dan memuridkan dalam Yesus Kristus."',
                'Misi hidupnya adalah melatih setiap jemaat menjadi pribadi yang unggul dan profesional, membangun setiap generasi di segala usia, dan memastikan setiap keluarga berdiri teguh di atas dasar kasih karunia Tuhan Yesus Kristus hingga kedatangan-Nya yang kedua kali.',
            ],
        ];

        return view('pages.pastor-juan', compact('pastor'));
    }

    public function samuel(): View
    {
        $pastor = [
            'name' => 'Ps Samuel',
            'role' => 'Lead Pastor of Ekklesia Surabaya',
            'title_display' => "Ps Samuel's Profile",
            'quote' => 'Pelayanan sejati berawal dari hati yang menyembah dan dedikasi untuk memperlengkapi setiap jemaat bertumbuh dewasa dalam iman.',
            'overview' => [
                'Ps Samuel melayani sebagai Lead Pastor di Ekklesia Surabaya dengan hati seorang gembala yang setia dan penuh dedikasi. Beliau memimpin kepemimpinan pastoral dalam visi penggembalaan, pengajaran firman, konseling, dan pembinaan rohani jemaat.',
                'Dengan karunia pengajaran yang sistematis dan praktis, Ps Samuel giat memperlengkapi jemaat dari berbagai rentang usia untuk memahami kebenaran Alkitab dan mengaplikasikannya dalam keseharian, keluarga, dan lingkungan kerja.',
                'Kerinduan terbesarnya adalah melihat setiap orang percaya bertumbuh dari bayi rohani menjadi murid Kristus yang dewasa, mandiri, dan berbuah lebat bagi kemuliaan Bapa di surga.',
            ],
            'spiritual_journey' => [
                'Pengalaman pribadi akan kesetiaan Tuhan di masa-masa sulit membimbing Ps Samuel mengambil komitmen seumur hidup untuk melayani jemaat. Tuhan menaruh belas kasihan mendalam di hatinya bagi mereka yang bergumul dalam iman dan membutuhkan bimbingan firman.',
                'Melalui ketekunan dalam doa dan persekutuan dengan firman Tuhan, Ps Samuel terus diteguhkan untuk menjadi tiang penopang dalam pergerakan rohani Ekklesia Surabaya, berdiri bersama para hamba Tuhan lainnya untuk membawa pemulihan bagi kota.',
            ],
            'background' => [
                'Dengan latar belakang pembinaan rohani dan ketertarikan mendalam pada studi teologi dan Alkitabiah, Ps Samuel memiliki pendekatan penggembalaan yang hangat, penuh empati, dan mendengarkan.',
                'Kehidupannya diwarnai oleh komitmen pada integritas moral dan kesetiaan pelayanan di balik layar maupun di atas mimbar, senantiasa mengutamakan kemuliaan nama Tuhan di atas segalanya.',
            ],
            'ministry' => [
                'Sebagai Lead Pastor Ekklesia Surabaya, Ps Samuel aktif memimpin pembinaan komunitas sel My Home, kelas katekisasi baptisan, serta pelayanan pastoral care bagi keluarga yang membutuhkan doa dan penghiburan.',
                'Beliau juga secara berkala membagikan renungan firman dan pesan rohani melalui platform media dan pertemuan doa jemaat, memperkuat fondasi doktrin yang sehat di tengah tantangan zaman.',
            ],
            'vision_mission' => [
                'Melihat setiap anggota keluarga Ekklesia Surabaya memiliki iman yang tangguh, berakar kokoh dalam kebenaran firman Tuhan, dan mempraktikkan kasih Kristus secara nyata.',
                'Terus memimpin jemaat bersama Pastor Juan Anthony Sam untuk membangun gereja keluarga yang berdampak, memuridkan generasi masa depan, dan memuliakan Kristus di kota Surabaya.',
            ],
        ];

        return view('pages.pastor-samuel', compact('pastor'));
    }
}
