<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // ارتباط پروژه با مالک (کاربر)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // ارتباط پروژه با سازمان
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    // تسک‌هایی که به این پروژه مرتبط هستند
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
