<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;
use App\Company;
use Auth;
use Session;

class JobController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order

        //$company = Company::find(1);
        //$company->jobs()->attach(1);
        //dd($company->jobs);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
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
            'job_title'=>'required|max:100',
            'job_description' =>'required|max:200',
            'job_salary' =>'required',
            ]);

        $job_title = $request['job_title'];
        $job_description = $request['job_description'];
        $job_salary = $request['job_salary'];
        $request['user_id'] = Auth::user()->id;
        $user_id = $request['user_id'];
        $package_id = 1;

        $job = Job::create($request->only('job_title', 'job_description', 'job_salary' , 'package_id', 'user_id'));

        //Display a successful message upon save
        return redirect()->route('jobs.index')
            ->with('flash_message', 'Job,
             '. $job->job_title.' Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::findOrFail($id); //Find post of id = $id

        return view ('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        return view('jobs.edit', compact('job'));
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
            'job_title'=>'required|max:100',
            'job_description'=>'required',
        ]);

        $job = Job::findOrFail($id);
        $job->job_title = $request->input('job_title');
        $job->job_description = $request->input('job_description');
        $job->save();

        return redirect()->route('jobs.show',
            $job->id)->with('flash_message',
            'Job, '. $job->job_title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        if($job->company()->exists())
        {
            $company = Company::findOrFail($job->company[0]->id);
            $company->jobs()->detach($id);
        }

        $job->delete();

        return redirect()->route('jobs.index')
            ->with('flash_message',
             'Job Successfully Deleted');
    }
}
