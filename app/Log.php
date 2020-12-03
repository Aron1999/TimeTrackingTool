<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id', 'task_id', 'name', 'description', 'is_running', 'started_at', 'ended_at'];
    protected $dates = ['started_at', 'ended_at','created_at', 'updated_at'];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
