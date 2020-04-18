<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
**/

class Admin extends Model
{
	protected $table = 'admin';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
		'name',
		'email',
		'status',
        'password',
        'created_at',
        'updated_at'
	);

}
