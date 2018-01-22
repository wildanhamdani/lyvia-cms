<?php

namespace App\Http\Controllers\Job;

use App\DataTables\JobDataTable;
use App\Http\Controllers\Controller;
use App\Job;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    public function index(JobDataTable $dataTable)
    {
        return $dataTable->render('pages.job.job.index');
    }

    public function create()
    {
        return view('pages.job.job.create');
    }

    public function edit($id)
    {
        $data = Job::find($id);

        return view('pages.job.job.edit')->with(['job' => $data]);
    }

    public function store(){
        return Redirect::to('/job/job');
    }
}
