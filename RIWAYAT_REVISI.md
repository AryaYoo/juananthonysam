# Riwayat Detail Revisi Website Ekklesia Surabaya (Publik & Frontend)

Dokumentasi lengkap riwayat revisi website publik Ekklesia Surabaya berdasarkan catatan commit Git resmi. Dokumen ini merangkum seluruh perubahan desain antarmuka (UI), pengalaman pengguna (UX), konten teks, pembaruan media/foto, animasi, dan optimasi mobile responsif.

> **Catatan Ruang Lingkup:**
> Riwayat ini khusus mencatat revisi pada **website publik / jemaat** (**58 revisi**), tidak termasuk commit inisialisasi awal (*initial commit*) dan pembuatan modul internal halaman Admin / CMS (22 commit).

---

## 📊 Rekapitulasi Jumlah Revisi per Tanggal

| No | Tanggal Revisi | Jumlah Revisi | Fokus Utama Perubahan |
| :---: | :--- | :---: | :--- |
| 1 | **11 September 2026** | **29 revisi** | Penyelarasan konten awal, tipografi mobile, profil pastor, hero poster, seksi M3, galeri, dan standarisasi heading |
| 2 | **12 September 2026** | **10 revisi** | Animasi scroll-shrink navbar, transisi halus halaman, tombol scroll-to-top, dan pembaruan foto dokumentasi galeri |
| 3 | **15 September 2026** | **1 revisi** | Penambahan dokumentasi galeri 5–7 dan pembaruan tautan pesan WhatsApp |
| 4 | **16 September 2026** | **4 revisi** | Pembaruan lokasi ibadah khusus, Doa Zoom, foto dokumentasi EFF 1–4, dan filter kategori galeri |
| 5 | **20 September 2026** | **1 revisi** | Pembaruan gambar kartu acara dengan dokumentasi riil gereja |
| 6 | **24 September 2026** | **3 revisi** | Optimasi tata letak responsif, auto-scale, dan posisi floating banner kemitraan di layar smartphone |
| 7 | **27 September 2026** | **8 revisi** | Penambahan 3 halaman ibadah khusus (My Home, Ekidz, Ekklesia Teens), gesture swipe slider, dan penyesuaian font heading |
| 8 | **02 November 2026** | **1 revisi** | Pembaruan kartu divisi pelayanan interaktif, pembersihan tautan TikTok, logo mitra, dan perapian jadwal ibadah |
| 9 | **22 November 2026** | **1 revisi** | Pembaruan istilah "Volunteer Pelayanan" menjadi **"Ministry of Service"** pada halaman profil dan CTA WhatsApp |
| **TOTAL** | | **58 revisi** | |

---

## 📅 Rincian Lengkap Revisi Berdasarkan Tanggal

### 1. Tanggal 11 September 2026 (29 Revisi)

1. **Commit `fec8949`**
   - **Pesan:** `fix: enable class-based dark mode custom variant in Tailwind v4 and dynamic theme toggle sync`
   - **Rincian:** Memperbaiki sistem class-based dark mode pada Tailwind CSS v4 dan menyelaraskan sinkronisasi tombol toggle tema (terang/gelap) agar tersimpan di browser tanpa kedip (*flicker*).
   - **Komponen:** `resources/css/app.css`, `resources/views/layouts/app.blade.php`.

2. **Commit `4fe710c`**
   - **Pesan:** `feat: complete exact alignment with client content requirements (all pages, channels, giving & pastoral CTAs)`
   - **Rincian:** Penyelarasan menyeluruh konten teks di semua halaman website sesuai arahan klien (halaman Beranda, Profil, Media, Jadwal, rekening Giving, dan tombol Call-To-Action WhatsApp pastoral).
   - **Komponen:** Seluruh view halaman publik.

3. **Commit `1da65a4`**
   - **Pesan:** `fix(profile): remove bullet dot points from Misi Gereja card for clean minimalist layout`
   - **Rincian:** Menghapus tanda bullet (titik-titik list) pada kartu Misi Gereja di halaman Profil demi tampilan yang lebih bersih, modern, dan minimalis.
   - **Komponen:** `resources/views/pages/profile.blade.php`.

4. **Commit `bb3624d`**
   - **Pesan:** `feat(ui): add Profil dropdown (EKKLESIA, Ps Juan Anthony Sam, Ps Samuel), remove initial letter boxes, and refine footer schedule text`
   - **Rincian:** Menambahkan menu dropdown pada navbar menu "Profil" yang memuat sub-pilihan Profil Ekklesia, Ps. Juan Anthony Sam, dan Ps. Samuel. Menghapus kotak inisial huruf serta merapikan teks jadwal pada footer.
   - **Komponen:** `resources/views/components/navbar.blade.php`, `resources/views/components/footer.blade.php`.

5. **Commit `ffdf438`**
   - **Pesan:** `feat(pastors): add dedicated philipmantofa-style profile pages for Pastor Juan and Ps Samuel with sub-navigation and alternating sections`
   - **Rincian:** Merancang dan membangun halaman profil khusus terdedikasi untuk Pastor Juan dan Ps. Samuel dengan konsep desain editorial modern (gaya personal ministry Philip Mantofa), dilengkapi sub-navigasi dan tata letak seksi bergantian.
   - **Komponen:** `resources/views/pages/pastor-juan.blade.php`, `resources/views/pages/pastor-samuel.blade.php`.

6. **Commit `b491054`**
   - **Pesan:** `feat: enlarge mobile typography, add dynamic logo detection in public/images, and update Ps Samuel as Lead Pastor and Pastor Juan as Associate Pastor`
   - **Rincian:** Memperbesar ukuran tipografi pada layar mobile agar mudah dibaca, membuat deteksi logo dinamis di folder `public/images`, dan memperbarui titel jabatan pastoral: Ps. Samuel sebagai *Lead Pastor* dan Pastor Juan Anthony Sam sebagai *Associate Pastor*.
   - **Komponen:** `navbar.blade.php`, `profile.blade.php`, `home.blade.php`.

7. **Commit `70b4c9f`**
   - **Pesan:** `feat(ui): transparent larger logo, update browser favicon, and white text for pastoral sections`
   - **Rincian:** Mengganti aset logo dengan versi transparan beresolusi tinggi yang lebih proporsional, memperbarui favicon browser, dan mengubah warna teks seksi sambutan pastoral menjadi putih bersih untuk kontras optimal.
   - **Komponen:** `layouts/app.blade.php`, `pages/home.blade.php`.

8. **Commit `d01f9de`**
   - **Pesan:** `feat(ui): add pastoral greeting section with juan photo and remove lightning icons from ministry cards`
   - **Rincian:** Menambahkan seksi sambutan hangat pastoral lengkap dengan foto portrait Pastor Juan di beranda dan menghapus icon petir pada kartu-kartu divisi pelayanan.
   - **Komponen:** `resources/views/pages/home.blade.php`, `profile.blade.php`.

9. **Commit `fa63ceb`**
   - **Pesan:** `feat(ui): update hero slider carousel with Poster 1-3 images`
   - **Rincian:** Memperbarui visual slide carousel beranda menggunakan aset visual resmi Poster 1, Poster 2, dan Poster 3.
   - **Komponen:** `resources/views/pages/home.blade.php`.

10. **Commit `b47f3a2`**
    - **Pesan:** `fix(ui): hero slider mobile fill with object-cover and proportional height`
    - **Rincian:** Memperbaiki tampilan slider gambar pada smartphone dengan menerapkan `object-cover` dan rasio tinggi proporsional sehingga gambar tidak terdistorsi atau terpotong berlebihan.
    - **Komponen:** `resources/views/pages/home.blade.php`.

11. **Commit `7f65dc4`**
    - **Pesan:** `fix(ui): align carousel prev/next buttons with header max-w-7xl container`
    - **Rincian:** Merapikan posisi tombol navigasi panah kiri/kanan pada carousel agar posisinya sejajar presisi dengan kontainer grid utama website (`max-w-7xl`).
    - **Komponen:** `resources/views/pages/home.blade.php`.

12. **Commit `091064b`**
    - **Pesan:** `feat(ui): update poster images and increase hero section height`
    - **Rincian:** Mengganti foto poster utama dengan versi visual terbaru dan menambah tinggi vertikal hero section agar tampil lebih megah di layar desktop.
    - **Komponen:** `resources/views/pages/home.blade.php`.

13. **Commit `054a6c0`**
    - **Pesan:** `feat(ui): remove Sekilas Ekklesia section and update poster images`
    - **Rincian:** Menghapus seksi banner statis "Sekilas Ekklesia" sesuai permintaan klien dan memperbarui urutan gambar poster.
    - **Komponen:** `resources/views/pages/home.blade.php`.

14. **Commit `5143c89`**
    - **Pesan:** `fix(ui): move pastor photo below text on mobile, full width, and add slide-up scroll animation`
    - **Rincian:** Mengubah tata letak seksi pastoral pada layar mobile: foto diposisikan di bawah teks dengan lebar penuh (*full width*) disertai efek animasi muncul dari bawah (*slide-up on scroll*).
    - **Komponen:** `resources/views/pages/home.blade.php`.

15. **Commit `cc15c2b`**
    - **Pesan:** `feat: update pastoral text to white, add profile hero2 & theme marquee, update giving cards with images, remove pastoral care & prayer form`
    - **Rincian:** Memperbarui teks pastoral berwarna putih kontras, menambahkan foto `Hero2` di profil, menambahkan teks berjalan (*marquee*) tema tahunan gereja, mempercantik kartu nomor rekening persembahan dengan gambar visual, dan menghapus formulir doa/konseling pastoral lama.
    - **Komponen:** `pages/home.blade.php`, `pages/profile.blade.php`.

16. **Commit `89fa97e`**
    - **Pesan:** `style: standardize all section headers to uppercase with underline accent`
    - **Rincian:** Menstandarisasi seluruh judul bab/seksi di setiap halaman website menjadi huruf kapital (UPPERCASE) dengan aksen garis bawah minimalis khas Ekklesia.
    - **Komponen:** `home.blade.php`, `profile.blade.php`, `events.blade.php`, `media.blade.php`.

17. **Commit `5b415d5`**
    - **Pesan:** `feat: implement automatic asset cache-busting (asset_v) for all images`
    - **Rincian:** Membangun fungsi helper `asset_v()` yang menyematkan penanda versi berbasis waktu perubahan file (`?v=timestamp`), memastikan setiap pembaruan gambar langsung tampil di perangkat pengguna tanpa kendala cache browser.
    - **Komponen:** `app/helpers.php`, seluruh view Blade.

18. **Commit `6eea2c8`**
    - **Pesan:** `update: perbarui tautan medsos YouTube TikTok email, hapus deskripsi channel dan persembahan footer`
    - **Rincian:** Memperbarui link media sosial resmi (YouTube, TikTok, email), menyederhanakan halaman media dengan menghapus teks deskripsi panjang per channel, dan menghapus blok persembahan duplikat di footer.
    - **Komponen:** `pages/media.blade.php`, `components/footer.blade.php`.

19. **Commit `cfdbaa5`**
    - **Pesan:** `update: hapus channel Ekklesia World dari halaman media dan footer`
    - **Rincian:** Menghapus channel YouTube "Ekklesia World" dari daftar kanal resmi di halaman media serta tautan di footer.
    - **Komponen:** `pages/media.blade.php`, `components/footer.blade.php`.

20. **Commit `e058fb2`**
    - **Pesan:** `style: buat tema footer konsisten berwarna gelap di light dan dark mode`
    - **Rincian:** Menetapkan desain footer agar selalu berlatar belakang gelap (*dark aesthetic*) baik saat pengunjung memilih mode terang maupun mode gelap, guna mempertahankan kesan elegan dan konsisten.
    - **Komponen:** `resources/views/components/footer.blade.php`.

21. **Commit `175d88b`**
    - **Pesan:** `feat: tambahkan section background video highlight sinematik di beranda`
    - **Rincian:** Menyematkan seksi video sinematik bergerak (*looping cinematic video*) di halaman beranda untuk memperkuat suasana ibadah dan pengalaman visual pengunjung.
    - **Komponen:** `resources/views/pages/home.blade.php`.

22. **Commit `35bc93b`**
    - **Pesan:** `feat: tambahkan section judul hitam SEKILAS EKKLESIA sebelum highlight video`
    - **Rincian:** Menambahkan seksi judul penegas berlatar hitam "SEKILAS EKKLESIA" tepat sebelum pemutaran video highlight.
    - **Komponen:** `resources/views/pages/home.blade.php`.

23. **Commit `7fa9da8`**
    - **Pesan:** `feat: optimasi tampilan mobile untuk slider jadwal ibadah, footer, divisi pelayanan, dan slider galeri`
    - **Rincian:** Optimasi responsivitas mobile secara menyeluruh: memperhalus navigasi sentuh slider jadwal ibadah, kartu divisi pelayanan, grid footer, dan slider pratinjau galeri foto.
    - **Komponen:** `pages/home.blade.php`, `components/jadwal-ibadah.blade.php`, `components/footer.blade.php`.

24. **Commit `9948455`**
    - **Pesan:** `feat: tambah section M3 misi, logo mitra, gambar channel YouTube, galeri asli, footer mobile clean, dan upload foto dokumentasi`
    - **Rincian:** Menambahkan seksi Persembahan Misi M3, logo mitra pelayanan, aset gambar cover channel YouTube, integrasi foto dokumentasi asli jemaat ke galeri, dan merapikan footer versi mobile.
    - **Komponen:** `pages/home.blade.php`, `pages/media.blade.php`, `components/footer.blade.php`.

25. **Commit `55eb3db`**
    - **Pesan:** `fix: perbaiki syntax quotes atribut HTML pada section Giving M3`
    - **Rincian:** Memperbaiki kesalahan tanda kutip HTML pada atribut kelas kontainer seksi Giving M3 yang sempat mengganggu rendering browser tertentu.
    - **Komponen:** `resources/views/pages/home.blade.php`.

26. **Commit `18ddf50`**
    - **Pesan:** `style: sembunyikan teks penjelasan Giving M3 pada tampilan mobile`
    - **Rincian:** Menyederhanakan tampilan kartu persembahan M3 di layar smartphone dengan menyembunyikan paragraf penjelasan panjang agar kartu tetap ringkas dan tidak memakan ruang layar.
    - **Komponen:** `resources/views/pages/home.blade.php`.

27. **Commit `d7d9e24`**
    - **Pesan:** `style: tampilkan warna penuh logo mitra dan perjelas teks pada tampilan mobile`
    - **Rincian:** Mengubah filter logo mitra dari monokrom menjadi warna penuh (*full color*) serta menebalkan kontras teks keterangannya agar terlihat jelas di layar ponsel.
    - **Komponen:** `resources/views/pages/home.blade.php`.

28. **Commit `d5ba597`**
    - **Pesan:** `feat: pasang poster Worship Night sebagai hero section halaman Jadwal Acara & Ibadah`
    - **Rincian:** Memasang poster visual Worship Night beresolusi tinggi sebagai hero header utama pada halaman Jadwal Acara & Agenda Ibadah.
    - **Komponen:** `resources/views/pages/events.blade.php`.

29. **Commit `e4d5619`**
    - **Pesan:** `fix: bersihkan karakter encoding mojibake (â€) pada title dan konten home`
    - **Rincian:** Membersihkan teks beranda dari karakter aneh (*mojibake* seperti tanda `â€` atau dash yang korup) akibat perbedaan encoding UTF-8 pada file view.
    - **Komponen:** `resources/views/pages/home.blade.php`.

---

### 2. Tanggal 12 September 2026 (10 Revisi)

30. **Commit `5e4240d`**
    - **Pesan:** `feat: tambahkan animasi transisi scroll-shrink pada navbar saat di-scroll`
    - **Rincian:** Menambahkan efek animasi modern pada bilah navigasi (navbar): ukuran navbar secara dinamis mengecil dan mengaburkan latar belakang (*blur backdrop*) saat halaman di-scroll ke bawah.
    - **Komponen:** `resources/views/components/navbar.blade.php`.

31. **Commit `9bd5f9e`**
    - **Pesan:** `feat: tambahkan animasi transisi perpindahan halaman fade in dan fade out`
    - **Rincian:** Menambahkan transisi animasi *fade-in* saat halaman baru dimuat dan *fade-out* saat tautan internal diklik untuk pengalaman navigasi yang mulus layaknya Single Page App (SPA).
    - **Komponen:** `resources/views/layouts/app.blade.php`.

32. **Commit `9be427c`**
    - **Pesan:** `style: perlambat durasi transisi perpindahan halaman dan scroll navbar agar lebih lembut dan sinematik`
    - **Rincian:** Menyesuaikan kurva waktu (*easing curve*) dan memperlambat durasi animasi perpindahan halaman serta efek navbar agar pergerakannya terasa lebih lembut, tenang, dan sinematik.
    - **Komponen:** `resources/views/layouts/app.blade.php`, `resources/views/components/navbar.blade.php`.

33. **Commit `ee12b07`**
    - **Pesan:** `feat: perhalus transisi scroll navbar dan tambahkan efek parallax pada hero carousel`
    - **Rincian:** Menyempurnakan kehalusan scroll navbar dan memberikan efek gerak kedalaman (*parallax depth effect*) pada gambar carousel beranda saat digeser.
    - **Komponen:** `resources/views/pages/home.blade.php`, `resources/views/components/navbar.blade.php`.

34. **Commit `1ff1da4`**
    - **Pesan:** `feat: tambahkan efek editorial parallax pada foto Pastor Juan di section sambutan pastoral`
    - **Rincian:** Menerapkan efek floating parallax pada foto Pastor Juan di seksi sambutan beranda.
    - **Komponen:** `resources/views/pages/home.blade.php`.

35. **Commit `1615ede`**
    - **Pesan:** `Revert "feat: tambahkan efek editorial parallax pada foto Pastor Juan di section sambutan pastoral"`
    - **Rincian:** Membatalkan efek parallax foto Pastor Juan atas dasar evaluasi kenyamanan visual klien, mengembalikannya ke tampilan statis yang solid dan stabil.
    - **Komponen:** `resources/views/pages/home.blade.php`.

36. **Commit `8bd801d`**
    - **Pesan:** `feat: tambahkan tombol floating scroll to top responsif dengan animasi smooth`
    - **Rincian:** Menambahkan tombol melayang di sudut kanan bawah yang otomatis muncul ketika pengguna telah menggulir halaman ke bawah, berfungsi mengembalikan layar ke atas secara halus (*smooth scroll*).
    - **Komponen:** `resources/views/layouts/app.blade.php`.

37. **Commit `4029c26`**
    - **Pesan:** `Update gallery documentation images`
    - **Rincian:** Memperbarui file aset foto dokumentasi pada grid galeri kegiatan jemaat.
    - **Komponen:** `public/images/`, `resources/views/pages/media.blade.php`.

38. **Commit `132338b`**
    - **Pesan:** `poster baru`
    - **Rincian:** Memasang desain poster baru dengan informasi jadwal ibadah yang telah diperbarui.
    - **Komponen:** `public/images/Poster1.jpg`.

39. **Commit `2747b36`**
    - **Pesan:** `Update gallery documentation images`
    - **Rincian:** Penambahan dan penggantian kumpulan foto dokumentasi persekutuan ke dalam galeri foto.
    - **Komponen:** `public/images/Dokumentasi*.png`, `resources/views/pages/media.blade.php`.

---

### 3. Tanggal 15 September 2026 (1 Revisi)

40. **Commit `0a3d09d`**
    - **Pesan:** `feat: tambahkan dokumentasi 5-7 ke galeri dan perbarui pesan default WhatsApp`
    - **Rincian:** Menambahkan foto Dokumentasi 5, 6, dan 7 ke dalam galeri dokumentasi serta memperbarui susunan kata pembuka otomatis saat jemaat menekan tombol WhatsApp pastoral.
    - **Komponen:** `resources/views/pages/media.blade.php`, `app/helpers.php`.

---

### 4. Tanggal 16 September 2026 (4 Revisi)

41. **Commit `ded0909`**
    - **Pesan:** `fix(schedule): update service locations for Ekidz (Lt. 1), E-Teens (Lt. 3), and Doa Senin (Zoom)`
    - **Rincian:** Memperbarui rincian lokasi fisik ibadah pada kartu jadwal: Ekidz di Sanctuary Lantai 1, Ekklesia Teens di Sanctuary Lantai 3, dan Doa Fajar/Malam Senin via Zoom.
    - **Komponen:** `resources/views/components/jadwal-ibadah.blade.php`.

42. **Commit `f0657f6`**
    - **Pesan:** `fix(schedule): simplify Monday Prayer location to 'Zoom Meeting'`
    - **Rincian:** Menyederhanakan penulisan lokasi Doa Hari Senin pada tabel jadwal menjadi ringkas: *"Zoom Meeting"*.
    - **Komponen:** `resources/views/components/jadwal-ibadah.blade.php`.

43. **Commit `ca5d942`**
    - **Pesan:** `feat(gallery): add EFF 1-4 documentation images and EFF category filter`
    - **Rincian:** Menambahkan 4 seri foto dokumentasi *Ekklesia Family Fellowship* (EFF 1–4) dan membuat tombol tab filter kategori *"EFF"* di halaman galeri foto.
    - **Komponen:** `resources/views/pages/media.blade.php`.

44. **Commit `9ff982c`**
    - **Pesan:** `feat(events): update EFF event card image with EFF3 photo`
    - **Rincian:** Memperbarui visual kartu agenda acara EFF pada halaman Agenda menggunakan foto dokumentasi riil `EFF3.png`.
    - **Komponen:** `resources/views/pages/events.blade.php`.

---

### 5. Tanggal 20 September 2026 (1 Revisi)

45. **Commit `5701594`**
    - **Pesan:** `Update event images with local photos (MyHome, WorshipNight, EFF, Dokumentasi)`
    - **Rincian:** Mengganti seluruh placeholder gambar pada kartu-kartu acara (My Home, Worship Night, EFF, dan Retret) dengan koleksi foto dokumentasi lokal berkualitas tinggi.
    - **Komponen:** `resources/views/pages/events.blade.php`.

---

### 6. Tanggal 24 September 2026 (3 Revisi)

46. **Commit `a3fd0b9`**
    - **Pesan:** `fix(banner): responsive mobile scaling — smaller font, padding, height on small screens`
    - **Rincian:** Menyesuaikan ukuran floating banner iklan/pengumuman kemitraan saat dibuka di smartphone kecil: memperkecil ukuran huruf, padding internal, dan tinggi kontainer agar tidak menutupi area konten utama.
    - **Komponen:** `resources/views/layouts/app.blade.php`.

47. **Commit `3df788f`**
    - **Pesan:** `fix(banner): auto-scale content with transform:scale on mobile, lift position to mb-6`
    - **Rincian:** Menerapkan teknik `transform: scale()` pada floating banner mobile untuk memastikan tata letak di dalamnya mengecil secara otomatis tanpa merusak hierarki teks, serta menaikkan margin bawah (`mb-6`).
    - **Komponen:** `resources/views/layouts/app.blade.php`.

48. **Commit `330fd6b`**
    - **Pesan:** `fix(banner): raise banner position higher on mobile (mb-16)`
    - **Rincian:** Menaikkan posisi floating banner lebih ke atas (`mb-16`) pada perangkat mobile agar tombol tutup, tombol CTA, dan tombol navigasi layar HP tidak saling menumpuk.
    - **Komponen:** `resources/views/layouts/app.blade.php`.

---

### 7. Tanggal 27 September 2026 (8 Revisi)

49. **Commit `f413898`**
    - **Pesan:** `feat: tambah menu dan halaman ibadah (My Home, Ekidz, Ekklesia Teens), update retreat ke 2027, dan highlight Ekklesia`
    - **Rincian:** Menambahkan 3 halaman pelayanan ibadah baru (**My Home**, **Ekidz**, dan **Ekklesia Teens**), memperbarui target tahun pelaksanaan Retret Gereja menjadi tahun 2027, serta menambahkan highlight visual nama gereja.
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`, `resources/views/components/navbar.blade.php`, `routes/web.php`.

50. **Commit `0213b1b`**
    - **Pesan:** `refactor: sederhanakan menu dropdown ibadah tanpa keterangan`
    - **Rincian:** Menyederhanakan tampilan dropdown menu "Ibadah" di navbar: menghapus sub-keterangan panjang sehingga hanya menampilkan nama-nama ibadah yang ringkas dan elegan.
    - **Komponen:** `resources/views/components/navbar.blade.php`.

51. **Commit `6205fed`**
    - **Pesan:** `fix: sederhanakan teks marquee hanya judul halaman dan aktifkan animasi bergerak`
    - **Rincian:** Mengubah teks berjalan (*running marquee text*) di bawah hero header halaman ibadah khusus agar hanya berulang memuat nama pelayanan (mis. *"✦ MY HOME ✦ MY HOME"*), serta mengaktifkan animasi pergerakan tak terbatas (*infinite loop*).
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

52. **Commit `606c37b`**
    - **Pesan:** `Remove lokasi, target, dan CTA buttons dari halaman Ibadah`
    - **Rincian:** Merampingkan halaman ibadah khusus dengan meniadakan badge lokasi, target umur jemaat, dan tombol CTA ganda agar halaman fokus pada penjelasan visi dan persekutuan.
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

53. **Commit `d91acfa`**
    - **Pesan:** `Add swipe gesture support to Ibadah hero slider`
    - **Rincian:** Menambahkan pendeteksi sentuhan (*touch swipe gesture*) pada slider hero foto halaman ibadah khusus sehingga pengguna smartphone dapat menggeser foto ke kiri dan ke kanan dengan jari secara natural.
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

54. **Commit `882fe7d`**
    - **Pesan:** `transisi slider hero`
    - **Rincian:** Menyesuaikan kurva transisi geser antar-slide banner hero ibadah menggunakan efek *cubic-bezier* yang mulus.
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

55. **Commit `4d07823`**
    - **Pesan:** `Update Ibadah heading typography to lightweight Stack Sans Notch`
    - **Rincian:** Mengganti jenis font judul besar pada halaman ibadah khusus menggunakan jenis font tipografi *Stack Sans Notch* berbobot ringan (*lightweight*) yang anggun dan modern.
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

56. **Commit `a5483a1`**
    - **Pesan:** `Adjust Ibadah heading font size and column layout`
    - **Rincian:** Menyesuaikan skala ukuran teks judul (dari mobile hingga desktop) dan proporsi kolom 2 sisi (judul besar bertumpuk di sebelah kiri dan paragraf deskripsi di sebelah kanan).
    - **Komponen:** `resources/views/pages/ibadah/detail.blade.php`.

---

### 8. Tanggal 02 November 2026 (1 Revisi)

57. **Commit `f941af2`**
    - **Pesan:** `feat: perbarui divisi pelayanan interaktif, hapus tiktok, jadwal ibadah di seluruh halaman, dan bersihkan logo mitra`
    - **Rincian:** Memperbarui kartu divisi pelayanan interaktif pada halaman profil, menghapus ikon dan tautan TikTok dari footer/kontak, memastikan komponen jadwal ibadah hadir di semua halaman, dan membersihkan grid logo mitra kerja.
    - **Komponen:** `resources/views/pages/profile.blade.php`, `resources/views/components/footer.blade.php`, `resources/views/components/jadwal-ibadah.blade.php`.

---

### 9. Tanggal 22 November 2026 (1 Revisi)

58. **Commit `cc338ae`**
    - **Pesan:** `refactor: perbarui istilah volunteer menjadi Ministry of Service di halaman profil dan CMS`
    - **Rincian:** Mengubah penamaan istilah "Volunteer" / "Volunteer Pelayanan" menjadi **"Ministry of Service"** pada seluruh seksi halaman profil publik:
      - Judul seksi diubah menjadi: **`MINISTRY OF SERVICE`**
      - Subtitle diubah menjadi: *"Creative, Usher, dan Ministry of Service siap melayani dan saling memperlengkapi tubuh Kristus."*
      - Kartu ajakan diubah menjadi: *"Rindu Mengambil Bagian dalam Ministry of Service?"*
      - Tombol aksi diubah menjadi: **`Daftar Ministry of Service via WhatsApp`** dengan pesan otomatis: *"Halo Pastoral Ekklesia, saya tertarik bergabung melayani di Ministry of Service"*.
    - **Komponen:** `resources/views/pages/profile.blade.php`, `app/Services/CmsService.php`.

---

*Laporan ini dihasilkan secara otomatis berdasarkan riwayat commit Git pada repositori website Ekklesia Surabaya.*
