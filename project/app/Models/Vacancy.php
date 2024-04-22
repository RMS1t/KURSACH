<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{

    protected $fillable = [
        'vac_name',
        'work_type',
        'description',
        'salary',
        'required_experience',
        'required_education',
        'company_id',
    ];

    use HasFactory;
}
