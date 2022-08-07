<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MatchResultRepositoryInterface;
use Illuminate\Http\JsonResponse;

class MatchResultController extends Controller
{
    private MatchResultRepositoryInterface $matchResultRepository;

    public function __construct(MatchResultRepositoryInterface $matchResultRepository)
    {
        $this->matchResultRepository = $matchResultRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data'  => $this->matchResultRepository->getAllMatchResults()
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'data'  => $this->matchResultRepository->createMatchResult($request->all())
        ]);
    }
}
