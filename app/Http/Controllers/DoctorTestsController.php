<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorTestRequest;
use App\Http\Services\ProcessableServices;
use App\Http\Services\RejectionsServices;
use App\Models\Kid;
use App\Models\Polycythemia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mpdf\Tag\Tr;

class DoctorTestsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctorTest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DoctorTestRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DoctorTestRequest $request)
    {


        $reuslt = DB::transaction(function () use ($request) {
            $processable = ProcessableServices::get($request);
            if ($request->has('others')) {
                $others = json_encode($request->others ,true);
                $request->merge(['others' => $others]);
            }

            if ($request->polycythemias_id) {

                $polycythemia = Polycythemia::findOrFail($request->polycythemias_id);
                if ($request->BP < 80) {
                    $polycythemia->update(['BP' => "منخفض"]);
                } elseif ($request->BP <= 120 && $request->BP > 80) {
                    $polycythemia->update(['BP' => "طبيعي"]);
                } elseif ($request->BP > 120 && $request->BP <= 129) {
                    $polycythemia->update(['BP' => "مرتفع"]);
                }
            }

            $processable->doctorTest()->updateOrCreate(['processable_id' => $processable->id], array_merge(['employee_id' => auth()->user()->employee->id], $request->all()));

            return RejectionsServices::checkForRejection($processable, 'فحص الطبيب');
        });

        if ($reuslt) {
            return redirect('donations')->with(['error' => 'المتبرع تم رفضه في مرحله فحص الطبيب']);
        }

        return redirect()->back()->with(['success' => 'تم الحفظ']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
