<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\TeamRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TeamController extends Controller
{
    private TeamRepositoryInterface $teamRepository;

    public function __construct(TeamRepositoryInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data'  => $this->teamRepository->getAllTeams()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'data'  => $this->teamRepository->showTeam($id)
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'data'  => $this->teamRepository->createTeam($request->all())
        ]);
    }

    public function update($id, Request $request)
    {
        return response()->json([
            'data'  => $this->teamRepository->updateTeam($id, $request->all())
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'data'  => $this->teamRepository->deleteTeam($id)
        ]);
    }
}
