<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'downloads';

	/**
	 * The columns excluded from import.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * The columns included from import.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'hash', 'descr', 'author', 'version', 'path');
}
