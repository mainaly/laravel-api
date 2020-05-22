<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'name', 'url'
    ];
}
