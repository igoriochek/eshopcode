<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\LogActivity;
use App\Mail\UserActivitiesReport;
use App\Exports\UserActivitiesReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Flash;
use DB;
use PDF;
use Excel;

class UserActivitiesReportController extends AppBaseController
{
    private function getUserActivities()
    {
        return QueryBuilder::for(LogActivity::class)
        ->allowedFilters([
            AllowedFilter::exact('id'),
            'user.name',
            'user.email',
            'user.type',
            'activity',
            AllowedFilter::scope('date_from'),
            AllowedFilter::scope('date_to')
        ])
        ->allowedIncludes(['user'])
        ->orderBy('id', 'DESC')
        ->paginate(25);
    }

    public function index()
    {
        return view('user_activities_report.index')
            ->with('userActivities', $this->getUserActivities());
    }

    public function sendEmail()
    {
        $userActivities = $this->getUserActivities();
        $email = Auth::user()->email;

        Mail::to($email)->send(new UserActivitiesReport($userActivities, $email));

        Flash::success('Email has been sent.');

        return view('user_activities_report.index')
            ->with(['userActivities' => $userActivities]);
    }

    public function downloadPdf()
    {
        $data = [
            'userActivities' => $this->getUserActivities()
        ];

        $pdf = PDF::loadView('user_activities_report.report', $data);

        return $pdf->download('user_activities_report.pdf');
    }

    public function downloadCsv()
    {
        $userActivities = $this->getUserActivities();

        return Excel::download(new UserActivitiesReportExport($userActivities),
            'user_activities_report.csv');
    }
}
