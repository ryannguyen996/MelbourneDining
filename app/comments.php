<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = 'comments'; // Define the table name
    protected $primaryKey = "id";
    protected $fillable = ['content', 'post_id', 'user_id'];

    public function post()
    {
        return $this->belongsTo('App\posts', 'post_id');
    }
    public function user()
    {
        return $this->belongsTo('App\users', 'user_id');
    }
}
