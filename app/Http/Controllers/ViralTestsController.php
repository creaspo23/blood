<?php

namespace App\Http\Controllers;

use App\Http\Requests\ViralTestRequest;
use App\Http\Services\ProcessableServices;
use App\Http\Services\RejectionsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViralTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viralTest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ViralTestRequest $request)
    {

        $result = DB::transaction(function () use ($request) {
            $processable = ProcessableServices::get($request);
            if ($request->has('result')) {
                $result = json_encode($request->result ,true);

                $request->merge(['result' => $result]);
            }

            $processable->viralTest()->create(array_merge(['employee_id' => auth()->user()->employee->id], $request->all()));

            return RejectionsServices::checkForRejection($processable, 'الفحص الفيروسي');
        });
        if ($result) {
            return redirect('donations')->with(['error' => 'المتبرع تم رفضه في مرحله الفحص الفيروسي']);
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
