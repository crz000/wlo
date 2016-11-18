<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "banco";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * The rules that is used to validate.
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string|max:45'
    ];
    

	public function pagos() {
		return $this->hasMany('App\Models\Pago', 'banco_destino', 'id');
	}
}
