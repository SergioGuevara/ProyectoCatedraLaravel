<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubro
 * 
 * @property int $idrubro
 * @property string|null $Rubro
 *
 * @package App\Models
 */
class Rubro extends Model
{
	protected $table = 'rubros';
	protected $primaryKey = 'idrubro';
	public $timestamps = false;

	protected $fillable = [
		'Rubro'
	];
}
