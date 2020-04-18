<?php

declare(strict_types=1);

namespace App\Domain\Hospital;

use App\Domain\Hospital\Hospital;
use Illuminate\Support\Collection;

interface HospitalRepository
{
    public function create(array $data): Hospital;

    public function getAll(): Collection;

    public function search(int $id): Hospital;

    public function delete(int $id): Hospital;
}
