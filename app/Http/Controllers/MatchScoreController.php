<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MatchScoreRepositoryInterface;

class MatchScoreController extends Controller
{
    private MatchScoreRepositoryInterface $matchScoreRepository;

    public function __construct(MatchScoreRepositoryInterface $matchScoreRepository)
    {
        $this->matchScoreRepository = $matchScoreRepository;
    }

    public function store(Request $request)
    {
        return response()->json([
            'data'  => $this->matchScoreRepository->createMatchScore($request->all())
        ]);
    }
}
