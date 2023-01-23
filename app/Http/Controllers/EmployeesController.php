<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Services\EmployeesServices;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        return view('employees', ['employees' => Employee::all()]);
    }


    /**
     * create new resource.
     *
     * @return mixed
     */
    public function create()
    {
        
        return view('add-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEmployeeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateEmployeeRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            EmployeesServices::store($user, $request);
            return redirect()->back()->with(['success' => 'تم اضافة موظف']);
        });
    }

    public function show(Employee $employee)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return mixed
     */
    public function edit(Employee $employee)
    {
        return view('edit-employee', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->back()->with(['success' => 'تم التعديل']);
    }
}
