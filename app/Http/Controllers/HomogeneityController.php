<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomogeneityRequest;
use App\Models\Derivative;
use App\Models\Donation;
use App\Models\Homogeneity;

class HomogeneityController extends Controller
{
    public function create($id)
    {
        $dontion = Donation::where('id', $id)->with(['person', 'bloodWithdraw'])->first();
        $bottels = Derivative::where('blood_withdraw_id', $dontion->bloodWithdraw->bottle_number)->get('bottle_number');
        return view('homogeneity', compact('dontion', 'bottels'));
    }

    public function store(StoreHomogeneityRequest $request)
    {
        $bottels = json_encode($request->bottels, true);

        $request->merge(['bottels' => $bottels]);

        Homogeneity::create(array_merge(['employee_id' => auth()->user()->employee->id], $request->all()));


        return back()->with(['success' => 'تمت العملية بنجاح']);
    }
}
