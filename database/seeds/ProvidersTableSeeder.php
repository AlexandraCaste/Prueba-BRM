<?php

use Illuminate\Database\Seeder;
use App\Models\Provider as Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $providers = ['Postobon', 'Coca cola', 'Alquería', 'Colombina'];
        foreach($providers as $pro)
        {
        	$provider = new Provider;
        	$provider->name = $pro;
        	$provider->save();
        }
    }
}
