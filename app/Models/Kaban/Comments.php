<?php

namespace App\Models\Kaban;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Task;

/**
 * App\Models\Comments
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comments query()
 */
class Comments extends Model
{
    use HasFactory;

    protected $connection = 'kaban';
    protected $table = '';

    protected $guarded = ['id'];
    public $timestamps = true;

    public function task()
    {
        return Task::all();
    }
}
