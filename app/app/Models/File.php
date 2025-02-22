<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = [
        'file_name',
        'file_path',
        'file_active',
        'file_tenant'
    ];
}
