<?php

namespace App\Repositories\Contracts;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryInterface
{
    public function getAllActive(): Collection;
    public function getFeatured(): Collection;
    public function findBySlug(string $slug): ?Event;
    public function getByCategory(string $category): Collection;
}
