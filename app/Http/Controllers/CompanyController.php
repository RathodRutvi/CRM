<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use \Yajra\Datatables\Datatables;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Company::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('company.edit',$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                        <a href="'.route('company.del',$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $btn;
                        })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.company.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        if($request->hasfile('logo'))
        {
                $file = $request->file('logo');
                $ext =$file->getClientOriginalName();
                $file->storeAs('public/images',$ext);
                $company->logo=$ext;
        }
        $company->website = $request->website;
        $company->save();
        return redirect('company')->with('success',"Insert Successfully");

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
        $company = Company::find($id);
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        if($request->hasfile('logo'))
        {
                $file = $request->file('logo');
                $ext =$file->getClientOriginalName();
                $file->storeAs('public/images',$ext);
                $company->logo=$ext;
        }
        $company->website = $request->website;
        $company->update();
        return redirect('company')->with('success',"Update Successfully");
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
        
        // $company = Company::find($id);
        // $company->delete();
        // return redirect('company')->with('success',"Delete Successfully");

        $data=employee::where('company_id',$id)->exists();
        
        if($data)
        {
            // Alert::info('Your Can\'t  Delete This Data');
            return redirect('company')->with('success',"Your Can't  Delete This Data");
        }
        else
        {
            // Alert::success('Success', 'Company Data delete');
            $company=company::find($id);
            $company->delete();
        }
       // $category->portfolios->each->delete();
        return redirect('company')->with('success',"Delete Successfully");
        
    }
}
