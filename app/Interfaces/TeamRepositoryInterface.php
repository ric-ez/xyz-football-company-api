<?php

namespace App\Interfaces;

interface TeamRepositoryInterface
{
    public function getAllTeams();
    public function showTeam($id);
    public function createTeam(array $team);
    public function updateTeam($id, array $team);
    public function deleteTeam($id);
}
