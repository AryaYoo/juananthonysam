<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use Illuminate\View\View;

class IbadahController extends Controller
{
    /**
     * Halaman Ibadah: My Home (Komunitas Sel & Rumah ke Rumah)
     */
    public function myHome(): View
    {
        $data = CmsService::getIbadah('my-home');
        return view('pages.ibadah.detail', $data);
    }

    /**
     * Halaman Ibadah: Ekidz (Pelayanan & Ibadah Anak)
     */
    public function ekidz(): View
    {
        $data = CmsService::getIbadah('ekidz');
        return view('pages.ibadah.detail', $data);
    }

    /**
     * Halaman Ibadah: Ekklesia Teens (Remaja & Pemuda)
     */
    public function teens(): View
    {
        $data = CmsService::getIbadah('teens');
        return view('pages.ibadah.detail', $data);
    }
}
