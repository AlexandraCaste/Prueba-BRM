<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $fillable = ['date', 'total_price'];
    protected $guarded = ['id'];

    public function products ()
    {
    	return $this->belongsToMany(Product::class);
    }
}
