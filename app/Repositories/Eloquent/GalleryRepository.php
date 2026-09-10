<?php

namespace App\Repositories\Eloquent;

use App\Models\Gallery;
use App\Repositories\Contracts\GalleryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GalleryRepository implements GalleryRepositoryInterface
{
    public function getAllOrdered(): Collection
    {
        return Gallery::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getByCategory(string $category): Collection
    {
        return Gallery::where('category', $category)
            ->orderBy('sort_order', 'asc')
            ->get();
    }

    public function getCategories(): array
    {
        return Gallery::select('category')->distinct()->pluck('category')->toArray();
    }
}
