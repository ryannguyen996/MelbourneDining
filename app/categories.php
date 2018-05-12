<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories'; // Define the table name
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['name'];

     public function restaurant()
    {
        return $this->hasMany('App\restaurants', 'category_id', 'id');
    }
}
