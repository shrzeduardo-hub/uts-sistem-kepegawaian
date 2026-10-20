<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->latest()->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|gt:0',
            'joined_at' => 'required|date',
        ]);

        Employee::create($data);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('employees.edit', compact(
            'employee', 'departments'
        ));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|gt:0',
            'joined_at' => 'required|date',
        ]);

        $employee->update($data);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}