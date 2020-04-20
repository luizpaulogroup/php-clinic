<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Query
 * 
 * @property int $id
 * @property string $client_id
 * @property string $product_id
 * @property string $value
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
**/

class Query extends Model
{
	protected $table = 'sale';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
		'client_id',
		'product_id',
		'value',
		'status',
        'created_at',
        'updated_at'
	);

}
