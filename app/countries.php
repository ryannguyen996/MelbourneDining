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

    protected static function boot() {
        parent::boot();

        static::deleting(function($countries) { // before delete() method call this
            foreach($countries->restaurant as $value) {
                foreach($value->post as $value)
                {
                    foreach($value->comment as $value)
                    {
                        $value->delete();
                    }
                }

            }
            foreach($countries->restaurant as $value) {
                foreach($value->post as $value)
                {
                    $value->delete();
                }

            }
            foreach($countries->restaurant as $value) {
                    $value->delete();
            }

            foreach($countries->user() as $value) {
                foreach($value->post as $value)
                {

                    $value->delete();
                }
            }

            foreach($countries->user as $value) {
                foreach($value->comment as $value)
                {

                    $value->delete();
                }
            }

            foreach($countries->user as $value) {
                $value->role()->detach();
            }

            foreach($countries->user as $value) {
                    $value->delete();
            }
             // do the rest of the cleanup...
        });
    }

}
