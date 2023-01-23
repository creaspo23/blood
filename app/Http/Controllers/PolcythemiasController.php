<?php

namespace App\Http\Controllers;

use App\Http\Requests\PolcythemiaRequest;
use App\Http\Services\PeopleServices;
use App\Models\Polycythemia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PolcythemiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $polcythemias = Polycythemia::all();
        $test = [
            'bloodTest',
            'doctorTest',
        ];

        $type = 'polcythemia';

        return view('all-polcythemia', compact('polcythemias', 'test', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('add-polcythemia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PolcythemiaRequest $request)
    {
        DB::transaction(function () use ($request) {
            $person = PeopleServices::store($request);
            Polycythemia::create([
                'person_id' => $person->id,
                'type' => $request->type
            ]);
        });

        return redirect()->back()->with(['success' => 'تمت العملبة بنجاح']);
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

    public function Cancle($id)
    {
        $polcythemia = Polycythemia::findOrFail($id);
        $polcythemia->update(['status' => 'ملغي']);
        return redirect()->back()->with(['success'=> 'تم الفاء الطلب بنجاح']);
    }
}
