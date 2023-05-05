<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosCupone
 * 
 * @property int $idestado
 * @property string|null $estado
 *
 * @package App\Models
 */
class EstadosCupone extends Model
{
	protected $table = 'estados_cupones';
	protected $primaryKey = 'idestado';
	public $timestamps = false;

	protected $fillable = [
		'estado'
	];
}
