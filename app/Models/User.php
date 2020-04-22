<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = 'user';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
        'name',
        'email',
        'created_at',
        'updated_at'
	);

}
