<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $connection = 'kaban';
    protected $table = 'roles';
    protected $guarded = ['id'];
    protected $fillable = [
        'name'
    ];
    public $timestamps = true;

    /**
     * TODO: ADD RELATIONSHIP TO EXECUTORS
     * @return int
     */
    public function executors()
    {
        return 0;
    }
}
