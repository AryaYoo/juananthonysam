<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrayerRequestRequest;
use App\Services\HomeService;
use App\Services\PrayerRequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        protected HomeService $homeService,
        protected PrayerRequestService $prayerRequestService
    ) {}

    public function index(): View
    {
        $data = $this->homeService->getHomeData();
        return view('pages.home', $data);
    }

    public function prayerRequest(StorePrayerRequestRequest $request): RedirectResponse
    {
        $this->prayerRequestService->submitPrayerRequest($request->validated());

        return redirect()
            ->route('home', ['#doa'])
            ->with('success', 'Terima kasih. Permohonan doa Anda telah kami terima dan akan didoakan oleh tim pastoral Ekklesia Surabaya.');
    }
}
