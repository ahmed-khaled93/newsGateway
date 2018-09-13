<?php

namespace App;
use \Dimsav\Translatable\Translatable;


class Country extends Model
{
    
    public $translatedAttributes = ['name'];
    protected $fillable = ['code'];
    
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    // (optionaly)
    // protected $with = ['translations'];
}
