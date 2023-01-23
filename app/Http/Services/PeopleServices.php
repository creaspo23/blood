<?php


namespace App\Http\Services;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Person;

class PeopleServices
{
    public static function store ($request)  {
    

        return Person::updateOrCreate(['name' => $request->name, 'birth_date' => $request->birth_date],
            $request->validated());
    }

    public static function update ($person, $fields)  {
        return $person->update($fields);
    }

}
