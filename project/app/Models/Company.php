<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'company_name',
        'address',
        'description',
        'inn',
        'kpp',
        'number',
        'company_type',
        'user_id',
    ];
    protected $casts = [
        'verified_at' => 'datetime',
        'id'=>'integer'
    ];

    use HasFactory;
}
