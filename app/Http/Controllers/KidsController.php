<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddKidRequest;
use App\Http\Services\PeopleServices;
use App\Models\Kid;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kids = Kid::with(['ictTest', 'dctTest'])->get();

        $test = ['bloodTest', 'doctorTest', 'viralTest',];

        $type = ['kid', 'mother'];

        return view('all-kids', compact('kids', 'test', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('add-kids');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AddKidRequest $request
     * @return mixed
     */
    public function store(AddKidRequest $request)
    {
        DB::transaction(function () use ($request) {
            $mother = PeopleServices::store($request);
            $kid = Person::create([
                'name' => $request->child_name,
                'birth_date' => $request->child_birth_date,
                'gender' => $request->child_gender
            ]);
            Kid::create([
                'mother_id' => $mother->id,
                'kid_id' => $kid->id,
                "type" => $request->type,
            ]);
        });

        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
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
        $kid = Kid::findOrFail($id);
        $kid->update(['status' => 'ملغي']);
        return redirect()->back()->with(['success' => 'تم الفاء الطلب بنجاح']);
    }
}
