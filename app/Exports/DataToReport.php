<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataToReport implements WithMultipleSheets
{
    
    public function sheets(): array
    {
       return [
           new ReportExport(),
           new ProgresProjectExport(),
           new StatusProjectExport(),
           new TermOfPaymentExport()
       ];
    }
}