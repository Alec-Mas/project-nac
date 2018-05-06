<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\Company;
use Auth;
use Session;
use DB;


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

        if($company->jobs()->exists())
        {
            foreach($company->jobs as $job)
            {
                $company->jobs()->detach($job);
            }
        }

        $company->delete();

        return redirect()->route('companies.index')
            ->with('flash_message',
             'Company successfully deleted');
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $companies=DB::table('companies')->where('company_name','LIKE','%'.$request->search."%")->get();

            if($companies)
            {
                foreach ($companies as $key => $company)
                {
                    /*$output.='<td style="float: left">'.$company->company_name.'</td>'.
                            '<td style="float: right">'.
                                '<button id="link-company" href="'.action('CompanyController@link').'" type="button" class="btn btn-success" data-id="'.$company->id.'">
                                    <span class="fa fa-plus fa-lg" aria-hidden="true"></span>
                                </button>'.'</td>';*/

                    $output.='<td style="float: left">'.$company->company_name.'</td>'.
                            '<td style="float: right">'.'<form method="POST" action="'.action('CompanyController@link').'">'.'
                                <input id="company_id" name="company_id" type="hidden" value="'.$company->id.'">
                                <input id="job_id" name="job_id" type="hidden" value="'.$request->job_id.'">
                                <input type="hidden" name="_token" id="csrf-token" value="'.$request->_token.'" />
                                <button type="submit" class="btn btn-success"><i class=" fa fa-plus fa-lg"></i></button></form></td>';
                }
                return Response($output);
            }
        }
    }

    public function link(Request $request)
    {
        $company = Company::findOrFail($request->company_id);
        $job = Job::findOrFail($request->job_id);

        $company->jobs()->attach($request->job_id);

        return redirect()->route('jobs.show',
        $request->job_id)->with('flash_message',
        $job->job_title.' linked to '.$company->company_name);
    }

    public function unlink(Request $request)
    {
        $company = Company::findOrFail($request->company_id);
        $job = Job::findOrFail($request->job_id);

        $company->jobs()->detach($request->job_id);

        return redirect()->route('jobs.show',
        $request->job_id)->with('flash_message',
        $job->job_title.' link removed from '.$company->company_name);
    }
}
