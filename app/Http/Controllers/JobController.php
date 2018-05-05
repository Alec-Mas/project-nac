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

        $company = Company::find(1);

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
            'title'=>'required|max:100',
            'body' =>'required',
            ]);

        $title = $request['title'];
        $body = $request['body'];

        $job = Job::create($request->only('title', 'body'));

        //Display a successful message upon save
        return redirect()->route('jobs.index')
            ->with('flash_message', 'Article,
             '. $job->title.' created');
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
            'title'=>'required|max:100',
            'body'=>'required',
        ]);

        $job = Job::findOrFail($id);
        $job->title = $request->input('title');
        $job->body = $request->input('body');
        $job->save();

        return redirect()->route('jobs.show',
            $job->id)->with('flash_message',
            'Article, '. $job->title.' updated');
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
        $job->delete();

        return redirect()->route('jobs.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
