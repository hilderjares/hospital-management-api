<?php

declare(strict_types=1);

namespace App\EloquentRepository;

use App\Domain\Hospital\Hospital;
use App\Domain\Hospital\HospitalNotFoundException;
use App\Domain\Hospital\HospitalRepository;
use Illuminate\Support\Collection;

final class HospitalEloquentRepository implements HospitalRepository
{
    public function create(array $data): Hospital
    {
        $hospital = new Hospital();
        $hospital->name = $data['name'];
        $hospital->address = $data['address'];
        $hospital->city = $data['city'];
        $hospital->save();

        return $hospital;
    }

    public function getAll(): Collection
    {
        $hospital = new Hospital();

        return $hospital->all();
    }

    public function search(int $id): Hospital
    {
        $hospital = new Hospital();
        $hospital = $hospital->find($id);

        if (!$hospital) {
            throw new HospitalNotFoundException("Hospital not found", 404);
        }
        return $hospital;
    }

    public function delete(int $id): Hospital
    {
        $hospital = $this->search($id);
        $hospital->delete();

        return $hospital;
    }

    public function update(array $data, int $id): Hospital
    {
        $hospital = $this->search($id);
        $hospital->name = $data['name'];
        $hospital->address = $data['address'];
        $hospital->city = $data['city'];
        $hospital->save();

        return  $hospital;
    }
}
