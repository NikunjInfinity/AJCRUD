<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmpController extends Controller
{   
    // index
    public function index()
    {
        $employee = Employee::get();
        return view('index', compact('employee'));
    }
    // create
    public function create()
    {
        return view('create');
    }
    //Store
    public function store(Request $request)
    {

        $name = $request->post('name');
        $post = $request->post('post');
        $salary = $request->post('salary');

        Employee::create(['name' => $name, 'post' => $post, 'salary' => $salary]);

        return redirect()->route('employee.index')->with('succesess', 'data inserted');
    }

    // Edit
    public function edit(Employee $employee)
    {
        return view('edit', compact('employee'));
        //view of data it will show fill data
    }

    // Update
    public function update(Request $request, Employee $employee)
    {

        $name = $request->post('name');
        $post = $request->post('post');
        $salary = $request->post('salary');

        $employee->fill(['name' => $name, 'post' => $post, 'salary' => $salary])->save();

        return redirect()->route('employee.index');
    }

    // Destroy/Delete
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
