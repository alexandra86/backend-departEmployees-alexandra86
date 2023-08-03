<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'assignee_id',
        'due_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function userTask()
    {
        return $this->belongsTo(User::class);
    }
}
