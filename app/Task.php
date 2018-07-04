<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Task extends Model
{
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'title', 'eng_title', 'task','degree_type',
        ];

        public function mentor()
        {
            return $this->belongsTo('App\User' ,'mentor_id');
        }

        public function student()
        {
            return $this->belongsTo('App\User' ,'student_id');
        }

        public function appliedStudents()
        {
            return $this->belongsToMany('App\User', 'task_user', 'task_id', 'user_id');
        }
}
