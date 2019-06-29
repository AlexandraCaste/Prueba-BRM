<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';
    protected $fillable = ['name'];
    protected $guarded = ['id'];

    public function products()
    {
    	return $this->hasMany(Products::class);
    }
}
