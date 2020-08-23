<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Http\Requests\JobPostRequest;
use Auth;

class JobController extends Controller
{
    // add middleware to control the following method except index and show until login
    /* public function __construct() {
        //$this->middleware(['employer','verified'],['except' =>array('index', 'show')]);
        $this->middleware('employer',['except' =>array('index', 'show', 'apply')]);
    } */

    public function index(){
        $jobs = Job::all()->take(10);   // get 10 records
        return view('welcome',compact('jobs'));
    }

    // Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
    public function show($id, Job $job) {
        // dd($job);  for debugging
        $job = Job::find($id);
        return view('jobs.show', compact('job'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){

        $user_id = auth()->user()->id;
        // retrieve single records using find or first instead of returning a collection of models
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date')
        ]);
        return redirect()->back()->with('message','Job posted successfully!');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjob',compact('jobs'));
    }

    public function edit($id){
        // dd($id);
        // $job = Job::findOrFail($id);
        $job = Job::find($id);
        return $job;
        //return view('jobs.edit',compact('job'));
    }

    public function update(JobPostRequest $request,$id){
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job  Sucessfully Updated!');

    }
    // apply for the job
    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        /*
        Eloquent also provides a few additional helper methods to make working with related models more convenient.
        For example, let's imagine a user can have many roles and a role can have many users.
        To attach a role to a user by inserting a record in the intermediate table that joins the models,
        use the attach method:
        */
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');

    }
    // view applicants
    public function applicant(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        dd($applicants);
        return view('jobs.applicants',compact('applicants'));
    }



}
