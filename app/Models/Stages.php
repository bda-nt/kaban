<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = true;

    public function task()
    {
        return Task::all();
    }
}
