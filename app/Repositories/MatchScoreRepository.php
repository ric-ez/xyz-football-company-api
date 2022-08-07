<?php

namespace App\Repositories;

use App\Interfaces\MatchScoreRepositoryInterface;
use App\Models\MatchScore;

class MatchScoreRepository implements MatchScoreRepositoryInterface
{
    public function createMatchScore(array $matchScore)
    {
        return MatchScore::create($matchScore);
    }
}
