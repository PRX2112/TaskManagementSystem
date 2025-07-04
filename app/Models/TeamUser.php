<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table = 'team_user'; // Specify the pivot table name

    protected $fillable = [
        'team_id',
        'user_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
