<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * The columns excluded from import.
	 *
	 * @var array
	 */
	protected $guarded = array('ID');

	/**
	 * The columns included from import.
	 *
	 * @var array
	 */
	protected $fillable = array('Name', 'Hash', 'thumbnail');

}
