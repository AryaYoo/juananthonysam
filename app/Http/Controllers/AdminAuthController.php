<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    public function __construct(
        protected AnalyticsService $analyticsService
    ) {}

    /**
     * Tampilkan halaman login atau redirect jika sudah login.
     */
    public function showLogin(Request $request): View|RedirectResponse
    {
        if ($request->session()->get('admin_authenticated') === true) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    /**
     * Proses autentikasi admin.
     * Username: admin
     * Password: admin
     */
    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $username = trim($validated['username']);
        $password = trim($validated['password']);

        // Kredensial sesuai instruksi: admin / admin
        if ($username === 'admin' && $password === 'admin') {
            $request->session()->put('admin_authenticated', true);
            $request->session()->put('admin_user', 'admin');
            $request->session()->put('admin_logged_at', now()->toDateTimeString());

            return redirect()->route('admin.dashboard')->with('success', 'Berhasil masuk ke Dashboard Admin.');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['login' => 'Username atau password yang Anda masukkan tidak sesuai.']);
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget(['admin_authenticated', 'admin_user', 'admin_logged_at']);
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('info', 'Anda telah keluar dari sesi admin.');
    }

    /**
     * Dashboard analitik admin.
     */
    public function dashboard(Request $request): View
    {
        $days = (int) $request->get('range', 14);
        if (!in_array($days, [7, 14, 30])) {
            $days = 14;
        }

        $summary      = $this->analyticsService->getSummary();
        $visitChart   = $this->analyticsService->getVisitChartData($days);
        $clickChart   = $this->analyticsService->getLinkClickChartData();
        $recentClicks = $this->analyticsService->getRecentClicks(8);

        return view('admin.dashboard', compact('summary', 'visitChart', 'clickChart', 'recentClicks', 'days'));
    }

    /**
     * Halaman manajemen Banner Iklan Kemitraan.
     */
    public function banner(): View
    {
        $bannerData = $this->getBannerData();
        return view('admin.banner', compact('bannerData'));
    }

    /**
     * Simpan HTML iklan kemitraan banner.
     */
    public function saveBanner(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'banner_html'    => 'nullable|string|max:10000',
            'banner_enabled' => 'nullable|boolean',
        ]);

        $data = [
            'html'    => $validated['banner_html'] ?? '',
            'enabled' => $request->boolean('banner_enabled'),
            'updated_at' => now()->toDateTimeString(),
        ];

        file_put_contents(storage_path('app/banner.json'), json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return back()->with('banner_success', 'Banner iklan berhasil disimpan.');
    }

    /**
     * Baca data banner dari storage.
     */
    private function getBannerData(): array
    {
        $path = storage_path('app/banner.json');
        if (!file_exists($path)) {
            return ['html' => '', 'enabled' => false, 'updated_at' => null];
        }
        $data = json_decode(file_get_contents($path), true);
        return is_array($data) ? $data : ['html' => '', 'enabled' => false, 'updated_at' => null];
    }

    /**
     * API untuk menerima pelacakan klik link secara asinkron dari frontend.
     */
    public function trackClick(Request $request): JsonResponse
    {
        $userAgent = $request->userAgent() ?? '';
        $device = 'desktop';

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', $userAgent)) {
            $device = 'tablet';
        } elseif (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $userAgent)) {
            $device = 'mobile';
        }

        $this->analyticsService->recordLinkClick([
            'link_label' => $request->input('link_label', 'Link'),
            'link_url'   => $request->input('link_url', ''),
            'page_url'   => $request->input('page_url', ''),
            'ip_address' => $request->ip(),
            'device'     => $device,
        ]);

        return response()->json(['status' => 'success']);
    }
}
