<?php

namespace App\Services;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

class AnalyticsService
{
    /**
     * Dapatkan ringkasan metrik statistik utama.
     */
    public function getSummary(): array
    {
        if (!$this->hasTables()) {
            return $this->getMockSummary();
        }

        try {
            $totalVisits = DB::table('analytics_page_visits')->count();
            if ($totalVisits === 0) {
                return $this->getMockSummary();
            }

            $today = now()->toDateString();
            $todayVisits = DB::table('analytics_page_visits')
                ->where('visit_date', $today)
                ->count();

            $totalClicks = DB::table('analytics_link_clicks')->count();
            $todayClicks = DB::table('analytics_link_clicks')
                ->where('click_date', $today)
                ->count();

            $topLink = DB::table('analytics_link_clicks')
                ->select('link_label', DB::raw('count(*) as total'))
                ->groupBy('link_label')
                ->orderByDesc('total')
                ->first();

            return [
                'total_visits' => $totalVisits,
                'today_visits' => $todayVisits,
                'total_clicks' => $totalClicks,
                'today_clicks' => $todayClicks,
                'top_link'     => $topLink ? $topLink->link_label : 'Belum ada data',
                'is_demo_data' => false,
            ];
        } catch (Throwable $e) {
            return $this->getMockSummary();
        }
    }

    /**
     * Dapatkan data grafik riwayat kunjungan harian (misal: 14 hari terakhir).
     */
    public function getVisitChartData(int $days = 14): array
    {
        if (!$this->hasTables()) {
            return $this->getMockVisitChartData($days);
        }

        try {
            $totalVisits = DB::table('analytics_page_visits')->count();
            if ($totalVisits === 0) {
                return $this->getMockVisitChartData($days);
            }

            $startDate = now()->subDays($days - 1)->startOfDay();
            $endDate = now()->endOfDay();

            $records = DB::table('analytics_page_visits')
                ->select(DB::raw('visit_date'), DB::raw('count(*) as count'))
                ->whereBetween('visit_date', [$startDate->toDateString(), $endDate->toDateString()])
                ->groupBy('visit_date')
                ->pluck('count', 'visit_date')
                ->toArray();

            $period = CarbonPeriod::create($startDate, $endDate);
            $labels = [];
            $values = [];

            foreach ($period as $date) {
                $dateKey = $date->toDateString();
                $labels[] = $date->format('d M');
                $values[] = $records[$dateKey] ?? 0;
            }

            return [
                'labels' => $labels,
                'values' => $values,
            ];
        } catch (Throwable $e) {
            return $this->getMockVisitChartData($days);
        }
    }

    /**
     * Dapatkan data grafik distribusi klik link.
     */
    public function getLinkClickChartData(): array
    {
        if (!$this->hasTables()) {
            return $this->getMockLinkClickChartData();
        }

        try {
            $totalClicks = DB::table('analytics_link_clicks')->count();
            if ($totalClicks === 0) {
                return $this->getMockLinkClickChartData();
            }

            $topLinks = DB::table('analytics_link_clicks')
                ->select('link_label', DB::raw('count(*) as total'))
                ->groupBy('link_label')
                ->orderByDesc('total')
                ->limit(6)
                ->get();

            $labels = [];
            $values = [];

            foreach ($topLinks as $link) {
                $labels[] = $link->link_label;
                $values[] = (int) $link->total;
            }

            return [
                'labels' => $labels,
                'values' => $values,
            ];
        } catch (Throwable $e) {
            return $this->getMockLinkClickChartData();
        }
    }

    /**
     * Dapatkan daftar log klik link terbaru.
     */
    public function getRecentClicks(int $limit = 8): array
    {
        if (!$this->hasTables()) {
            return $this->getMockRecentClicks();
        }

        try {
            $records = DB::table('analytics_link_clicks')
                ->orderByDesc('clicked_at')
                ->limit($limit)
                ->get();

            if ($records->isEmpty()) {
                return $this->getMockRecentClicks();
            }

            return $records->map(function ($row) {
                return [
                    'label'      => $row->link_label,
                    'url'        => $row->link_url,
                    'page'       => $row->page_url,
                    'device'     => $row->device ?? 'mobile',
                    'time_human' => Carbon::parse($row->clicked_at)->diffForHumans(),
                ];
            })->toArray();
        } catch (Throwable $e) {
            return $this->getMockRecentClicks();
        }
    }

    /**
     * Simpan event klik link.
     */
    public function recordLinkClick(array $data): bool
    {
        if (!$this->hasTables()) {
            return false;
        }

        try {
            DB::table('analytics_link_clicks')->insert([
                'link_label' => substr($data['link_label'] ?? 'Link', 0, 255),
                'link_url'   => substr($data['link_url'] ?? '', 0, 500),
                'page_url'   => substr($data['page_url'] ?? '', 0, 500),
                'ip_address' => $data['ip_address'] ?? null,
                'device'     => $data['device'] ?? 'desktop',
                'click_date' => now()->toDateString(),
                'clicked_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return true;
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Periksa ketersediaan tabel analitik di database.
     */
    public function hasTables(): bool
    {
        try {
            return Schema::hasTable('analytics_page_visits') && Schema::hasTable('analytics_link_clicks');
        } catch (Throwable $e) {
            return false;
        }
    }

    /* ── DATA MOCK / PREVIEW (FALLBACK SEBELUM MIGRASI) ─────────────────── */

    protected function getMockSummary(): array
    {
        return [
            'total_visits' => 1420,
            'today_visits' => 84,
            'total_clicks' => 389,
            'today_clicks' => 27,
            'top_link'     => 'WhatsApp Pastoral',
            'is_demo_data' => true,
        ];
    }

    protected function getMockVisitChartData(int $days = 14): array
    {
        $startDate = now()->subDays($days - 1);
        $period = CarbonPeriod::create($startDate, now());
        $labels = [];
        $values = [];

        // Pola data pengunjung natural (tinggi saat akhir pekan/ibadah)
        $baseCounts = [45, 52, 60, 58, 85, 120, 142, 48, 55, 62, 70, 92, 134, 84];

        $i = 0;
        foreach ($period as $date) {
            $labels[] = $date->format('d M');
            $values[] = $baseCounts[$i % count($baseCounts)];
            $i++;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    protected function getMockLinkClickChartData(): array
    {
        return [
            'labels' => [
                'WhatsApp Pastoral',
                'WA Pendaftaran Acara',
                'Kirim Doa (Form)',
                'Instagram @ekklesiagereja',
                'YouTube Streaming',
                'Google Maps Lokasi',
            ],
            'values' => [148, 92, 64, 45, 26, 14],
        ];
    }

    protected function getMockRecentClicks(): array
    {
        return [
            [
                'label'      => 'WhatsApp Pastoral',
                'url'        => 'https://wa.me/6281213131060',
                'page'       => '/acara',
                'device'     => 'mobile',
                'time_human' => '5 menit lalu',
            ],
            [
                'label'      => 'WA Pendaftaran Acara',
                'url'        => 'https://wa.me/6281213131060?text=Halo...',
                'page'       => '/acara',
                'device'     => 'mobile',
                'time_human' => '18 menit lalu',
            ],
            [
                'label'      => 'Instagram @ekklesiagereja',
                'url'        => 'https://instagram.com/ekklesiasurabaya',
                'page'       => '/',
                'device'     => 'desktop',
                'time_human' => '42 menit lalu',
            ],
            [
                'label'      => 'Google Maps Lokasi',
                'url'        => 'https://maps.google.com/?q=Ruko+Ngaglik+2',
                'page'       => '/profil',
                'device'     => 'mobile',
                'time_human' => '1 jam lalu',
            ],
            [
                'label'      => 'Kirim Permohonan Doa',
                'url'        => '/permohonan-doa',
                'page'       => '/',
                'device'     => 'mobile',
                'time_human' => '2 jam lalu',
            ],
        ];
    }
}
