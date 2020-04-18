<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\EloquentRepository\HospitalEloquentRepository;
use App\Entities\Hospital;
use App\Exceptions\HospitalNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalRequest;
use Illuminate\Http\JsonResponse;

final class HospitalController extends Controller
{
    private $hospitalEloquentRepository;

    public function __construct(HospitalEloquentRepository $hospitalEloquentRepository)
    {
        $this->hospitalEloquentRepository = $hospitalEloquentRepository;
    }

    public function index(): JsonResponse
    {
        $hospitals = $this->hospitalEloquentRepository->getAll();

        return response()->json($hospitals, 200);
    }

    public function store(HospitalRequest $request): JsonResponse
    {
        $hospital = $this->hospitalEloquentRepository->create($request->post());

        return response()->json($hospital, 201);
    }

    public function show(int $id): JsonResponse
    {
        $hospital = $this->hospitalEloquentRepository->search($id);

        return response()->json($hospital, 200);
    }

    public function update(HospitalRequest $request, $id): JsonResponse
    {
        $hospital = $this->hospitalEloquentRepository->update($request->post(), (int)$id);

        return response()->json($hospital, 200);
    }

    public function destroy($id): JsonResponse
    {
        $hospital = $this->hospitalEloquentRepository->delete((int)$id);

        return response()->json($hospital, 200);
    }
}
