<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The columns excluded from import.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The columns included from import.
     *
     * @var array
     */
    protected $fillable = ['name', 'hash', 'thumbnail'];
}
