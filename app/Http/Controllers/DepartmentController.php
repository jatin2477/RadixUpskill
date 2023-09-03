<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Create ";
        $url = route('departments.store');
        $data = compact('url', 'title');
        return view('department-add')->with($data);
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
        $request->validate([
            'name' => "required|unique:departments"
        ]);

        $department = new Department;
        $department['name'] = $request->name;
        $department->save();

        return redirect(route('departments.view'))->with("success", "Department added successfully");
    }

    public function view() 
    {
        $departments = Department::paginate(5);
        $data = compact('departments');
        return view('department-view')->with($data);
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
        $department = Department::find($id);
        $title = "Update ";
        $url = route('departments.update', $id);
        $data = compact('url', 'title', 'department');
        return view('department-add')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|unique:departments"
        ]);

        $department = Department::find($id);
        if(!is_null($department)) {
            $department->name = $request['name'];
            $department->save();

            return redirect(route('departments.view'))->with("success", "Department updated successfully");
        } else {
            return redirect(route('departments.update', $id))->with("error", "Department not found");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        if(!is_null($department))
        {
            $department->delete();
        }

        return redirect(route('departments.view'))->with("success", "Department Deleted Successfully");
    }
}
