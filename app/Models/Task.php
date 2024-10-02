<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

     // ارتباط تسک با پروژه
     public function project()
     {
         return $this->belongsTo(Project::class);
     }

     // ارتباط تسک با کاربری که به آن اختصاص داده شده
     public function assignee()
     {
         return $this->belongsTo(User::class, 'assignee_id');
     }
}
