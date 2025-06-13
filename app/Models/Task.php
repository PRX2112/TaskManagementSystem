<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function assignee() {
        return $this->belongsTo(User::class, 'user_id'); // user_id is the assignee
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id'); // user_id is the assignee
    }
}
