<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdvice extends Model
{
    use HasFactory;

    protected $table = 'users-advices';

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'advice'
    ];
}
