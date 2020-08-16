<?php
//указать только родителя
namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;


class Server extends Model
{
    protected $fillable = [
        'name', 'url'
    ];
	
    //имя description совпадает с названием модели Description
	public function description() {

		return	$this->hasOne(Description::class);
	}
}