<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Eloquent 모델 방법 사용

class Attachment extends Model
{
    protected $table = 'attachments';
    public $timestamps = false;

    protected $fillable = [
        'bid',
        'md5Name',
        'fileName',
        'fileExt',
        'fileSize',
    ];
}
