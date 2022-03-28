<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserHasTask extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task(){
        return $this->hasMany(Task::class, 'id', 'task_id');
    }
}
