<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Key.
 */
class Key extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'api_keys';

    /**
     * Non-mass-assignable columns.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Override the default find function.
     *
     * @param $key
     * @return Key
     */
    protected function find($key)
    {
        return self::where('key', $key)->first();
    }
}
