<?php

namespace App\Http\Controllers\Job;

use App\DataTables\JobSessionDataTable;
use App\Http\Controllers\Controller;

class JobSessionController extends Controller
{
    public function index(JobSessionDataTable $dataTable)
    {
        return $dataTable->render('pages.job.jobsession.index');
    }
}
