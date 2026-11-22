<?php

namespace App\Services;

use App\Repositories\Contracts\GalleryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GalleryService
{
    public function __construct(
        protected GalleryRepositoryInterface $galleryRepository
    ) {}

    public function getGalleries(?string $category = null): Collection
    {
        if ($category && $category !== 'all') {
            return $this->galleryRepository->getByCategory($category);
        }

        return $this->galleryRepository->getAllOrdered();
    }

    public function getCategories(): array
    {
        return ['all', 'Ibadah', 'EFF', 'Teen'];
    }
}
