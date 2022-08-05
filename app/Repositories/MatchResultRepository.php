<?php

namespace App\Repositories;

use App\Interfaces\MatchResultRepositoryInterface;
use App\Models\MatchResult;

class MatchResultRepository implements MatchResultRepositoryInterface
{
    public function getAllMatchResults()
    {
        return MatchResult::all();
    }
}
