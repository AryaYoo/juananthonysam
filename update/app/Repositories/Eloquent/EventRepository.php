<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\Contracts\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EventRepository implements EventRepositoryInterface
{
    public function getAllActive(): Collection
    {
        return Event::where('is_active', true)
            ->orderBy('id', 'asc')
            ->get();
    }

    public function getFeatured(): Collection
    {
        return Event::where('is_active', true)
            ->where('is_featured', true)
            ->get();
    }

    public function findBySlug(string $slug): ?Event
    {
        return Event::where('slug', $slug)->first();
    }

    public function getByCategory(string $category): Collection
    {
        return Event::where('is_active', true)
            ->where('category', $category)
            ->get();
    }
}
