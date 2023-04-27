<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const TEAM = [
        1 => 'Оценка',
        2 => 'Канбан',
        3 => 'Гант'
    ];

    const PROJECT = [
        1 => 'Test Project #1',
        2 => 'Test Project #2',
        3 => 'Test Project #3',
    ];

    use HasFactory;

    protected $connection = 'kaban';
    protected $table = 'tasks';
    protected $guarded = ['id'];

    /**
     * TODO: CHANGE WHEN AUTH DATABASE CREATED
     *
     * @param int $id
     * @return String
     */
    public function team(int $id) : String
    {
        return self::TEAM[$id];
    }

    public function project(int $id) : string
    {
        return self::PROJECT[$id];
    }

    public function parents(int $id)
    {
        return Task::all();
    }
}
