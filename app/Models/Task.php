<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the table name (optional if follows Laravel's default convention)
    protected $table = 'tasks';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'due_date',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: If you want to handle casting of the 'due_date' to a Carbon instance
    protected $dates = ['due_date'];
}
