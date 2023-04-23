<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = DB::table('department')
                ->select('id', 'name', 'updated_at')
                ->get()->toArray();

        $employee = DB::table('employee')
                      ->join('department', 'department.id', '=', 'employee.department_id')
                      ->select('department.name as dept_name', 'employee.id as emp_id', 'employee.name as e_name',
                          'employee.updated_at as e_update')->get();

        return view('employee', ['data' => $db, 'employee' => $employee]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $department = $request->department;
        $data = [
            'name'          => $name,
            'department_id' => $department,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];
        $db = DB::table('employee')->insertGetId($data);
        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = DB::table('department')
                ->select('id', 'name', 'updated_at')
                ->get()->toArray();

        $employee = DB::table('employee')
                      ->join('department', 'department.id', '=', 'employee.department_id')
                      ->select('department.name as dept_name', 'employee.id as emp_id', 'employee.name as e_name',
                          'employee.updated_at as e_update')->where('employee.id', $id)->first();

        return view('employee_edit', ['employee' => $employee, 'data' => $db]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = DB::table('employee')->where('id', $id)
                ->update(['name' => $request->name, 'department_id'=>$request->department]);

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
