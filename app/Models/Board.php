<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Eloquent 모델 방법 사용

class Board extends Model
{
    protected $table = 'board';
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
    ];
}
