<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createdTasks()
    {
        return $this->hasMany('App\Task' ,'mentor_id');
    }

    public function appliedTasks()
    {
        return $this->belongsToMany('App\Task', 'task_user', 'user_id', 'task_id');
    }

    public function confirmedTask()
    {
        return $this->hasOne('App\Task' ,'student_id');
    }

}
