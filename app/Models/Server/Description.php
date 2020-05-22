<?php

namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = [
        'rates', 'card_desc', 'server_desc', 'server_rules', 'server_id'
    ];
}
