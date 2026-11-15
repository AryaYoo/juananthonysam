<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Services\CmsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class AdminCmsController extends Controller
{
    // =========================================================================
    // 1. BERANDA (HOME)
    // =========================================================================

    public function home(): View
    {
        $homeData = CmsService::getHome();
        return view('admin.cms.home', compact('homeData'));
    }

    public function saveHome(Request $request): RedirectResponse
    {
        $current = CmsService::getHome();

        // 1. Tema
        $current['theme_2026'] = [
            'year' => $request->input('theme_year', '2026'),
            'title' => $request->input('theme_title', ''),
            'slogan' => $request->input('theme_slogan', ''),
            'verse' => $request->input('theme_verse', ''),
            'reference' => $request->input('theme_reference', ''),
        ];

        // 2. Rekening & Donasi
        $current['giving'] = [
            'bank_name' => $request->input('giving_bank_name', 'Bank Danamon'),
            'account_number' => $request->input('giving_account_number', ''),
            'account_number_raw' => preg_replace('/[^0-9]/', '', $request->input('giving_account_number', '')),
            'account_holder' => $request->input('giving_account_holder', ''),
            'm3_code' => $request->input('giving_m3_code', 'Persembahan M3'),
            'purpose' => $request->input('giving_purpose', ''),
            'qris_info' => $request->input('giving_qris_info', ''),
            'notes' => $request->input('giving_notes', ''),
        ];

        // 3. Layanan Pastoral
        $services = $request->input('pastoral_services', []);
        if (is_array($services) && count($services) > 0) {
            $current['pastoral_services'] = array_values($services);
        }

        CmsService::saveHome($current);

        return back()->with('success', 'Konten Beranda berhasil diperbarui!');
    }

    // =========================================================================
    // 2. JADWAL IBADAH (SCHEDULES)
    // =========================================================================

    public function schedules(): View
    {
        $schedules = CmsService::getSchedules();
        return view('admin.cms.schedules', compact('schedules'));
    }

    public function saveSchedules(Request $request): RedirectResponse
    {
        $items = $request->input('schedules', []);
        if (is_array($items)) {
            $formatted = [];
            foreach ($items as $item) {
                if (!empty(trim($item['name'] ?? ''))) {
                    $formatted[] = [
                        'id' => $item['id'] ?? Str::slug($item['name']),
                        'name' => trim($item['name']),
                        'time' => trim($item['time'] ?? ''),
                        'day' => trim($item['day'] ?? ''),
                        'target' => trim($item['target'] ?? ''),
                        'badge' => trim($item['badge'] ?? ''),
                        'location' => trim($item['location'] ?? ''),
                        'is_online' => !empty($item['is_online']),
                    ];
                }
            }
            CmsService::saveSchedules($formatted);
        }

        return back()->with('success', 'Jadwal Ibadah berhasil disimpan dan otomatis terupdate di seluruh halaman web!');
    }

    // =========================================================================
    // 3. PROFIL GEREJA (PROFILE)
    // =========================================================================

    public function profile(): View
    {
        $profile = CmsService::getProfile();
        return view('admin.cms.profile', compact('profile'));
    }

    public function saveProfile(Request $request): RedirectResponse
    {
        $current = CmsService::getProfile();

        $current['vision'] = $request->input('vision', '');
        $current['mission'] = $request->input('mission', '');

        $current['location'] = [
            'name' => $request->input('location_name', 'Ekklesia Surabaya'),
            'address' => $request->input('location_address', ''),
            'google_maps_url' => $request->input('location_google_maps_url', ''),
            'whatsapp' => $request->input('location_whatsapp', ''),
            'email' => $request->input('location_email', ''),
            'phone' => $request->input('location_phone', ''),
        ];

        $divisions = $request->input('divisions', []);
        if (is_array($divisions) && count($divisions) > 0) {
            foreach ($divisions as &$div) {
                if (isset($div['highlights']) && is_string($div['highlights'])) {
                    $div['highlights'] = array_filter(array_map('trim', explode("\n", $div['highlights'])));
                }
            }
            $current['divisions'] = array_values($divisions);
        }

        CmsService::saveProfile($current);

        return back()->with('success', 'Profil Gereja berhasil diperbarui!');
    }

    // =========================================================================
    // 4. PROFIL GEMBALA (PASTORS)
    // =========================================================================

    public function pastors(Request $request): View
    {
        $activeTab = $request->query('tab', 'juan');
        $pastorJuan = CmsService::getPastor('juan');
        $pastorSamuel = CmsService::getPastor('samuel');

        return view('admin.cms.pastors', compact('activeTab', 'pastorJuan', 'pastorSamuel'));
    }

    public function savePastors(Request $request): RedirectResponse
    {
        $tab = $request->input('tab', 'juan');
        $key = ($tab === 'samuel') ? 'samuel' : 'juan';

        $splitParagraphs = function ($text) {
            if (is_array($text)) return $text;
            return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string)$text))));
        };

        $data = [
            'name' => $request->input('name', ''),
            'role' => $request->input('role', ''),
            'title_display' => $request->input('title_display', ''),
            'quote' => $request->input('quote', ''),
            'overview' => $splitParagraphs($request->input('overview', '')),
            'spiritual_journey' => $splitParagraphs($request->input('spiritual_journey', '')),
            'background' => $splitParagraphs($request->input('background', '')),
            'ministry' => $splitParagraphs($request->input('ministry', '')),
            'vision_mission' => $splitParagraphs($request->input('vision_mission', '')),
        ];

        CmsService::savePastor($key, $data);

        return redirect()->route('admin.cms.pastors', ['tab' => $key])
            ->with('success', "Profil {$data['name']} berhasil disimpan!");
    }

    // =========================================================================
    // 5. PELAYANAN IBADAH KHUSUS (MY HOME, EKIDZ, E-TEENS)
    // =========================================================================

    public function ibadah(Request $request): View
    {
        $activeTab = $request->query('tab', 'my-home');
        $allIbadah = CmsService::getAllIbadah();

        return view('admin.cms.ibadah', compact('activeTab', 'allIbadah'));
    }

    public function saveIbadah(Request $request): RedirectResponse
    {
        $tab = $request->input('tab', 'my-home');
        $validTabs = ['my-home', 'ekidz', 'teens'];
        if (!in_array($tab, $validTabs)) {
            $tab = 'my-home';
        }

        $current = CmsService::getIbadah($tab);

        $current['title'] = $request->input('title', $current['title'] ?? '');
        $current['metaDescription'] = $request->input('metaDescription', $current['metaDescription'] ?? '');
        $current['marqueeText'] = $request->input('marqueeText', $current['marqueeText'] ?? '');

        // Description Paragraphs
        $descRaw = $request->input('descriptionParagraphs', '');
        if (is_string($descRaw)) {
            $current['descriptionParagraphs'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $descRaw))));
        }

        // Schedule
        $current['schedule'] = [
            'name' => $request->input('schedule_name', ''),
            'day' => $request->input('schedule_day', ''),
            'time' => $request->input('schedule_time', ''),
            'location' => $request->input('schedule_location', ''),
            'target' => $request->input('schedule_target', ''),
            'badge' => $request->input('schedule_badge', ''),
            'whatsappMessage' => $request->input('schedule_whatsappMessage', ''),
        ];

        CmsService::saveIbadah($tab, $current);

        return redirect()->route('admin.cms.ibadah', ['tab' => $tab])
            ->with('success', "Konten halaman {$current['pageName']} berhasil diperbarui!");
    }

    // =========================================================================
    // 6. ACARA & AGENDA (EVENTS & RECURRING PROGRAMS)
    // =========================================================================

    public function events(): View
    {
        $events = CmsService::getEvents();
        $recurring = CmsService::getRecurringPrograms();

        return view('admin.cms.events', compact('events', 'recurring'));
    }

    public function saveEvent(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $title = trim($request->input('title', ''));
        if (empty($title)) {
            return back()->with('error', 'Judul Acara wajib diisi.');
        }

        $imageUrl = $request->input('image_url', '');
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = asset('uploads/' . $filename);
        }

        $eventData = [
            'id' => $id ?: time(),
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => $request->input('category', 'Worship'),
            'description' => $request->input('description', ''),
            'schedule_info' => $request->input('schedule_info', ''),
            'time_info' => $request->input('time_info', ''),
            'location' => $request->input('location', ''),
            'image_url' => $imageUrl ?: asset('images/WorshipNight3.png'),
            'badge' => $request->input('badge', 'Special Event'),
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
        ];

        // 1. Update in DB if available
        try {
            if ($id && Event::where('id', $id)->exists()) {
                Event::where('id', $id)->update($eventData);
            } else {
                $created = Event::create($eventData);
                $eventData['id'] = $created->id;
            }
        } catch (Throwable $e) {}

        // 2. Update in JSON
        $events = CmsService::getEvents();
        $found = false;
        foreach ($events as &$ev) {
            if ($ev['id'] == $eventData['id']) {
                $ev = array_merge($ev, $eventData);
                $found = true;
                break;
            }
        }
        if (!$found) {
            array_unshift($events, $eventData);
        }
        CmsService::saveEvents($events);

        return back()->with('success', 'Acara berhasil disimpan!');
    }

    public function deleteEvent($id): RedirectResponse
    {
        try {
            Event::where('id', $id)->delete();
        } catch (Throwable $e) {}

        $events = CmsService::getEvents();
        $events = array_values(array_filter($events, fn($e) => $e['id'] != $id));
        CmsService::saveEvents($events);

        return back()->with('success', 'Acara berhasil dihapus.');
    }

    public function saveRecurring(Request $request): RedirectResponse
    {
        $items = $request->input('recurring', []);
        if (is_array($items)) {
            CmsService::saveRecurringPrograms(array_values($items));
        }

        return back()->with('success', 'Program Rutin berhasil disimpan!');
    }

    // =========================================================================
    // 7. GALERI & MEDIA DIGITAL (GALLERIES & YOUTUBE CHANNELS)
    // =========================================================================

    public function gallery(): View
    {
        $galleries = CmsService::getGalleries();
        $channels = CmsService::getChannels();

        return view('admin.cms.gallery', compact('galleries', 'channels'));
    }

    public function saveGallery(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $title = trim($request->input('title', ''));
        if (empty($title)) {
            return back()->with('error', 'Judul foto wajib diisi.');
        }

        $imageUrl = $request->input('image_url', '');
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $imageUrl = asset('uploads/' . $filename);
        }

        $data = [
            'id' => $id ?: time(),
            'title' => $title,
            'category' => $request->input('category', 'Ibadah'),
            'image_url' => $imageUrl ?: asset('images/Dokumentasi1.png'),
            'caption' => $request->input('caption', ''),
            'sort_order' => (int) $request->input('sort_order', 1),
        ];

        // 1. Update in DB if available
        try {
            if ($id && Gallery::where('id', $id)->exists()) {
                Gallery::where('id', $id)->update($data);
            } else {
                $created = Gallery::create($data);
                $data['id'] = $created->id;
            }
        } catch (Throwable $e) {}

        // 2. Update in JSON
        $items = CmsService::getGalleries();
        $found = false;
        foreach ($items as &$it) {
            if ($it['id'] == $data['id']) {
                $it = array_merge($it, $data);
                $found = true;
                break;
            }
        }
        if (!$found) {
            array_unshift($items, $data);
        }
        usort($items, fn($a, $b) => ($a['sort_order'] ?? 0) <=> ($b['sort_order'] ?? 0));
        CmsService::saveGalleries($items);

        return back()->with('success', 'Foto dokumentasi berhasil disimpan!');
    }

    public function deleteGallery($id): RedirectResponse
    {
        try {
            Gallery::where('id', $id)->delete();
        } catch (Throwable $e) {}

        $items = CmsService::getGalleries();
        $items = array_values(array_filter($items, fn($g) => $g['id'] != $id));
        CmsService::saveGalleries($items);

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    public function saveChannels(Request $request): RedirectResponse
    {
        $channels = $request->input('channels', []);
        if (is_array($channels)) {
            CmsService::saveChannels(array_values($channels));
        }

        return back()->with('success', 'Saluran YouTube berhasil disimpan!');
    }

    // =========================================================================
    // 8. KOTAK PERMOHONAN DOA JEMAAT (PRAYER REQUESTS)
    // =========================================================================

    public function prayers(): View
    {
        $prayers = CmsService::getPrayerRequests();
        return view('admin.cms.prayers', compact('prayers'));
    }

    public function togglePrayerContacted($id): RedirectResponse
    {
        CmsService::togglePrayerContacted($id);
        return back()->with('success', 'Status permohonan doa berhasil diubah.');
    }

    public function deletePrayer($id): RedirectResponse
    {
        CmsService::deletePrayer($id);
        return back()->with('success', 'Permohonan doa berhasil dihapus.');
    }
}

