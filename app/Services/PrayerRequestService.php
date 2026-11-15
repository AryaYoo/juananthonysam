<?php

namespace App\Services;

use App\Models\PrayerRequest;
use App\Repositories\Contracts\PrayerRequestRepositoryInterface;

class PrayerRequestService
{
    public function __construct(
        protected PrayerRequestRepositoryInterface $prayerRequestRepository
    ) {}

    public function submitPrayerRequest(array $data): ?PrayerRequest
    {
        $payload = [
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'request_text' => $data['request_text'],
            'is_anonymous' => !empty($data['is_anonymous']),
            'is_contacted' => false,
        ];

        // Always record into CMS JSON storage
        CmsService::recordPrayerRequest($payload);

        try {
            return $this->prayerRequestRepository->create($payload);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
