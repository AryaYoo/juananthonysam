<?php

namespace App\Repositories\Eloquent;

use App\Models\PrayerRequest;
use App\Repositories\Contracts\PrayerRequestRepositoryInterface;

class PrayerRequestRepository implements PrayerRequestRepositoryInterface
{
    public function create(array $data): PrayerRequest
    {
        return PrayerRequest::create($data);
    }
}
