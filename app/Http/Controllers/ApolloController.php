<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Random;
use App\Models\Breakdown;

class ApolloController extends Controller
{
    public function generateRandomAlphanumeric()
    {
        for ($i=0; $i < rand(5,10); $i++) {
            $random = array('values' => $this->randomAlphanumeric(), );
            $randomId = Random::create($random)->id;
            $breakdown = array('random_id' => $randomId, );
            for ($j=0; $j < rand(5,10); $j++) {
                $breakdown['values'] = $this->randomAlphanumeric();
                Breakdown::create($breakdown);
            }
        }
    }

    public function randomAlphanumeric()
    {
        $length = 5;
        $string = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

        $randomAlphanumeric = substr(str_shuffle($string), 0, $length);

        return $randomAlphanumeric;
    }

    public function getData()
    {
        $randoms = Random::where('flag',false)->get();
        Random::where('flag',false)->update(['flag' => true]);
        $bdCollection = collect();
        foreach ($randoms as $rand) {
            foreach ($rand->breakdowns()->get() as $breakdown) {
                $bdCollection->push($breakdown);
            }
        }
        $breakdowns = $bdCollection->implode('values', ' ');
        return response()->json($breakdowns);
    }
}
