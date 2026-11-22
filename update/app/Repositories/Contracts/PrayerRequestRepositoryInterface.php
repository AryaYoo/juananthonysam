<?php

namespace App\Repositories\Contracts;

use App\Models\PrayerRequest;

interface PrayerRequestRepositoryInterface
{
    public function create(array $data): PrayerRequest;
}
