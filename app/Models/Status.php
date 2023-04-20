<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $connection = 'kaban';
    protected $table = 'statuses';
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    /**
     * TODO: ADD RELATIONSHIP TO TASK TABLE
     * @return int
     */
    public function tasks()
    {
        return 0;
    }
}
