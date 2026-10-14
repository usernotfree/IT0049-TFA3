<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\I18n\Time;

class Welcome extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();

        return view('welcome', [
            'tasks' => $taskModel->getTasksForToday(),
            'today' => Time::now(config('App')->appTimezone)
                ->toDateString(),
        ]);
    }
}