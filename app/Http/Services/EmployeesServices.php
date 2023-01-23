<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;

class EmployeesServices
{
    public static function store (User $user, Request $request) {
        $user->employee()->create($request->validated());
    }

}
