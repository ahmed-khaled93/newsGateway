<?php

namespace App;
// namespace Dimsav\Translatable\Test\Model;
// use \Dimsav\Translatable\Translatable;
// use Illuminate\Database\Eloquent\Model as Eloquent;

class ArticleTranslation extends Model
{
	public $timestamps = false;
    protected $fillable = ['title','body'];
    // public $timestamps = false;
    // protected $fillable = ['title','body'];
}
