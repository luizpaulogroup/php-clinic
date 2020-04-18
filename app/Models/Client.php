<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
**/

class Client extends Model
{
	protected $table = 'client';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
		'name',
		'email',
        'status',
        'created_at',
        'updated_at'
	);

}
