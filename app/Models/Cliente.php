<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property string $idcliente
 * @property string|null $nombre
 * @property string|null $apellido
 * @property int|null $telefono
 * @property string|null $correo
 * @property string|null $direccion
 * @property int|null $dui
 * @property string|null $pass
 * @property int $codigo_verificacion
 * @property bool $verificado
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'clientes';
	protected $primaryKey = 'idcliente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'telefono' => 'int',
		'dui' => 'int',
		'codigo_verificacion' => 'int',
		'verificado' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'telefono',
		'correo',
		'direccion',
		'dui',
		'pass',
		'codigo_verificacion',
		'verificado'
	];
}
