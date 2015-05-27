<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Shop extends Model implements AuthenticatableContract {

    use Authenticatable;

    protected $table = 'shops';

    protected $fillable = ['shop_id'];
}
