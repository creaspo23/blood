<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddInvestigationRequest;
use App\Http\Requests\UpdateInvestigationRequest;
use App\Http\Services\InvestigationServices;
use App\Http\Services\PeopleServices;
use App\Models\Investigation;
use App\Models\InvestigationTest;
use Illuminate\Http\Request;
// use Illuminate\Http\Client\Request;
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
        $investigations = Investigation::latest()->get();

        $tests=InvestigationTest::get(['test','result']);
//        $AB_identification=$investigations->tests()->where('test','AB identification')->get();
//        $AB_titration=$investigations->tests()->where('test','AB titration')->get();
        return view('all-investigations', compact('investigations','tests'));
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
        // dd($request->all());

        foreach ($request->results as $result => $value) {
            $investigation->tests()->where('investigation_id', $request->id)->where('test', $result)->update([
                'result' => $value,
                // 'mean' => $result['mean'],
            ]);
        }
        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
    }


    public function UpdateStatus(Request $request, $id)
    {
        //  dd('p');
        $investigation = Investigation::find($id);
        $investigation->update(['status' => $request->status]);
        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
    }
}
