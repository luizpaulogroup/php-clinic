<?php

namespace App\Models;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
	protected $table = 'query';

	protected $dates = array(
		'created_at',
        'updated_at'
	);

	protected $fillable = array(
		'patient_id',
		'doctor_id',
        'created_at',
        'updated_at'
	);

}
