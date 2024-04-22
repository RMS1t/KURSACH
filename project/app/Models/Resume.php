<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{

    protected $fillable = [
        "first_name",
        'name',
        "last_name",
        "resident_address",
        'birthdate',
        'citizenship',
        "work_permission",
        "user_id",
        "gender"
    ];
    protected $casts = [
        'birthdate' => 'date',
    ];
    use HasFactory;
}
