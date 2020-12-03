<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

// use Spatie\Permission\Traits\HasRoles;
// use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Notifications\Notifiable;


class Task extends Model
{
    use Notifiable;
    protected $fillable = ['user_id', 'project_id', 'contact_id', 'name', 'deadline'];
    protected $dates = ['deadline','created_at', 'updated_at'];




        
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function contact()
    {
        return $this->belongsToMany('App\User');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }
}
