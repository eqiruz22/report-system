<?php

namespace App\Http\Controllers;

use App\Exports\DataToReport;
use Maatwebsite\Excel\Facades\Excel;

class ExportReportController extends Controller
{
    static function ExportReport()
    {
        $filename = 'report_'.date('Y-m-d').'.xlsx';
        return Excel::download(new DataToReport, $filename);
    }
}