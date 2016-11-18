<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPaquete extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $table = "tipo_paquete";
    
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
    
	public function pedidos() {
		return $this->hasMany('App\Models\Pedido', 'tipo_paquete_id', 'id');
	}
}
