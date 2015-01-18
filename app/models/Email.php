<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Email extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emails';

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
    protected $guarded = array('id');

    /**
     * The columns included with import.
     *
     * @var array
     */
    protected $fillable = array('email');

    /**
     * Disable timestamps
     *
     * @var bool
     */
    public $timestamps = false;

}
