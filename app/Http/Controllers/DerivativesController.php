<?php

namespace App\Http\Controllers;

use App\Http\Requests\DerivativesRequest;
use App\Models\Derivative;
use App\Models\Donation;

class DerivativesController extends Controller
{


    public function create($id)
    {

        $case = Donation::where('id', '=', $id)->first();

        return view('blood-derivatives', compact('case'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bottles()
    {
        return Derivative::where('exchanged', 0)->whereDate('expire_date', '>', now())->with('withdraw.processable.person')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function store(DerivativesRequest $request)
    {

        foreach ($request->bloods as $blood) {

            Derivative::updateOrCreate(
                [
                    'blood_withdraw_id' => $request->blood_withdraw_id,
                    'blood_type' => $blood['name']
                ],
                [
                    'blood_withdraw_id' => $request->blood_withdraw_id,
                    'blood_type' => $blood['name'],
                    'employee_id' => auth()->user()->employee->id,
                    'expire_date' => now()->addDays($blood['expire'])
                ]
            );
        }

        return true;
    }
}
