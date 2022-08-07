<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function createSchedule(array $schedule)
    {
        return Schedule::create($schedule);
    }
}
