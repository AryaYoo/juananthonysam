<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface GalleryRepositoryInterface
{
    public function getAllOrdered(): Collection;
    public function getByCategory(string $category): Collection;
    public function getCategories(): array;
}
