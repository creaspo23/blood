<?php

namespace App\Http\Controllers;

use App\Http\Requests\BloodWithdrawRequest;
use App\Http\Services\ProcessableServices;
use App\Models\Donation;
use App\Models\Kid;
use App\Models\Order;
use App\Models\Polycythemia;

class BloodWithdrawsController extends Controller
{


    public function create($type, $id)
    {
        if ($type == 'donation') {
            $case = Donation::where('id', $id)->with(['person', 'bloodTest', 'doctorTest', 'viralTest'])->firstOrFail();
        }
        if ($type == 'order') {
            $case = Order::where('id', $id)->with(['person', 'bloodTest', 'doctorTest', 'viralTest'])->firstOrFail();
        }
        if ($type == 'polcythemia') {
            $case = Polycythemia::where('id', $id)->with(['person', 'bloodTest', 'doctorTest'])->firstOrFail();
        }
        if ($type == 'kid') {
            $case = Kid::where('id', $id)->with(['person', 'bloodTest', 'doctorTest'])->firstOrFail();
        }
        return view('blood-withdraw', compact('case', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BloodWithdrawRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BloodWithdrawRequest $request)
    {

        $processable = ProcessableServices::get($request);

        $processable->bloodWithdraw()->create(array_merge(['employee_id' => auth()->user()->employee->id], $request->validated()));
        if ($request->faild == 1) {
            $processable->bloodWithdraw()->update(['status' => 'فاسدة']);
            return redirect()->back()->with(['error' => 'فشلت عمليه السحب']);

        }
        if ($request->polycythemias_id) {
            $polycythemia = Polycythemia::findOrFail($request->polycythemias_id);
            $polycythemia->update(['status' => 'مكتمل']);
        }

        return redirect()->back()->with(['success' => 'تمت العمليه بنجاح']);
    }
}
