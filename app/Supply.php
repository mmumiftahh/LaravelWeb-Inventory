<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = ['item_id','total','user_id','supply_date'];

    public function item()
    {
        return $this->hasOne('App\Item','id','item_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
