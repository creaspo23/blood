<?php


namespace App\Http\Services;


use App\Models\Derivative;
use App\Models\Exchange;
use Illuminate\Http\Request;

class ExchangeServices
{
    public static function external(Exchange $exchange, Request $request)
    {
        $person = PeopleServices::store($request);
        
        $exchange->external()->updateOrCreate(['exchange_id' => $exchange->id], [
            'exchange_id' => $exchange->id,
            'person_id' => $person->id,
            'hospital' => $request->hospital
        ]);
    }

    public static function bottles(Exchange $exchange, $bottles)
    {

        foreach ($bottles as $bottle) {

            $exchange->bloods()->create(['exchange_id' => $exchange->id, 'derivative_id' => $bottle]);
        }
        Derivative::whereIn('id', $bottles)->update(['exchanged' => 1]);
    }
}
