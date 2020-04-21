<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
	protected $table = 'specialty';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
        'created_at',
        'updated_at'
	);

}
