<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Administradore
 * 
 * @property string $idadmin
 * @property string $Nombre
 * @property int $Telefono
 * @property string|null $Correo
 * @property int $Dui
 * @property string $Pass
 * @property int $idrol
 * @property string $idempresa
 *
 * @package App\Models
 */
class Administradore extends Model
{
	protected $table = 'administradores';
	protected $primaryKey = 'idadmin';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Telefono' => 'int',
		'Dui' => 'int',
		'idrol' => 'int'
	];
	protected $hidden = [
		'Pass'
	];

	protected $fillable = [
		'Nombre',
		'Apellido',
		'Telefono',
		'Correo',
		'Dui',
		'Pass',
		'idrol',
		'idempresa'
	];

	public function administrador()
    {
        return $this->hasOne(Administradore::class);
    }
	
}
