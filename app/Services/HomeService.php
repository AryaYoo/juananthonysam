<?php

namespace App\Services;

use App\Repositories\Contracts\EventRepositoryInterface;
use App\Repositories\Contracts\GalleryRepositoryInterface;

class HomeService
{
    public function __construct(
        protected EventRepositoryInterface $eventRepository,
        protected GalleryRepositoryInterface $galleryRepository
    ) {}

    public function getHomeData(): array
    {
        $cmsHome = CmsService::getHome();
        $schedules = CmsService::getSchedules();

        try {
            $featuredEvents = $this->eventRepository->getFeatured();
            if ($featuredEvents->isEmpty()) {
                $featuredEvents = collect(CmsService::getFeaturedEvents());
            }
        } catch (\Throwable $e) {
            $featuredEvents = collect(CmsService::getFeaturedEvents());
        }

        try {
            $recentGalleries = $this->galleryRepository->getAllOrdered()->take(6);
            if ($recentGalleries->isEmpty()) {
                $recentGalleries = collect(array_slice(CmsService::getGalleries(), 0, 6));
            }
        } catch (\Throwable $e) {
            $recentGalleries = collect(array_slice(CmsService::getGalleries(), 0, 6));
        }

        return [
            'schedules' => $schedules,
            'hero_slides' => $cmsHome['hero_slides'] ?? CmsService::defaultHome()['hero_slides'],
            'hero' => $cmsHome['hero'] ?? CmsService::defaultHome()['hero'],
            'theme_2026' => $cmsHome['theme_2026'] ?? CmsService::defaultHome()['theme_2026'],
            'pastoral_services' => $cmsHome['pastoral_services'] ?? CmsService::defaultHome()['pastoral_services'],
            'giving' => $cmsHome['giving'] ?? CmsService::defaultHome()['giving'],
            'featured_events' => $featuredEvents,
            'recent_galleries' => $recentGalleries,
        ];
    }
}
