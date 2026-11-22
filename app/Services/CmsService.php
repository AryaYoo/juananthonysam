<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\PrayerRequest;
use Illuminate\Support\Str;
use Throwable;

class CmsService
{
    protected static ?array $cachedData = [];

    /**
     * Dapatkan path file JSON CMS
     */
    protected static function getPath(string $filename): string
    {
        $dir = storage_path('app/cms');
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return $dir . '/' . $filename . '.json';
    }

    /**
     * Baca data JSON atau fallback ke default
     */
    public static function read(string $filename, array $default = []): array
    {
        $path = self::getPath($filename);
        if (!file_exists($path)) {
            self::write($filename, $default);
            return $default;
        }

        $content = @file_get_contents($path);
        if ($content === false || trim($content) === '') {
            return $default;
        }

        $data = json_decode($content, true);
        return is_array($data) ? array_replace_recursive($default, $data) : $default;
    }

    /**
     * Simpan data ke JSON
     */
    public static function write(string $filename, array $data): bool
    {
        $path = self::getPath($filename);
        $encoded = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return (bool) @file_put_contents($path, $encoded);
    }

    // =========================================================================
    // 1. BERANDA (HOME)
    // =========================================================================

    public static function defaultHome(): array
    {
        return [
            'hero_slides' => [
                [
                    'image' => '/images/Poster1.jpg',
                    'alt' => 'Saat Teduh Bersama - Ps Juan Anthony Sam',
                    'link' => '',
                ],
                [
                    'image' => '/images/Poster2.jpg',
                    'alt' => 'Jadwal Ibadah Ekklesia Surabaya',
                    'link' => '',
                ],
                [
                    'image' => '/images/Poster3.jpg',
                    'alt' => 'Himbauan Kehati-hatian dan Waspada Penipuan',
                    'link' => '',
                ],
            ],
            'hero' => [
                'tagline' => 'GEREJA KELUARGA & PEMURIDAN',
                'title' => 'Ekklesia Surabaya',
                'subtitle' => 'Rumah di mana setiap jiwa dipulihkan, keluarga dikuatkan, dan generasi masa depan diperlengkapi bagi kemuliaan Kristus.',
                'youtube_live_url' => 'https://youtube.com/@ekklesiaministrysurabaya174',
                'whatsapp_url' => 'https://wa.me/6281213131060',
            ],
            'theme_2026' => [
                'year' => '2026',
                'title' => 'Tahun Pemulihan bagi Kemuliaan Tuhan',
                'slogan' => 'Welcome Home',
                'verse' => '"Sebab Aku ini mengetahui rancangan-rancangan apa yang ada pada-Ku mengenai kamu, demikianlah firman TUHAN, yaitu rancangan damai sejahtera dan bukan rancangan kecelakaan, untuk memberikan kepadamu hari depan yang penuh harapan."',
                'reference' => 'Yeremia 29:11',
            ],
            'giving' => [
                'bank_name' => 'Bank Danamon',
                'account_number' => '3620.989.776',
                'account_number_raw' => '3620989776',
                'account_holder' => 'GKRI JEMAAT EKKLESIA',
                'm3_code' => 'Persembahan M3',
                'purpose' => 'Untuk lahan/bangunan, gedung, dan sarana',
                'qris_info' => 'NMID: ID1020038912384',
                'notes' => 'Tuhan mengasihi orang yang memberi dengan sukacita (2 Korintus 9:7). Setiap benih yang Anda tabur mendukung pekerjaan Kerajaan Allah.',
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
        ];
    }

    /**
     * Bersihkan path asset/gambar agar tidak hardcode domain (APP_URL).
     * Ubah http(s)://domain.../uploads/... menjadi relative /uploads/...
     */
    public static function cleanAssetPath(?string $path): string
    {
        if (empty($path)) {
            return '';
        }
        $path = trim($path);

        // Jika path mengarah ke /uploads/ di server ini, ambil relative path-nya saja
        if (preg_match('~/(uploads/[^"\'\s?#]+)~', $path, $m)) {
            return '/' . $m[1];
        }

        // Jika path mengarah ke /images/ bawaan
        if (preg_match('~/(images/[^"\'\s?#]+)~', $path, $m)) {
            return '/' . $m[1];
        }

        return $path;
    }

    public static function getHome(): array
    {
        $data = self::read('home', self::defaultHome());

        // Sanitasi hero_slides agar bebas dari domain yang salah/berubah
        if (!empty($data['hero_slides']) && is_array($data['hero_slides'])) {
            foreach ($data['hero_slides'] as &$slide) {
                if (isset($slide['image'])) {
                    $slide['image'] = self::cleanAssetPath($slide['image']);
                }
            }
            unset($slide);
        }

        return $data;
    }

    public static function saveHome(array $data): bool
    {
        if (!empty($data['hero_slides']) && is_array($data['hero_slides'])) {
            foreach ($data['hero_slides'] as &$slide) {
                if (isset($slide['image'])) {
                    $slide['image'] = self::cleanAssetPath($slide['image']);
                }
            }
            unset($slide);
        }

        return self::write('home', $data);
    }

    // =========================================================================
    // 2. JADWAL IBADAH (SCHEDULES)
    // =========================================================================

    public static function defaultSchedules(): array
    {
        return [
            [
                'id' => 'sunday-service',
                'name' => 'Sunday Service',
                'time' => '09:00 WIB',
                'day' => 'Setiap Minggu',
                'target' => 'Ibadah Umum & Keluarga',
                'badge' => 'Main Service',
                'location' => 'Sanctuary Lt. 2',
                'is_online' => false,
            ],
            [
                'id' => 'ekidz',
                'name' => 'Ekidz',
                'time' => '09:30 WIB',
                'day' => 'Setiap Minggu',
                'target' => 'Anak-anak (Preschool - SD)',
                'badge' => 'Kids Ministry',
                'location' => 'Sanctuary Lt. 1',
                'is_online' => false,
            ],
            [
                'id' => 'e-teens',
                'name' => 'E-Teens',
                'time' => '11:00 WIB',
                'day' => 'Setiap Minggu',
                'target' => 'Remaja & Pemuda (SMP - SMA)',
                'badge' => 'Youth Ministry',
                'location' => 'Sanctuary Lt. 3',
                'is_online' => false,
            ],
            [
                'id' => 'doa-senin',
                'name' => 'Doa Senin',
                'time' => '19:00 WIB',
                'day' => 'Setiap Senin Malam',
                'target' => 'Doa Syafaat & Pengurapan',
                'badge' => 'Monday Prayer',
                'location' => 'Zoom Meeting',
                'is_online' => true,
            ],
            [
                'id' => 'doa-jumat',
                'name' => 'Doa Jumat',
                'time' => '19:00 WIB',
                'day' => 'Setiap Jumat Malam',
                'target' => 'Mezbah Doa & Hadirat Tuhan',
                'badge' => 'Friday Prayer',
                'location' => 'Sanctuary Lt. 2',
                'is_online' => false,
            ],
        ];
    }

    public static function getSchedules(): array
    {
        $data = self::read('schedules', ['items' => self::defaultSchedules()]);
        return $data['items'] ?? self::defaultSchedules();
    }

    public static function saveSchedules(array $items): bool
    {
        return self::write('schedules', ['items' => array_values($items)]);
    }

    // =========================================================================
    // 3. PROFIL GEREJA (PROFILE)
    // =========================================================================

    public static function defaultProfile(): array
    {
        return [
            'vision' => 'Menjadi Gereja Keluarga yang sehat dan memuridkan dalam Yesus Kristus.',
            'mission' => 'Menjadi pribadi-pribadi yang unggul dan profesional, membangun setiap generasi di segala usia, serta membangun keluarga yang kuat, sehat, dan berpusat pada Kristus.',
            'location' => [
                'name' => 'Ekklesia Surabaya',
                'address' => 'Jln Ruko Ngaglik 2 No 15, Surabaya, Jawa Timur',
                'google_maps_url' => 'https://maps.google.com/?q=Jln+Ruko+Ngaglik+2+No+15+Surabaya',
                'whatsapp' => env('WHATSAPP_NUMBER', '+6281213131060'),
                'email' => 'hello@juananthonysam.com',
                'phone' => '+62 812-1313-1060',
            ],
            'pastors' => [
                [
                    'name' => 'Ps Samuel',
                    'role' => 'Lead Pastor',
                    'quote' => 'Pelayanan sejati berawal dari hati yang menyembah dan dedikasi untuk memperlengkapi setiap jemaat bertumbuh dewasa dalam iman.',
                    'bio' => 'Memimpin Ekklesia Surabaya dengan visi menghadirkan keluarga Allah yang sehat, berintegritas, dan memuridkan generasi masa depan.',
                    'link' => route('pastor.samuel'),
                ],
                [
                    'name' => 'Pastor Juan Anthony Sam',
                    'role' => 'Associate Pastor',
                    'quote' => 'Membangun gereja keluarga yang berakar dalam Firman, hidup dalam kasih Kristus, dan membawa dampak nyata bagi kota Surabaya.',
                    'bio' => 'Melayani dalam pembinaan jemaat, pengajaran Alkitab, dan penguatan generasi muda serta keluarga di Ekklesia Surabaya.',
                    'link' => route('pastor.juan'),
                ],
            ],
            'divisions' => [
                [
                    'name' => 'Creative & Media',
                    'tag' => 'Visual & Production',
                    'desc' => 'Tim produksi visual, live streaming, videografi, audio visual, lighting, dan pengelolaan media sosial gereja.',
                    'icon' => 'camera',
                    'highlights' => ['Live Streaming & Camera', 'Audio & Sound System', 'Graphic & Social Media'],
                ],
                [
                    'name' => 'Usher & Hospitality',
                    'tag' => 'Welcoming & Care',
                    'desc' => 'Menyambut setiap jemaat dan tamu dengan kehangatan kasih Kristus sejak langkah pertama memasuki rumah Tuhan.',
                    'icon' => 'heart-handshake',
                    'highlights' => ['Penyambutan Jemaat', 'Pelayanan Ruang Ibadah', 'Informasi & Keramahan'],
                ],
                [
                    'name' => 'Ministry of Service',
                    'tag' => 'Support & Operations',
                    'desc' => 'Pelayanan operasional lapangan, logistik perlengkapan, tata panggung, serta koordinasi teknis kelancaran ibadah.',
                    'icon' => 'hands',
                    'highlights' => ['Logistik & Perlengkapan', 'Operasional Ibadah', 'Dukungan Teknis Lapangan'],
                ],
            ],
        ];
    }

    public static function getProfile(): array
    {
        $data = self::read('profile', self::defaultProfile());
        if (!empty($data['divisions']) && is_array($data['divisions'])) {
            foreach ($data['divisions'] as &$div) {
                if (isset($div['name']) && $div['name'] === 'Volunteer Pelayanan') {
                    $div['name'] = 'Ministry of Service';
                }
            }
            unset($div);
        }
        return $data;
    }

    public static function saveProfile(array $data): bool
    {
        return self::write('profile', $data);
    }

    // =========================================================================
    // 4. PROFIL GEMBALA (PASTOR JUAN & PS SAMUEL)
    // =========================================================================

    public static function defaultPastorJuan(): array
    {
        return [
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
    }

    public static function defaultPastorSamuel(): array
    {
        return [
            'name' => 'Ps Samuel',
            'role' => 'Lead Pastor of Ekklesia Surabaya',
            'title_display' => "Ps Samuel's Profile",
            'quote' => 'Pelayanan sejati berawal dari hati yang menyembah dan dedikasi untuk memperlengkapi setiap jemaat bertumbuh dewasa dalam iman.',
            'overview' => [
                'Ps Samuel adalah Lead Pastor yang telah mendedikasikan hidupnya selama puluhan tahun untuk menggembalakan, melayani, dan merintis pekerjaan Tuhan di Surabaya. Dengan ketulusan hati kebapakan dan hikmat kepemimpinan rohani, beliau memimpin Ekklesia Surabaya menjadi gereja yang berakar kokoh dalam firman Tuhan.',
                'Kepemimpinannya senantiasa berfokus pada pembangunan manusia rohani, pemuridan berkelanjutan, serta menciptakan atmosfer gereja keluarga yang ramah, hangat, dan penuh kasih. Beliau memandang setiap jiwa berharga dan layak menerima perhatian serta pendampingan pastoral yang tulus.',
                'Bersama Pastor Juan Anthony Sam dan segenap hamba Tuhan, Ps Samuel terus memajukan visi gereja keluarga yang memuridkan dan berdampak nyata bagi transformasi kota Surabaya dan Indonesia.',
            ],
            'spiritual_journey' => [
                'Sejak masa mudanya, Ps Samuel telah menyerahkan kehidupannya bagi Kristus. Berbagai ujian iman, tantangan pelayanan, dan mukjizat pemeliharaan Tuhan mewarnai jejak langkah pelayanannya hingga hari ini.',
                'Kesetiaan beliau dalam perkara-perkara kecil membawanya dipercayakan memimpin jemaat Tuhan dengan integritas yang tak bercela. Prinsip keteladanan hidup, kerendahan hati, dan doa yang tekun menjadi dasar yang terus diwariskannya kepada generasi penerus.',
            ],
            'background' => [
                'Ps Samuel memiliki latar belakang penggembalaan yang luas dengan pemahaman mendalam tentang doktrin alkitabiah dan tata gereja yang sehat. Pengalaman panjangnya menjadikan beliau seorang konselor rohani dan bapa yang dipercaya oleh jemaat dari berbagai kalangan.',
                'Kehidupan rumah tangga beliau senantiasa menjadi teladan dan inspirasi bagi jemaat dalam membangun keluarga kudus yang berkenan di hadapan Allah.',
            ],
            'ministry' => [
                'Sebagai Lead Pastor, Ps Samuel memegang arah penggembalaan, kepemimpinan pastoral, serta pengajaran doktrinal gereja. Beliau aktif dalam pelayanan khotbah mimbar, konseling keluarga, pemberkatan nikah, dan ibadah kedukaan/penghiburan.',
                'Fokus pelayanannya adalah memastikan setiap keluarga jemaat memiliki dasar firman yang kuat dalam menghadapi arus zaman, serta menumbuhkan budaya doa dan penyembahan yang murni di seluruh lini persekutuan.',
            ],
            'vision_mission' => [
                'Visi pelayanan Ps Samuel selaras dengan visi besar Ekklesia: "Menjadi Gereja Keluarga yang sehat dan memuridkan dalam Yesus Kristus."',
                'Kerinduan terbesarnya adalah melihat setiap jemaat—dari anak-anak, remaja, dewasa, hingga lansia—mengalami hadirat Tuhan secara nyata, bertumbuh dalam pengenalan akan Kristus, dan hidup menjadi saksi kebenaran yang memuliakan Bapa di Surga.',
            ],
        ];
    }

    public static function getPastor(string $key): array
    {
        $default = ($key === 'samuel') ? self::defaultPastorSamuel() : self::defaultPastorJuan();
        return self::read('pastor_' . $key, $default);
    }

    public static function savePastor(string $key, array $data): bool
    {
        return self::write('pastor_' . $key, $data);
    }

    // =========================================================================
    // 5. HALAMAN IBADAH KHUSUS (MY HOME, EKIDZ, EKKLESIA TEENS)
    // =========================================================================

    public static function defaultIbadahAll(): array
    {
        return [
            'my-home' => [
                'pageName' => 'My Home',
                'title' => 'My Home — Komunitas Sel & Persekutuan Jemaat Ekklesia Surabaya',
                'metaDescription' => 'Komunitas sel My Home Ekklesia Surabaya: persekutuan keluarga Allah dari rumah ke rumah untuk bertumbuh bersama dalam firman Tuhan, saling menopang dalam doa, dan mempraktikkan kasih Kristus.',
                'marqueeText' => 'MY HOME',
                'heroSlides' => [
                    ['image' => 'images/MyHome1.png', 'alt' => 'Suasana Persekutuan Komunitas Sel My Home'],
                    ['image' => 'images/Dokumentasi1.png', 'alt' => 'Kebersamaan Jemaat dalam Persekutuan My Home'],
                    ['image' => 'images/Dokumentasi5.png', 'alt' => 'Kehangatan Kasih Kristus di Komunitas My Home'],
                ],
                'headingLines' => ['MY', 'HOME'],
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
            ],
            'ekidz' => [
                'pageName' => 'Ekidz',
                'title' => 'Ekidz — Ibadah & Pelayanan Anak Gereja Ekklesia Surabaya',
                'metaDescription' => 'Pelayanan anak Ekidz di Ekklesia Surabaya: ibadah yang penuh sukacita, pengajaran Alkitab yang kreatif, dan pembentukan karakter kristiani bagi generasi masa depan.',
                'marqueeText' => 'EKIDZ',
                'heroSlides' => [
                    ['image' => 'images/Dokumentasi7.png', 'alt' => 'Sukacita Ibadah Anak Ekidz'],
                    ['image' => 'images/EFF1.png', 'alt' => 'Kebersamaan Anak dan Keluarga di Ekidz'],
                    ['image' => 'images/Dokumentasi3.png', 'alt' => 'Aktivitas Rohani & Pembinaan Karakter Ekidz'],
                ],
                'headingLines' => ['E', 'KIDZ'],
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
            ],
            'teens' => [
                'pageName' => 'Ekklesia Teens',
                'title' => 'Ekklesia Teens — Ibadah Remaja & Pemuda Gereja Ekklesia Surabaya',
                'metaDescription' => 'Komunitas remaja dan pemuda Ekklesia Teens di Ekklesia Surabaya: tempat generasi muda berjumpa secara pribadi dengan Tuhan Yesus, mengalami perubahan hidup, dan memimpin dengan teladan.',
                'marqueeText' => 'EKKLESIA TEENS',
                'heroSlides' => [
                    ['image' => 'images/EkklesiaTeen.png', 'alt' => 'Ibadah Remaja & Pemuda Ekklesia Teens'],
                    ['image' => 'images/WorshipNight3.png', 'alt' => 'Penyembahan & Kebersamaan Ekklesia Teens'],
                    ['image' => 'images/Dokumentasi4.png', 'alt' => 'Komunitas Generasi Muda Ekklesia Teens'],
                ],
                'headingLines' => ['EKKLESIA', 'TEENS'],
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
            ],
        ];
    }

    public static function getIbadah(string $key): array
    {
        $all = self::read('ibadah', self::defaultIbadahAll());
        return $all[$key] ?? self::defaultIbadahAll()[$key] ?? [];
    }

    public static function getAllIbadah(): array
    {
        return self::read('ibadah', self::defaultIbadahAll());
    }

    public static function saveIbadah(string $key, array $data): bool
    {
        $all = self::getAllIbadah();
        $all[$key] = array_replace_recursive($all[$key] ?? [], $data);
        return self::write('ibadah', $all);
    }

    // =========================================================================
    // 6. ACARA & AGENDA (EVENTS & RECURRING PROGRAMS)
    // =========================================================================

    public static function defaultEvents(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Worship Night: Hadirat & Pemulihan',
                'slug' => 'worship-night-hadirat-dan-pemulihan',
                'category' => 'Worship',
                'description' => 'Malam doa, pujian, dan penyembahan bersama seluruh jemaat Ekklesia Surabaya. Mengalami perjumpaan yang mengubahkan bersama Tuhan Yesus Kristus.',
                'schedule_info' => 'Jumat, Minggu ke-4 Tiap Bulan',
                'time_info' => '19:00 WIB',
                'location' => 'Sanctuary Ekklesia Surabaya - Ruko Ngaglik 2 No 15',
                'image_url' => '/images/WorshipNight3.png',
                'badge' => 'Monthly Highlight',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'title' => 'My Home: Persekutuan Komunitas Sel',
                'slug' => 'my-home-persekutuan-komunitas-sel',
                'category' => 'Fellowship',
                'description' => 'Keluarga Allah yang bertumbuh bersama dalam firman Tuhan, saling menopang dalam doa, dan mempraktikkan kasih Kristus dalam keseharian hidup.',
                'schedule_info' => 'Setiap Rabu & Kamis Malam',
                'time_info' => '19:00 WIB',
                'location' => 'Multi-lokasi di Area Surabaya (Barat, Timur, Pusat)',
                'image_url' => '/images/MyHome1.png',
                'badge' => 'Weekly Fellowship',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'id' => 3,
                'title' => 'EFF (Ekklesia Family Fellowship)',
                'slug' => 'eff-ekklesia-family-fellowship',
                'category' => 'Family',
                'description' => 'Persekutuan khusus keluarga yang mempererat hubungan suami-istri, orang tua dan anak, serta membangun mezbah keluarga yang kokoh.',
                'schedule_info' => 'Minggu ke-2 Tiap Bulan',
                'time_info' => '16:00 WIB',
                'location' => 'Main Hall Ekklesia Surabaya',
                'image_url' => '/images/EFF3.png',
                'badge' => 'Family Gathering',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'id' => 4,
                'title' => 'Retreat Pemulihan & Kepemimpinan 2027',
                'slug' => 'retreat-pemulihan-dan-kepemimpinan-2027',
                'category' => 'Retreat',
                'description' => 'Retreat akbar 3 hari 2 malam untuk seluruh pelayan jemaat dan keluarga. Mengambil waktu khusus di kaki Tuhan dalam tema Tahun Pemulihan bagi Kemuliaan Tuhan.',
                'schedule_info' => 'Juni 2027 (Jadwal Segera Diumumkan)',
                'time_info' => '3 Hari 2 Malam',
                'location' => 'Retreat Center Jawa Timur',
                'image_url' => '/images/Dokumentasi3.png',
                'badge' => 'Annual Camp',
                'is_featured' => true,
                'is_active' => true,
            ],
        ];
    }

    public static function defaultRecurringPrograms(): array
    {
        return [
            [
                'id' => 'worship-night',
                'name' => 'Worship Night',
                'schedule' => 'Setiap Jumat Minggu ke-4',
                'time' => '19:00 WIB - Selesai',
                'location' => 'Main Sanctuary Ekklesia Surabaya (Ruko Ngaglik 2 No 15)',
                'description' => 'Malam hadirat Tuhan dan penyembahan intim tanpa batasan waktu. Terbuka bagi seluruh jemaat dan keluarga.',
                'badge' => 'Monthly Highlight',
            ],
            [
                'id' => 'my-home-program',
                'name' => 'My Home (Ibadah Rumah ke Rumah / Cabang)',
                'schedule' => 'Setiap Rabu & Kamis Malam',
                'time' => '19:00 WIB',
                'location' => 'Ibadah Rumah ke Rumah & Komunitas Cabang di Berbagai Area Surabaya',
                'description' => 'Persekutuan intim jemaat dari rumah ke rumah untuk bertumbuh bersama dalam firman Tuhan dan saling mendoakan.',
                'badge' => 'Home Fellowship',
            ],
            [
                'id' => 'eff-program',
                'name' => 'Ekklesia Family Fellowship (EFF)',
                'schedule' => 'Setiap Bulan Minggu ke-2',
                'time' => '16:00 WIB',
                'location' => 'Fellowship Hall Ekklesia Surabaya',
                'description' => 'Pertemuan akrab keluarga, seminar parenting kristiani, penguatan pernikahan, dan rekreasi bersama jemaat.',
                'badge' => 'Family Ministry',
            ],
            [
                'id' => 'camp-retreat',
                'name' => 'Camp & Annual Retreat',
                'schedule' => 'Tahunan (Tahun 2027)',
                'time' => '3 Hari 2 Malam',
                'location' => 'Retreat Center Jawa Timur',
                'description' => 'Momen perjumpaan pribadi dengan Tuhan, penyegaran rohani, serta kesatuan hati seluruh jemaat Ekklesia Surabaya.',
                'badge' => 'Annual Camp',
            ],
        ];
    }

    public static function getEvents(): array
    {
        try {
            $dbEvents = Event::orderBy('id', 'desc')->get();
            if ($dbEvents->isNotEmpty()) {
                return $dbEvents->map(fn($e) => $e->toArray())->toArray();
            }
        } catch (Throwable $e) {}

        $data = self::read('events', ['events' => self::defaultEvents()]);
        $events = $data['events'] ?? self::defaultEvents();

        // Normalisasi image_url lama yang mungkin tersimpan sebagai absolute URL
        foreach ($events as &$ev) {
            if (isset($ev['image_url'])) {
                $ev['image_url'] = self::cleanAssetPath($ev['image_url']);
            }
        }
        unset($ev);

        return $events;
    }

    public static function getFeaturedEvents(): array
    {
        $all = self::getEvents();
        return array_values(array_filter($all, fn($e) => !empty($e['is_featured']) && !empty($e['is_active'])));
    }

    public static function getRecurringPrograms(): array
    {
        $data = self::read('recurring_programs', ['items' => self::defaultRecurringPrograms()]);
        return $data['items'] ?? self::defaultRecurringPrograms();
    }

    public static function saveEvents(array $events): bool
    {
        return self::write('events', ['events' => array_values($events)]);
    }

    public static function saveRecurringPrograms(array $programs): bool
    {
        return self::write('recurring_programs', ['items' => array_values($programs)]);
    }

    // =========================================================================
    // 7. GALERI & MEDIA DIGITAL (GALLERY & YOUTUBE CHANNELS)
    // =========================================================================

    public static function defaultGalleries(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Ekklesia Teen',
                'category' => 'Teen',
                'image_url' => '/images/EkklesiaTeen.png',
                'caption' => 'Generasi muda Ekklesia bertumbuh dalam iman, persekutuan, dan pelayanan bersama.',
                'sort_order' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Dokumentasi Pelayanan 1',
                'category' => 'Ibadah duka',
                'image_url' => '/images/Dokumentasi1.png',
                'caption' => 'Ibadah duka',
                'sort_order' => 2,
            ],
            [
                'id' => 3,
                'title' => 'Dokumentasi Pelayanan 2',
                'category' => 'Ibadah',
                'image_url' => '/images/Dokumentasi2.png',
                'caption' => 'Kebersamaan dan hadirat Tuhan dalam setiap sesi pelayanan jemaat.',
                'sort_order' => 3,
            ],
            [
                'id' => 4,
                'title' => 'Dokumentasi Retreat',
                'category' => 'Retreat',
                'image_url' => '/images/Dokumentasi3.png',
                'caption' => 'Kebersamaan dan sukacita jemaat dalam kegiatan retreat yang mempererat persekutuan.',
                'sort_order' => 4,
            ],
            [
                'id' => 5,
                'title' => 'Dokumentasi Pelayanan 4',
                'category' => 'Ibadah',
                'image_url' => '/images/Dokumentasi4.png',
                'caption' => 'Moment persekutuan dan pelayanan yang memperlihatkan karya Tuhan di tengah jemaat.',
                'sort_order' => 5,
            ],
            [
                'id' => 6,
                'title' => 'Dokumentasi Pelayanan 5',
                'category' => 'Ibadah',
                'image_url' => '/images/Dokumentasi5.png',
                'caption' => 'Kebersamaan dan sukacita persekutuan jemaat dalam hadirat Tuhan.',
                'sort_order' => 6,
            ],
            [
                'id' => 7,
                'title' => 'Dokumentasi Pelayanan 6',
                'category' => 'Ibadah',
                'image_url' => '/images/Dokumentasi6.png',
                'caption' => 'Pelayanan dan dedikasi hamba Tuhan beserta jemaat dalam memuliakan nama-Nya.',
                'sort_order' => 7,
            ],
            [
                'id' => 8,
                'title' => 'Dokumentasi Pelayanan 7',
                'category' => 'Ibadah',
                'image_url' => '/images/Dokumentasi7.png',
                'caption' => 'Kasih dan kebersamaan dalam persekutuan serta pelayanan jemaat Ekklesia.',
                'sort_order' => 8,
            ],
            [
                'id' => 9,
                'title' => 'Dokumentasi EFF 1',
                'category' => 'EFF',
                'image_url' => '/images/EFF1.png',
                'caption' => 'Praise & Worship dan pelayanan musik dalam kebersamaan persekutuan Ekklesia Family Fellowship.',
                'sort_order' => 9,
            ],
            [
                'id' => 10,
                'title' => 'Dokumentasi EFF 2',
                'category' => 'EFF',
                'image_url' => '/images/EFF2.png',
                'caption' => 'Saat teduh, doa, dan penyembahan jemaat dalam hadirat Tuhan di persekutuan EFF.',
                'sort_order' => 10,
            ],
            [
                'id' => 11,
                'title' => 'Dokumentasi EFF 3',
                'category' => 'EFF',
                'image_url' => '/images/EFF3.png',
                'caption' => 'Pemberitaan firman Tuhan dan puji-pujian yang mengalirkan kuasa Tuhan dalam persekutuan EFF.',
                'sort_order' => 11,
            ],
            [
                'id' => 12,
                'title' => 'Dokumentasi EFF 4',
                'category' => 'EFF',
                'image_url' => '/images/EFF4.png',
                'caption' => 'Kebersamaan dan pelayanan tim musik dalam melayani jemaat Ekklesia Family Fellowship.',
                'sort_order' => 12,
            ],
        ];
    }

    public static function defaultChannels(): array
    {
        return [
            [
                'name' => 'Ekklesia Ministry',
                'description' => 'Khotbah mingguan, renungan firman, dan pesan pastoral dari Pastor Juan Anthony Sam & Ps Samuel.',
                'subscribers' => 'Official Ministry Channel',
                'handle' => '@ekklesiaministrysurabaya174',
                'link' => 'https://youtube.com/@ekklesiaministrysurabaya174?si=86xQ7dVvr-20WdTj',
                'badge' => 'Sermon & Word',
                'image' => 'images/EkklesiaMinistry.png',
            ],
            [
                'name' => 'Ekklesia Worship',
                'description' => 'Pujian, penyembahan, cover lagu rohani, dan atmosfer hadirat Tuhan dari tim musik Ekklesia.',
                'subscribers' => 'Official Worship Channel',
                'handle' => '@ekklesiaworship92',
                'link' => 'https://youtube.com/@ekklesiaworship92?si=Shxy7Z3c8AMA4Eeq',
                'badge' => 'Live Worship',
                'image' => 'images/EkklesiaWorship.png',
            ],
        ];
    }

    public static function getGalleries(): array
    {
        try {
            $dbGalleries = Gallery::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();
            if ($dbGalleries->isNotEmpty()) {
                return $dbGalleries->map(fn($g) => $g->toArray())->toArray();
            }
        } catch (Throwable $e) {}

        $data = self::read('gallery', ['items' => self::defaultGalleries()]);
        $items = $data['items'] ?? self::defaultGalleries();

        // Normalisasi image_url lama yang mungkin tersimpan sebagai absolute URL
        foreach ($items as &$it) {
            if (isset($it['image_url'])) {
                $it['image_url'] = self::cleanAssetPath($it['image_url']);
            }
        }
        unset($it);

        return $items;
    }

    public static function getChannels(): array
    {
        $data = self::read('channels', ['items' => self::defaultChannels()]);
        return $data['items'] ?? self::defaultChannels();
    }

    public static function saveGalleries(array $items): bool
    {
        return self::write('gallery', ['items' => array_values($items)]);
    }

    public static function saveChannels(array $items): bool
    {
        return self::write('channels', ['items' => array_values($items)]);
    }

    // =========================================================================
    // 8. PERMOHONAN DOA JEMAAT (PRAYER REQUESTS)
    // =========================================================================

    public static function getPrayerRequests(): array
    {
        try {
            $dbPrayers = PrayerRequest::orderBy('id', 'desc')->get();
            if ($dbPrayers->isNotEmpty()) {
                return $dbPrayers->map(fn($p) => $p->toArray())->toArray();
            }
        } catch (Throwable $e) {}

        $data = self::read('prayers', ['items' => []]);
        return $data['items'] ?? [];
    }

    public static function recordPrayerRequest(array $data): array
    {
        $item = [
            'id' => time() . rand(100, 999),
            'name' => $data['name'] ?? 'Anonim',
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'request_text' => $data['request_text'] ?? '',
            'is_anonymous' => !empty($data['is_anonymous']),
            'is_contacted' => false,
            'created_at' => now()->toDateTimeString(),
        ];

        // Also try saving to Eloquent model
        try {
            PrayerRequest::create([
                'name' => $item['name'],
                'phone' => $item['phone'],
                'email' => $item['email'],
                'request_text' => $item['request_text'],
                'is_anonymous' => $item['is_anonymous'],
                'is_contacted' => false,
            ]);
        } catch (Throwable $e) {}

        // Persist to JSON
        $existing = self::read('prayers', ['items' => []]);
        $items = $existing['items'] ?? [];
        array_unshift($items, $item);
        self::write('prayers', ['items' => $items]);

        return $item;
    }

    public static function togglePrayerContacted($id): bool
    {
        try {
            $model = PrayerRequest::find($id);
            if ($model) {
                $model->is_contacted = !$model->is_contacted;
                $model->save();
            }
        } catch (Throwable $e) {}

        $existing = self::read('prayers', ['items' => []]);
        $items = $existing['items'] ?? [];
        foreach ($items as &$p) {
            if ($p['id'] == $id) {
                $p['is_contacted'] = empty($p['is_contacted']);
                break;
            }
        }
        return self::write('prayers', ['items' => $items]);
    }

    public static function deletePrayer($id): bool
    {
        try {
            PrayerRequest::where('id', $id)->delete();
        } catch (Throwable $e) {}

        $existing = self::read('prayers', ['items' => []]);
        $items = array_values(array_filter($existing['items'] ?? [], fn($p) => $p['id'] != $id));
        return self::write('prayers', ['items' => $items]);
    }
}

