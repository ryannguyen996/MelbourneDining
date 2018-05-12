<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users'; // Define the table name
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['name', 'email', 'password', 'country_id'];

    public function country()
    {
        return $this->belongsTo('App\countries', 'country_id');
    }
    public function post()
    {
        return $this->hasMany('App\posts', 'user_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\comments', 'user_id', 'id');
    }
    public function role()
    {
        return $this->belongsToMany('App\roles', 'role_user');
    }
}
