<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;


class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'created_at',
    ];

    public function getTasksForToday(): array
    {
        $today = Time::now(config('App')->appTimezone)->toDateString();

        return $this
            ->where('task_date', $today)
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }

    public function getAllTasks(): array
    {
        return $this
            ->orderBy('task_date', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->findAll();
    }
}