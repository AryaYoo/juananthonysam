<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class TrackPageVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya mencatat HTTP GET dan bukan permintaan ajax/admin/internal asset
        if ($request->isMethod('GET') && !$request->ajax() && !$request->is('manage-admin*') && !$request->is('api*') && !$request->is('up')) {
            $this->logVisit($request);
        }

        return $response;
    }

    /**
     * Catat kunjungan secara aman ke database jika tabel tersedia.
     */
    protected function logVisit(Request $request): void
    {
        try {
            // Cek apakah tabel analytics_page_visits tersedia
            if (!Schema::hasTable('analytics_page_visits')) {
                return;
            }

            $userAgent = $request->userAgent() ?? '';
            $device = 'desktop';

            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $userAgent)) {
                $device = 'tablet';
            } elseif (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent)) {
                $device = 'mobile';
            }

            DB::table('analytics_page_visits')->insert([
                'url'         => substr($request->fullUrl(), 0, 500),
                'route_name'  => $request->route() ? $request->route()->getName() : null,
                'ip_address'  => $request->ip(),
                'user_agent'  => substr($userAgent, 0, 1000),
                'device'      => $device,
                'referer'     => substr($request->header('referer', ''), 0, 500) ?: null,
                'visit_date'  => now()->toDateString(),
                'visited_at'  => now(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        } catch (Throwable $e) {
            // Abaikan kesalahan pencatatan agar alur utama pengunjung tidak pernah terganggu
        }
    }
}
