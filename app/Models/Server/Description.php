<?php
//указать только родителя
namespace App\Models\Server;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
	//указывать какие можно заполнять, тогда в контроллере можно использовать
	//[] все разрешено
	//id created_at указывать не нужно
    protected $fillable = [
        'image', 'events', 'rate', 'shop', 'description', 'open', 'like', 'url', 'power_ip', 'server_id'
    ];
	//имя server совпадает с названием модели server
	//название поля долно быть имя  модели_id то есть server_id не serverS_id
	public function server() {
		
		return $this->belongsTo(Server::class);
	}
}