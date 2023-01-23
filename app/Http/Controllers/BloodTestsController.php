<?php

namespace App\Http\Controllers;

use App\Http\Requests\BloodTestRequest;
use App\Http\Services\PeopleServices;
use App\Http\Services\ProcessableServices;
use App\Http\Services\RejectionsServices;
use App\Models\Kid;
use App\Models\Polycythemia;
use Illuminate\Support\Facades\DB;

class BloodTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BloodTestRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BloodTestRequest $request)
    {
        $result = DB::transaction(function () use ($request) {
            $processable = ProcessableServices::get($request);
            //  dd($processable);
            
        
            if ($request->HB && $request->mother_id) {
                $processable->motherBloodTest()->updateOrCreate(['mother_id' => $processable->mother_id], array_merge(['employee_id' => auth()->user()->employee->id], $request->validated()));

                PeopleServices::update($processable->person(), $request->only(['blood_group', 'genotype']));
                return RejectionsServices::checkForRejection($processable, 'فحص الدم');
            }
            if ($request->HB && $request->kid_id) {
                $processable->bloodTest()->updateOrCreate(['processable_id' => $processable->kid_id], array_merge(['employee_id' => auth()->user()->employee->id], $request->validated()));

                PeopleServices::update($processable->person(), $request->only(['blood_group', 'genotype']));
                return RejectionsServices::checkForRejection($processable, 'فحص الدم');
            }

            if ($request->HB) {
                $processable->bloodTest()->updateOrCreate(['processable_id' => $processable->id], array_merge(['employee_id' => auth()->user()->employee->id], $request->validated()));
            }
            if ($request->polycythemias_id) {

                $polycythemia = Polycythemia::findOrFail($request->polycythemias_id);

                $polycythemia->update(['HB' => $request->HB]);
            }

            PeopleServices::update($processable->person(), $request->only(['blood_group', 'genotype']));

            return RejectionsServices::checkForRejection($processable, 'فحص الدم');
        });
        if ($result) {
            return redirect('donations')->with(['error' => 'المتبرع تم رفضه في مرحله فحص الزمره']);
        }
        return redirect()->back()->with(['success' => 'تم الحفظ']);
    }
}
