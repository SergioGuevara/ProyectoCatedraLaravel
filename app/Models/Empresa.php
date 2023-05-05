<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property string $idempresa
 * @property string|null $nombre
 * @property string|null $direccion
 * @property string|null $contacto
 * @property int|null $telefono
 * @property string|null $correo
 * @property float|null $comision
 * @property int|null $idrubro
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresas';
	protected $primaryKey = 'idempresa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'telefono' => 'int',
		'comision' => 'float',
		'idrubro' => 'int'
	];

	protected $fillable = [
		'nombre',
		'direccion',
		'contacto',
		'telefono',
		'correo',
		'comision',
		'idrubro'
	];
}
