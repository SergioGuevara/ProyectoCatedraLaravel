<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cupone
 * 
 * @property string $idcupon
 * @property string $idcliente
 * @property int $idestado
 * @property Carbon|null $fecha_compra
 * @property int|null $idoferta
 *
 * @package App\Models
 */
class Cupone extends Model
{
	protected $table = 'cupones';
	protected $primaryKey = 'idcupon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idestado' => 'int',
		'fecha_compra' => 'datetime',
		'idoferta' => 'int'
	];

	protected $fillable = [
		'idcliente',
		'idestado',
		'fecha_compra',
		'idoferta'
	];
}
