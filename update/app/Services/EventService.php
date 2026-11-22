<?php

namespace App\Services;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EventService
{
    public function __construct(
        protected EventRepositoryInterface $eventRepository
    ) {}

    public function getAllEvents(): Collection
    {
        return $this->eventRepository->getAllActive();
    }

    public function getFeaturedEvents(): Collection
    {
        return $this->eventRepository->getFeatured();
    }

    public function getEventBySlug(string $slug): ?Event
    {
        return $this->eventRepository->findBySlug($slug);
    }
}
