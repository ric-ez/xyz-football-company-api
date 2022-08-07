<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ScheduleRepositoryInterface;

class ScheduleController extends Controller
{
    private ScheduleRepositoryInterface $scheduleRepository;

    public function __construct(ScheduleRepositoryInterface $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function store(Request $request)
    {
        return response()->json([
            'data'  => $this->scheduleRepository->createSchedule($request->all())
        ]);
    }
}
