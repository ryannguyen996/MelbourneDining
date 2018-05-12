<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $table = 'countries'; // Define the table name
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['name'];

    public function restaurant()
    {
        return $this->hasMany('App\restaurants', 'country_id', 'id');
    }
    public function user()
    {
        return $this->hasMany('App\users', 'country_id', 'id');
    }
}
