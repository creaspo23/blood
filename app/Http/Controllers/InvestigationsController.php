<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInvestigationRequest;
use App\Http\Requests\UpdateInvestigationRequest;
use App\Http\Services\InvestigationServices;
use App\Http\Services\PeopleServices;
use App\Models\Investigation;
use Illuminate\Support\Facades\DB;

class InvestigationsController extends Controller
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
        return view('add-investigation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddInvestigationRequest  $request
     * @return mixed
     */
    public function store(AddInvestigationRequest $request)
    {
        DB::transaction(function () use ($request) {
            $person = PeopleServices::store($request);
            $investigation = Investigation::create([
                'person_id' => $person->id
            ]);
            InvestigationServices::tests($investigation, $request->tests);
        });

        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function edit(Investigation $investigation)
    {
        return view('investigations', ['investigation' => $investigation, 'tests' => $investigation->tests()->pluck('test')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvestigationRequest $request, Investigation $investigation)
    {
        foreach ($request->results as $result) {
            $investigation->tests()->where('id', $result['id'])->update([
                'result' => $result['result'],
                'mean' => $result['mean'],
            ]);
        }
        return true;
    }

}
