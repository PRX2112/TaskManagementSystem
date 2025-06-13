<?php

namespace App\Services\Contracts;

use App\Models\Task;
use App\Models\User;

interface TaskAssignmentServiceInterface
{
    public function assign(Task $task, User $user): void;
}
