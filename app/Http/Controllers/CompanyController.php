<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\Company;
use Auth;
use Session;

class CompanyController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'agency'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'company_name'=>'required|max:100',
            'company_description' =>'required',
            'company_address' =>'required',
            'company_phone' =>'required',
            'company_size' =>'required',
            'abn_number' =>'required',
            ]);

        $company_name = $request['company_name'];
        $company_description = $request['company_description'];
        $company_address = $request['company_address'];
        $company_phone = $request['company_phone'];
        $company_size = $request['company_size'];
        $abn_number = $request['abn_number'];

        $company = Company::create($request->only('company_name', 'company_description', 'company_address', 'company_phone', 'company_size', 'abn_number'));
        //Display a successful message upon save
        return redirect()->route('companies.index')
            ->with('flash_message', 'Company,
             '. $company->company_name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id); //Find post of id = $id

        return view ('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name'=>'required|max:100',
            'company_description' =>'required',
            'company_address' =>'required',
            'company_phone' =>'required',
            'company_size' =>'required',
            'abn_number' =>'required',
            ]);

        $company = Company::findOrFail($id);

        $company->company_name = $request->input('company_name');
        $company->company_description = $request->input('company_description');
        $company->company_address = $request->input('company_address');
        $company->company_phone = $request->input('company_phone');
        $company->company_size = $request->input('company_size');
        $company->abn_number = $request->input('abn_number');

        $company->save();

        return redirect()->route('companies.show',
            $company->id)->with('flash_message',
            'Company, '. $company->company_name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('flash_message',
             'Company successfully deleted');
    }
}
