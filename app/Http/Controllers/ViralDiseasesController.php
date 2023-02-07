<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateViralDiseaseRequest;
use App\Models\ViralDisease;

class ViralDiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return view('viral-diseases', ['diseases' => ViralDisease::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOrUpdateViralDiseaseRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOrUpdateViralDiseaseRequest $request)
    {
        if(!$request->has('permanent')){
            $request->request->add(['permanent' => 0]);
        }
        if ($request->has('id')) {
            ViralDisease::updateOrCreate(['id' => $request->id], $request->all());
        }
        else {
            ViralDisease::updateOrCreate(['name' => $request->name], $request->all());
        }

        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $disease = ViralDisease::findOrFail($id);
        $disease->delete($id);
        return redirect()->back()->with(['error' => 'تمت العملية بنجاح']);
    }
}
