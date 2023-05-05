<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Oferta
 * 
 * @property int $idoferta
 * @property string $imagen
 * @property string $titulo
 * @property float $precio_regular
 * @property float $precio_oferta
 * @property Carbon|null $fecha_inicio
 * @property Carbon|null $fecha_final
 * @property Carbon|null $fecha_caducidad
 * @property int|null $cantidad_cupones
 * @property string|null $descripcion
 * @property string|null $idempresa
 * @property int|null $idestado
 *
 * @package App\Models
 */
class Oferta extends Model
{
	protected $table = 'ofertas';
	protected $primaryKey = 'idoferta';
	public $timestamps = false;

	protected $casts = [
		'precio_regular' => 'float',
		'precio_oferta' => 'float',
		'fecha_inicio' => 'datetime',
		'fecha_final' => 'datetime',
		'fecha_caducidad' => 'datetime',
		'cantidad_cupones' => 'int',
		'idestado' => 'int'
	];

	protected $fillable = [
		'imagen',
		'titulo',
		'precio_regular',
		'precio_oferta',
		'fecha_inicio',
		'fecha_final',
		'fecha_caducidad',
		'cantidad_cupones',
		'descripcion',
		'idempresa',
		'idestado'
	];
}
