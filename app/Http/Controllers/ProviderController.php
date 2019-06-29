<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider as Provider;

class ProviderController extends Controller
{
    public static function allProviders()
    {
    	$providers = Provider::all();
    	return $providers;
    }
}
