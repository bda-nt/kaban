<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function task()
    {
        return Task::all();
    }
}
