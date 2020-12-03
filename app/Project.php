<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Spatie\Permission\Traits\HasRoles;
// use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Notifications\Notifiable;


class Project extends Model
{
    use Notifiable;
    protected $fillable = ['user_id', 'name', 'deadline'];
    protected $dates = ['deadline','created_at', 'updated_at'];


        
    public function organisation()
    {
        return $this->belongsTo('App\Organisation');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

}
