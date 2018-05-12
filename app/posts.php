<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = 'posts'; // Define the table name
    public $incrementing = false;
    protected $primaryKey = "id";
    protected $fillable = ['content', 'restaurant_id', 'user_id'];

    public function restaurant()
    {
        return $this->belongsTo('App\restaurants', 'restaurant_id');
    }
    public function comment()
    {
        return $this->hasMany('App\comments', 'post_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\users', 'user_id');
    }
}
