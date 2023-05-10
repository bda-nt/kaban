<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executors extends Model
{
    use HasFactory;

    protected $connection = 'kaban';
    protected $table = 'executors';

    protected $guarded = ['id'];
    public $timestamps = true;

    public function role()
    {
        return Roles::all();
    }

    public function user()
    {
        return 0;
    }

    public function task()
    {
        return Task::all();
    }
}
