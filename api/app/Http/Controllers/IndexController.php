<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class IndexController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(['message' => 'documentation'], 200);
    }
}
