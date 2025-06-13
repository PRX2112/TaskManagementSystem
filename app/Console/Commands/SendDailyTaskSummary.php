<?php

namespace App\Console\Commands;

use App\Mail\DailyTaskSummary;
use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Mail;

class SendDailyTaskSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:daily-summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily summary of assigned tasks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user){
            $tasks = Task::where('user_id', $user->id)
                ->whereDate('created_at','>=',now()->subDay())
                ->get();
            if ($tasks->isNotEmpty()) {
                Mail::to($user->email)->queue(new DailyTaskSummary($user, $tasks));
            }
        }
        $this->info('Daily task summary emails sent successfully.');
    }
}
