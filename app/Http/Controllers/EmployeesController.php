<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::with('departments')->paginate('5');        
        return view('employee-view')->with(compact('employees'));
    }

    public function trash()
    {
        $employees = User::onlyTrashed()->paginate(5);
        return view('employee-trash')->with(compact('employees'));
    }

    public function restore($id)
    {
        $employee = User::withTrashed()->find($id);
        if(!is_null($employee))
        {
            $employee->restore();
            return redirect(route('employees.view'))->with("success", "Employee Restored Successfully");
        }

        return redirect(route('employees.view'))->with("error", "Employee Restored Failed");
    }

    public function forcedelete($id)
    {
        $employee = User::withTrashed()->find($id);
        if(!is_null($employee))
        {
            $employee->forcedelete();
            return redirect(route('employees.view'))->with("success", "Employee Deleted Successfully");
        }

        return redirect(route('employees.view'))->with("error", "Employee Deleted Failed");
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::find($id);
        if(!is_null($employee))
        {
            $employee->delete();
            return redirect(route('employees.view'))->with("success", "Employee Soft Deleted Successfully");
        }

        return redirect(route('employees.view'))->with("error", "Employee Not Found");
    }
}
