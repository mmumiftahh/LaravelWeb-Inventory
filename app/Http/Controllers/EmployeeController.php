<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('pages.employee.index', [
            'data'=>Employee::all(),
        ]);
    }


    public function create()
    {
        return view('pages.employee.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'nip'=>'required|numeric',
            'name'=>'required',
            'address'=>'required',
        ]);

        Employee::create([
            'name'=>$request->name,
            'nip'=>$request->nip,
            'username'=>$request->nip,
            'password'=>Hash::make($request->nip),
            'address'=>$request->address,
        ]);
        return back()->with('message','Success');
    }

    
    public function show(Employee $employee)
    {
        //
    }

    
    public function edit(Employee $employee)
    {
        return view('pages.employee.edit', [
            'data'=>$employee,
        ]);
    }

    
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'address'=>'required',
        ]);

        Employee::where(['id'=>$employee->id])->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request['password']),
            'address'=>$request->address,
        ]);

        return redirect()->route('employee.index')->with('message','Updated');
    }

    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return back()->with('message','Deleted');
    }
    
    public function dashboard()
    {
        return view('employee_home');
    }
}
