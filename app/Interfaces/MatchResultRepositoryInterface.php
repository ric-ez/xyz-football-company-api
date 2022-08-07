<?php

namespace App\Interfaces;

interface MatchResultRepositoryInterface
{
    public function getAllMatchResults();
    public function createMatchResult(array $matchResult);
}
