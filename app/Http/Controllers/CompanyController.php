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
        $this->middleware(['auth', 'clearance', 'isAdmin']);
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
        /*$this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
            ]);

        $title = $request['title'];
        $body = $request['body'];

        $job = Job::create($request->only('title', 'body'));
        //Display a successful message upon save
        return redirect()->route('companies.index')
            ->with('flash_message', 'Company,
             '. $company->name.' created');*/
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
        /*$this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);

        $job = Job::findOrFail($id);
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->save();

        return redirect()->route('jobs.show',
            $job->id)->with('flash_message',
            'Article, '. $job->title.' updated');*/
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
