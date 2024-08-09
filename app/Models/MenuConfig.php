<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'menuconf_title',
        'menuconf_description',
        'menuconf_open',
        'menuconf_lunch',
        'menuconf_reopen',
        'menuconf_close',
        'menuconf_wait_time',
    ];
}
