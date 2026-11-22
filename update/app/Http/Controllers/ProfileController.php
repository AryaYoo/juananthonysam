<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profileData = CmsService::getProfile();
        return view('pages.profile', $profileData);
    }

    public function juan(): View
    {
        $pastor = CmsService::getPastor('juan');
        return view('pages.pastor-juan', compact('pastor'));
    }

    public function samuel(): View
    {
        $pastor = CmsService::getPastor('samuel');
        return view('pages.pastor-samuel', compact('pastor'));
    }
}
