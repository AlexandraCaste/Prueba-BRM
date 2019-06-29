<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'lot_number', 'quantity', 'expiration_date', 'price', 'provider_id'];
    protected $guarded = ['id'];

    public function sales()
    {
    	return $this->belongsToMany(Sale::class);
    }

    public function provider()
    {
    	return $this->belongsTo(Provider::class);
    }
}
