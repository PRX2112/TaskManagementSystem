<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use App\Mail\TaskAssignedMail as TaskAssigned;
use Illuminate\Support\Facades\Mail;
use App\Services\Contracts\TaskAssignmentServiceInterface;
use Laravel\Telescope\Telescope;


class TaskAssignmentService implements TaskAssignmentServiceInterface
{
    public function assign(Task $task, User $user): void
    {
        $task->assignee()->associate($user);
        $task->status = 'Pending';
        $task->save();
        Telescope::tag(fn () => ['task:assigned']);
        Mail::to($user->email)->queue(new TaskAssigned($task));
    }
}
