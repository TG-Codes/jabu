<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskMeta extends Model
{
    use HasFactory;

    protected $table = 'tasks_meta';
    protected $primarykey = 'id';
    protected $fillable = [
        'task_id',	
        'repeat_start',	
        'repeat_interval',	
        'repeat_year',	
        'repeat_month',	
        'repeat_day',	
        'repeat_week',	
        'repeat_weekday'
    ];
}
