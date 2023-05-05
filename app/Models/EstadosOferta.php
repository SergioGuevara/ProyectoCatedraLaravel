<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosOferta
 * 
 * @property int $idestado
 * @property string|null $estado
 *
 * @package App\Models
 */
class EstadosOferta extends Model
{
	protected $table = 'estados_ofertas';
	protected $primaryKey = 'idestado';
	public $timestamps = false;

	protected $fillable = [
		'estado'
	];
}
