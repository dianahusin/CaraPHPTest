<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);

        return view('modules.company.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $company = $request->input('id') ? Company::find($request->input('id')) : new Company();
        $company->fill($request->all());

        if ($request->file('logo')) {
            $logoFileName = $request->file('logo')->getClientOriginalName() ;
                            $request->file('logo')->storeAs('public', $logoFileName);
            $company->logo = $logoFileName;
        }

        $company->save();

        return redirect()->back()->with('success', 'Data successfully save');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back()->with('success', 'Information Succesfully Delete');
    }
}
