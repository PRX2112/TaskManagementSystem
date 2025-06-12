<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function team() {
        return $this->belongsTo(Team::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }


}
