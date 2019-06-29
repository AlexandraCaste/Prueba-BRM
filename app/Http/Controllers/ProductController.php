<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as Product;

class ProductController extends Controller
{
    public function create ()
    {

    	$providers = ProviderController::allProviders();
    	return \View::make('products/create', compact('providers'));
    }

    public function store (Request $request)
    {
    	$price = $request->price;
    	$request->price = str_replace(',','.', $price);

    	$product = new Product;
    	$product->name = $request->product;
    	$product->lot_number = $request->lot_number;
    	$product->quantity = $request->quantity;
    	$product->expiration_date = $request->expirationDate;
    	$product->price = $request->price;
    	$product->provider_id = $request->provider;
    	$product->save();
    	return redirect()->back();
    }

    public function show()
    {
    	$product = Product::all();
    	return $product;
    }
}
