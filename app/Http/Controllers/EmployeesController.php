<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        $employees = Employee::paginate(10);

        return view('modules.employee.index', compact('companies', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required'
        ]);

        // ---OPTION 1 : Tak stable---
        // Employee::updateOrCreate(
        //     [
        //         'id' => $request->input('id')
        //     ],
        //     [
        //     'firstname' => request('firstname'),
        //     'lastname' => request('lastname'),
        //     'email' => request('email'),
        //     'company' => request('company'),
        //     'phone' => request('phone')
        //     ]
        // );

        // ---OPTION 2-----
        $employee = $request->input('id') ? Employee::find($request->input('id')) : new Employee();
        $employee->fill($request->all());
        $employee->save();

        return redirect()->back()->with('success', 'Data succesfully save');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->back()->with('success', 'Data succesfully delete');

    }
}
