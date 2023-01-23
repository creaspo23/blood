<?php


namespace App\Http\Services;


class InvestigationServices
{
    public static function tests ($investigation, $tests) {
        foreach ($tests as $test) {
            $investigation->tests()->create([
                'test' => $test
            ]);
        }
    }

}
