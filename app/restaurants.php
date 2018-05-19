<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurants extends Model
{
    protected $table = 'restaurants'; // Define the table name
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = ['name', 'phone', 'address1', 'address2', 'suburb', 'state', 'numberofseats', 'country_id', 'category_id'];

    public function country()
    {
        return $this->belongsTo('App\countries', 'country_id');
    }

    public function category()
    {
        return $this->belongsTo('App\categories', 'category_id');
    }

    public function post()
    {
        return $this->hasMany('App\posts', 'restaurant_id', 'id');
    }

}
