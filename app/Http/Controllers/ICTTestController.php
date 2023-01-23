<?php

namespace App\Http\Controllers;

use App\Models\ICTTest;
use Illuminate\Http\Request;

class ICTTestController extends Controller
{
    public function store(Request $request)
    {
        ICTTest::updateOrCreate(['kid_id' => $request->kid_id], array_merge(['employee_id' => auth()->user()->employee->id], $request->all()));
        return redirect()->back()->with(['success' => 'تمت العملية بنجاح']);
    }
}
