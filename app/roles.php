<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table = 'roles'; // Define the table name
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsToMany('App\users', 'role_user');
    }
}
