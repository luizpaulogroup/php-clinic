<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $value
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
**/

class Product extends Model
{
	protected $table = 'product';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
		'name',
        'value',
        'status',
        'created_at',
        'updated_at'
	);

}
