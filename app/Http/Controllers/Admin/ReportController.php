<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    public function event(Request $request)
    {
        $data = [];
        $year = $request->input('year',Carbon::now()->year);
        $month = $request->input('month',Carbon::now()->month);
        $action = $request->input('action');
        $opening =Order::where('startdate','<=', date("{$year}-{$month}-01"))->count();
        $accept = Order::where('status','Approved')->whereBetween('startdate',[date("{$year}-{$month}-01"),date("{$year}-{$month}-31")])->count();
        $reject = Order::where('status','Rejected')->whereBetween('startdate',[date("{$year}-{$month}-01"),date("{$year}-{$month}-31")])->count();
        $pending = Order::where('status','Pending')->whereBetween('startdate',[date("{$year}-{$month}-01"),date("{$year}-{$month}-31")])->count();
        $data = [
            [
                'details' => 'Last Events Count',
                'date' => date("{$year}-{$month}-01"),
                'sda'  => $opening
            ],
            [
                'details' => 'Accepted Events of During Month',
                'date' => '',
                'sda'  =>$accept
            ],
            [
                'details' => 'Rejcected Events of During Month',
                'date' => '',
                'sda'  => $reject
            ],
            [
                'details' => 'Pending Events of During Month',
                'date' => '',
                'sda'  => $pending
            ],
            [
                'details' => 'Month End Events Count',
                'date' => date("{$year}-{$month}-31"),
                'sda'  => $opening+$accept+$reject+$pending

            ]
        ];
        if ($action == 'pdf') {
            $pdf = PDF::loadView('admin.report.export.sda', [
                'data' => $data,
                'year' => $year,
                'month' => $month
            ]);
            return $pdf->download("SDA-Report-{$year}-{$month}.pdf");
        }
        $years = range(Carbon::now()->year, 2020);
        $months = CarbonPeriod::create('2020-01-01', '1 month', '2020-12-31');
        return view('admin.report.sda',compact('years', 'data','year','months','month'));
    }

}
