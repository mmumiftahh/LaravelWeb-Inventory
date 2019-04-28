<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class Employee extends Model implements AuthenticableContract
{
	use Authenticatable;

    protected $fillable = ['nip','name','username','password','address'];

    public function borrow()
    {
        return $this->hasMany('App\Borrow','id','id');
    }
}
