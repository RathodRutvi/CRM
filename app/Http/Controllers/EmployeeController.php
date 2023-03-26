<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use \Yajra\Datatables\Datatables;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('company_id', function($row){
                        return $row->company->name;
                        })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('employee.edit',$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                                <a href="'.route('employee.delete',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $btn;
                        })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.employee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.add',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect('employee')->with('success',"Insert Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('admin.employee.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->update();
        return redirect('employee')->with('success',"Upadate Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('employee')->with('success',"Delete Successfully");
    }
}
